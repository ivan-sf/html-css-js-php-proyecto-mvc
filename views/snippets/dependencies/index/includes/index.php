<?php
use models\Conexion as conexion;
$conexion = new Conexion;

echo "Hello friend on view <br>";
if($conexion){
    echo "Conexion a la bd desde view <br>";
}else{
    echo "no";
}