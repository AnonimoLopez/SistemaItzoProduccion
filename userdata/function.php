<?php

#print __DIR__;
#print dirname(__FILE__);
require __DIR__ . "\..\database\class.config.php";
require __DIR__ . "\..\database\class.db.php";

class Principal
{

    private $bd;
    private $sql;
    private $serveName = "/SistemaItzo";

    public function LlenarSelect($nombre_Procedimiento, $value, $descripcion, $id, $texto)
    {
        $sql = ' <div class="form-group">
   <label for="' . $id . '">' . $texto . '</label>
   <select class="form-control" id="' . $id . '" onchange="onChangeV(this.id,this.value)" >';
   $sql .= "<option>SELECCIONAR</option>";
        define('CHARSET', 'UTF-8');
        header('Content-type: text/html; charset=' . CHARSET);
        $stmt1         = "execute " . $nombre_Procedimiento;
        $stmt1Prepared = sprintf($stmt1, "CURRENT_DATE");
        $bd            = DataBase::getInstance();
        $result        = $bd->ejecutar($stmt1);
        if ($result) {
            while ($fila = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                $sql .= "<option value='" . $this->encriptar($fila[$value]) . "'>" . utf8_encode($fila[$descripcion]) . "</option>";
            }
        }

        $sql .= '</select>
   </div>';

        return $sql;
    }

    public function guardar($nombre_Procedimiento, $parametros)
    {
        $stmt1         = $nombre_Procedimiento;
        $stmt1Prepared = sprintf($stmt1, "CURRENT_DATE");
        $bd            = DataBase::getInstance();
        $result        = $bd->ejecutar2($stmt1, $parametros);
        return $result;
    }

    public function guardar_devuelve_id($nombre_Procedimiento, $parametros, $devuelve_id)
    {
        $stmt1         = $nombre_Procedimiento;
        $stmt1Prepared = sprintf($stmt1, "CURRENT_DATE");
        $bd            = DataBase::getInstance();
        $result        = $bd->ejecutar_devuelve_id($stmt1, $parametros, $devuelve_id);
        return $result;
    }

    public function LlenarSelect2($nombre_Procedimiento, $value, $descripcion, $id, $texto, $parametros)
    {
        $sql = ' <div class="form-group">
   <label for="' . $id . '">' . $texto . '</label>
   <select class="form-control" id="' . $id . '" onchange="onChangeV(this.id,this.value)">';
   $sql .= "<option>SELECCIONAR</option>";
        $stmt1Prepared = sprintf($nombre_Procedimiento, "CURRENT_DATE");
        $bd            = DataBase::getInstance();
        $result        = $bd->ejecutar2($stmt1Prepared, $parametros);
        if ($result) {
            while ($fila = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                #echo iconv('UTF-8', '', $fila[$descripcion]);
                $sql .= "<option value='" . $this->encriptar($fila[$value]) . "'>" . $fila[$descripcion] . "</option>";
            }
        }

        $sql .= '</select>
   </div>';
        return $sql;
    }

    public function querySelect($nombre_Procedimiento, $parametros = '')
    {
        $stmt1Prepared = sprintf($nombre_Procedimiento, "CURRENT_DATE");
        $bd            = DataBase::getInstance();
        $result        = $bd->ejecutar2($stmt1Prepared, $parametros);
        return $result;
    }

