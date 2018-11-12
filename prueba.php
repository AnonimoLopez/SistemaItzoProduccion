<?php
$servidor   = 'localhost';
$base_datos = 'Calificaciones';
$usuario    = 'sa';
$password   = 'joselopez156';
$tipo       = 'sqlserver';
$stmt       = null;

$connectionInfo = array("Database" => $base_datos, "UID" => $usuario, "PWD" => $password);
$link           = sqlsrv_connect($servidor, $connectionInfo);

$totalPaginas = 0;
$result       = null;
$result       = array();
$query        = "EXEC DBO.pXCAT_CARRERA_G ";
$parametros2   = array('@CARRERA' => 'Hola mundo32', "@CVE_CARRERA" => '-99', '@ACTIVO' => '0', '@PARAMETRO' => '1000000');
$limitador    = true;
$dVuelve      = '@PARAMETRO';
$params       = null;
$tkey = null;
$valor1=array();
$i=0;
foreach ($parametros2 as $key => $value) {
    $coma = ($limitador) ? '' : ',';
    $query .= $coma . $key . " = ? ";
    echo $value . "</br>";
    $valor[$key] = $value;

    $tipo = ($dVuelve == $key) ? SQLSRV_PARAM_OUT : SQLSRV_PARAM_IN;
    if ($limitador) {
        $params = array(array(&$valor[$key], $tipo));
    } else {
        $tkey = array(&$valor[$key], $tipo);
        array_push($params, $tkey);
    }

    $i+=1;
    $limitador = false;
}



    $stmt2 = sqlsrv_prepare($link, $query, $params);
    if (!$stmt2) {
        echo "Error de SQL PREPARE2";
        print_r(sqlsrv_errors());
        // show errors
    }
    $result = sqlsrv_execute($stmt2);
    if (!$result) {
        print_r(sqlsrv_errors());
    }




sqlsrv_next_result($stmt2);

echo ('Total Paginas: ' . $valor);
