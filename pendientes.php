<?php
header('Content-Type: application/json');
$archivo = 'pagos.json';
if (file_exists($archivo)) {
    echo file_get_contents($archivo);
} else {
    echo "[]";
}
?>