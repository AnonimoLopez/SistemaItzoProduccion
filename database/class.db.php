   <?php

/**
 * Clase de base de datos. Uso:
 *
 * require("class.config.php");
 * require("class.db.php");
 *
 * $stmt1="INSERT INTO tabla VALUES(null, '%s', '%s', '%s', '%s', ..., '%s');";
 * $stmt1Prepared=sprintf($stmt1, mysql_escape_string($obj->getValue1()), $obj->getValue2(), $obj->getValue3(), $obj->getValue4()); //Donde $obj es el objeto
 *
 * $bd=DataBase::getInstance();
 * $result=$bd->ejecutar($stmt1Prepared);
 * if ($result) { ... }
 * $bd->cerrarConexion();
 *
 **/

class DataBase
{

    private $servidor;
    private $usuario;
    private $password;
    private $base_datos;
    private $tipo;
    private $link;
    private $stmt;
    private $array;
    private static $_instance;

    private function __construct()
    {
        $this->setConexion();
        $this->conectar();
    }

    private function setConexion()
    {
        $conf             = Config::getInstance();
        $this->servidor   = $conf->getHostDB();
        $this->base_datos = $conf->getDB();
        $this->usuario    = $conf->getUserDB();
        $this->password   = $conf->getPassDB();
        $this->tipo       = $conf->getDBType();
        $this->stmt       = null;
    }

    private function __clone()
    {}

    private function __wakeup()
    {}

    /**
     * Llamar desde fuera de la clase para instanciar el objeto, y así, poder utilizar sus métodos
     **/
    public static function getInstance()
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function conectar()
    {
        switch ($this->tipo) {
            case 'mysql':
                $link = mysql_connect($this->servidor, $this->usuario, $this->password);
                if ($link) {
                    $select_bd = mysql_select_db($this->base_datos, $link);
                    @mysql_query("SET NAMES 'utf8'");
                }
                break;
            case 'mysqli':
                $link = new mysqli($this->servidor, $this->usuario, $this->password, $this->base_datos);
                if ($link) {
                    $link->set_charset("utf8");
                }
                break;
            case 'sqlserver':
                $connectionInfo = array("Database" => $this->base_datos, "UID" => $this->usuario, "PWD" => $this->password);
                $link           = sqlsrv_connect($this->servidor, $connectionInfo);
                break;

        }

        if (!$link) {
            //error_log(0,'Problema de conexión a la base de datos.');
            date_default_timezone_set('America/Mexico_City');
            $message_error = "DATE: " . date("Y/m/d H:i:s") . "\r\nMESSAGE: Problema de conexión a la base de datos.\r\n";
            switch ($this->tipo) {
                case 'mysql':
                    $message_error += mysql_errno() . ": " . mysql_error() . "\r\n\r\n";
                    break;

                case 'mysqli':
                    $message_error += $link->connect_errno . ": " . $link->connect_error . "\r\n\r\n";
                    break;
            }
            error_log($message_error, 3, "../errors.log");
            exit("Fecha del servidor: " . date("Y/m/d H:i:s") . '<br>Perdonen las molestias. Tenemos un problema técnico. Esperamos resolverlo en los próximos minutos');
        } else {
            $this->link = $link;
        }
    }

    public function cerrarConexion()
    {
        switch ($this->tipo) {
            case 'mysql':
                mysql_close($this->link);
                break;
            case 'mysqli':
                $this->link->close();
                break;
        }

    }

    /**
     * Para ejecutar una sentencia sql
     **/
    public function ejecutar($sql)
    {
        switch ($this->tipo) {
            case 'mysql':
                $this->stmt = mysql_query($sql, $this->link);
                break;
            case 'mysqli':
                $this->stmt = $this->link->query($sql);
                break;
            case 'sqlserver':
                $this->stmt = sqlsrv_query($this->link, $sql);
        }
        return $this->stmt;
    }

    public function ejecutar2($sProcedimiento, $param)
    {
        $sWhere = "";

        if ($param != "") {
            $i = 0;
            foreach ($param as $key => $value) {
                if ($i == 0) {
                    $sWhere .= $key . " = '" . utf8_decode($value) . "'";
                    $arrayvalue = array($value);
                } else {
                    $sWhere .= ", " . $key . "= '" . utf8_decode($value) . "'";
                    array_push($arrayvalue, $value);
                }

                $i += 1;
            }
        }

        $stmt1      = "EXEC  " . $sProcedimiento . " " . $sWhere;
        $this->stmt = sqlsrv_query($this->link, $stmt1);
        if ($this->stmt === false) {
            echo "Error";
            #die(print_r(sqlsrv_errors(), true));
        }
        return $this->stmt;
    }

    public function ejecutar_devuelve_id($sProcedimiento, $param, $devuelve)
    {
        $query       = "EXEC ". $sProcedimiento . " ";
        $parametros2 = $param;
        $limitador   = true;
        $devuelve_id = $devuelve;
        foreach ($parametros2 as $key => $value) {
            $coma = ($limitador) ? '' : ',';
            $query .= $coma . $key . " = ? ";
            $valor[$key] = $value;

            $tipo = ($devuelve_id == $key) ? SQLSRV_PARAM_OUT : SQLSRV_PARAM_IN;
            if ($limitador) {
                $params = array(array(&$valor[$key], $tipo));
            } else {
                $tkey = array(&$valor[$key], $tipo);
                array_push($params, $tkey);
            }
            $limitador = false;
        }
        $stmt2 = sqlsrv_prepare($this->link, $query, $params);
        if (!$stmt2) {
            echo "Error de SQL PREPARE2";
            print_r(sqlsrv_errors());
        }
        $result = sqlsrv_execute($stmt2);
        if (!$result) {
            echo "Error de ejecucion";
            print_r(sqlsrv_errors());
        }
        sqlsrv_next_result($stmt2);
        return $valor[$devuelve_id];
    }

    /**
     * Para obtener una fila de resultados de la sentencia sql
     **/
    public function obtenerFila($stmt, $fila)
    {
        switch ($this->tipo) {
            case 'mysql':
                if ($fila == 0) {
                    $this->array = mysql_fetch_array($stmt);
                } else {
                    mysql_data_seek($stmt, $fila);
                    $this->array = mysql_fetch_array($stmt);
                }
                break;
            case 'mysqli':
                if ($fila == 0) {
                    $this->array = $stmt->fetch_array(MYSQLI_BOTH);
                } else {
                    $stmt->data_seek($fila);
                    $this->array = $stmt->fetch_array(MYSQLI_BOTH);
                }
                break;
        }
        return $this->array;
    }

    public function lastID()
    {
        switch ($this->tipo) {
            case 'mysql':
                return mysql_insert_id($this->link);
                break;

            case 'mysqli':
                return $this->link->insert_id;
                break;
        }
    }

}

?>