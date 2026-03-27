<?php
require_once 'config/database.php';

$email = $_POST['email'] ?? 'test@gmail.com';
$telefono = $_POST['telefono'] ?? '123456789';
$password = $_POST['password'] ?? '123456';

// Validar email
$query = "SELECT * FROM usuarios WHERE email = :email";
$stmt = $conn->prepare($query);
$stmt->bindParam(':email', $email);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    echo "El correo ya está registrado";
    exit;
}

// Validar teléfono
$query = "SELECT * FROM usuarios WHERE telefono = :telefono";
$stmt = $conn->prepare($query);
$stmt->bindParam(':telefono', $telefono);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    echo "El número ya está en uso";
    exit;
}

// Encriptar contraseña
$passwordHash = password_hash($password, PASSWORD_BCRYPT);

try {
    $conn->beginTransaction();

    $query = "INSERT INTO usuarios (email, telefono, password) 
              VALUES (:email, :telefono, :password)";
    
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':password', $passwordHash);
    $stmt->execute();

    $conn->commit();

    echo "Usuario registrado correctamente";

} catch (Exception $e) {
    $conn->rollBack();
    echo "Error en el registro";
}
?>