    public function encriptar($texto)
    {
        $key       = $_SESSION["id"]; 
        #echo "KEY: ". $key."<br>";
        #echo "DESENCRIPTAR: ". $texto."<br>";
        // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
        $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $texto, MCRYPT_MODE_CBC, md5(md5($key))));
        return $encrypted;
    }

    public function desencriptar($texto)
    {
        $key       = $_SESSION["id"]; // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
       # echo $key;
        #echo $texto;
        $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($texto), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
        return $decrypted;
    }

    public function __construct()
    {
        $this->bd        = DataBase::getInstance();
        $this->serveName = "/SistemaItzo";
        $this->Seguridad();
         session_start();
    }

    public function tabla($id_tabla, $procedimientos, $columnas, $parametros='NOT')
    {
        mb_http_output('UTF-8');
        $rows1 = '<table class="table table-hover"  id="usertable" >';
        define('CHARSET', 'UTF-8');
        header('Content-Type:text/html; charset=utf-8');
        $stmt1         = $procedimientos . " ";
        $stmt1Prepared = sprintf($stmt1, "CURRENT_DATE");
        $bd            = DataBase::getInstance();

        if ($parametros == 'NOT')
        $result = $bd->ejecutar("execute " . $stmt1);
        else
        $result = $bd->ejecutar2($stmt1Prepared, $parametros);
        if ($result) {
            $columns = explode(',', $columnas);
            $rows1 .= ' <thead><tr>';
            foreach ($columns as $item) {
                $rows1 .= '<th class="danger">' . $item . '</th>';
            }
            $rows1 .= '<td class="danger"></td><td class="danger"></td></tr></thead>
            <tbody>';

            $i = 0;

            #Rows
            while ($fila = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                $tags = explode(',', $columnas);
                $rows1 .= '<tr>';

                foreach ($tags as $key) {
                    if (($i % 2) == 0) {
                        $rows1 .= '<td class="success">' . utf8_encode($fila[$key]) . '</td>';
                    } else {

                        $rows1 .= '<td class="warning">' . utf8_encode($fila[$key]) . '</td>';
                    }
                }
                $rows1 .= '<td class="danger pSave"><i id="editar" class="glyphicon glyphicon-pencil iSave" onclick="jclick()"> </i></td>';
                $rows1 .= ' <td class="danger pDelete"><i id="eliminar" class="glyphicon glyphicon-remove iDelete" 
                    onclick="jclick()"
                    > </i></td>';
                $rows1 .= '</tr>';
                $i += 1;
            }
        }
        $rows1 .= '</tbody></table><script> $("#usertable").dataTable();</script>';
        return $rows1;
    }





    public function tabla_view($id_tabla, $procedimientos, $columnas, $class = 'csstabla', $mostrar_columnas = true, $imprimir = false,$parametros ='NOT')
    {
        mb_http_output('UTF-8');
        $rows1 = '<table class="table table-hover ' . $class . '"  id="usertable" >';
        define('CHARSET', 'UTF-8');
        header('Content-Type:text/html; charset=utf-8');
        $stmt1         =  $procedimientos;
        $stmt1Prepared = sprintf($stmt1, "CURRENT_DATE");
        $bd            = DataBase::getInstance();
        #$bd->set_charset("utf8");
        $result = $bd->ejecutar($stmt1);

       if ($parametros == 'NOT')
        $result = $bd->ejecutar("execute " . $stmt1);
        else
        $result = $bd->ejecutar2($stmt1Prepared, $parametros);

        if ($result) {

        }
        #Columnas
        $columns = explode(',', $columnas);
        if ($mostrar_columnas) {
            $rows1 .= ' <thead><tr>';
            foreach ($columns as $item) {
                $rows1 .= '<th class="danger ' . $class . '">' . $item . '</th>';
            }
            if ($imprimir == true) {

                $rows1 .= ' <td class="danger">';
            }
            $rows1 .= '</tr></thead>
            <tbody>';
        } else {
            $rows1 .= ' <thead><tr>';
            foreach ($columns as $item) {
                $rows1 .= '<th class="danger ' . $class . '"></th>';
            }

            $rows1 .= '</tr></thead>
            <tbody>';

        }

        $i = 0;

        #Rows
        while ($fila = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $tags = explode(',', $columnas);
            $rows1 .= '<tr>';

            foreach ($tags as $key) {
                if (($i % 2) == 0) {
                    $rows1 .= '<td class="success ' . $class . '">' . utf8_encode($fila[$key]) . '</td>';
                } else {

                    $rows1 .= '<td class="warning ' . $class . '">' . utf8_encode($fila[$key]) . '</td>';
                }
            }
            if ($imprimir == true) {

                $rows1 .= '<td class="danger"><i id="imprimir" class="glyphicon glyphicon-print" style="color:red; width:10; height:16; onclick="asignarx();"> </i></td>';
            }
        }
        $rows1 .= '</tr>';
        $i += 1;

        $rows1 .= '</tbody></table>';
        return $rows1;
    }
    public function calificaciones($id_tabla, $procedimientos)
    {
        mb_http_output('UTF-8');
        $rows1 = '<table class="table table-hover"><tbody>';
        $stmt1 = "execute " . $procedimientos;

        $stmt1Prepared = sprintf($stmt1, "CURRENT_DATE");
        $bd            = DataBase::getInstance();
        #$bd->set_charset("utf8");
        $result = $bd->ejecutar($stmt1);
        if ($result) {

            #Columnas
            $rows1 .= '<td class="danger">ALUMNO</td>';
            $rows1 .= '<td class="danger">MATERIA</td>';
            $rows1 .= '<td class="danger">PRIMERO</td>';
            $rows1 .= '<td class="danger">SEGUNDO</td>';
            $rows1 .= '<td class="danger">TERCERO</td>';
            $rows1 .= '<td class="danger"></td>';
            #Rows
            while ($fila = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                $tags = explode(',', $columnas);
                $rows1 .= '<tr>';
                $rows1 .= '<td class="warning">' . $fila['ALUMNO'] . '</td>';
                $rows1 .= '<td class="warning">' . $fila['MATERIA'] . '</td>';
                $rows1 .= '<td class="warning">' . $this->selected1TO10('primero', $fila['PRIMERO']) . '</td>';
                $rows1 .= '<td class="warning">' . $this->selected1TO10('segundo', $fila['SEGUNDO']) . '</td>';
                $rows1 .= '<td class="warning">' . $this->selected1TO10('tercero', $fila['TERCERO']) . '</td>';
                $rows1 .= '</tr>';

            }
        }
        $rows1 .= '</tbody></table>';
        return utf8_decode($rows1);
    }

    public function selected1TO10($id, $value)
    {
        $sql = ' <div class="form-group">
   <select class="form-control" id="' . $id . '">';

        for ($i = 1; $i <= 10; $i++) {
            if ($i == $value) {
                $sql .= "<option selected value='" . $i . "'>" . $i . "</option>";
            } else {
                $sql .= "<option value='" . $i . "'>" . $i . "</option>";
            }
        }
        $sql .= '</select>
   </div>';
        return $sql;
    }

    public function Seguridad()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            #print "METODO ACTUAL ES POST";
        } else {

            if ($_COOKIE["accesoNo"] == "") {
                setcookie("accesoNo", "1");
            } else {
                setcookie("accesoNo", $_COOKIE["accesoNo"] + 1);
            }

            # $url = 'http://' . $_SERVER['HTTP_HOST']; // Get the SERVER_NAME
            #$url .= rtrim("/SistemaItzo/menu.php", '/\\');
            #header("Location: " . $url);
        }
    }

    public function sWhere($swhere)
    {

        $sWhere = "";

        $i = 0;
        foreach ($param as $key => $value) {
            if ($i == 0) {
                $sWhere .= $key . " = ? ";
                $arrayvalue = array($value);
            } else {
                $sWhere .= ", " . $key . " = ? ";
                array_push($arrayvalue, $value);
            }

            $i += 1;
            return $sWhere;
        }
    }

    public function id_user(){
        session_start();
        return $_SESSION["id"];
    }

}

#$principal = new Principal();
