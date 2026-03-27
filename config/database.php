<?php
$LOCAL_HOST = 'localhost';
$LOCAL_DBNAME = 'app_beta';
$LOCAL_USERNAME = 'postgres';
$LOCAL_PASSWORD = 'unicesmag';
$LOCAL_PORT = '5432';

try {
    $conn = new PDO(
        "pgsql:host=$LOCAL_HOST;port=$LOCAL_PORT;dbname=$LOCAL_DBNAME",
        $LOCAL_USERNAME,
        $LOCAL_PASSWORD
    );

    // Para que muestre errores
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conexión exitosa"; // SOLO PARA PRUEBA

} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>