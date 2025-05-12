<?php
// Registrar un pago recibido desde la app del técnico
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idFactura = $_POST['idFactura'] ?? '';
    $cedula = $_POST['cedula'] ?? '';
    $nombre = $_POST['nombre'] ?? '';

    if ($idFactura && $cedula && $nombre) {
        $nuevoPago = array(
            "idFactura" => $idFactura,
            "cedula" => $cedula,
            "nombre" => $nombre
        );

        $archivo = 'pagos.json';
        $pagos = file_exists($archivo) ? json_decode(file_get_contents($archivo), true) : array();
        $pagos[] = $nuevoPago;
        file_put_contents($archivo, json_encode($pagos, JSON_PRETTY_PRINT));
        echo "Pago registrado correctamente.";
    } else {
        echo "Faltan datos.";
    }
} else {
    echo "Método no permitido.";
}
?>