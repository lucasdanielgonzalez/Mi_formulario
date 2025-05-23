<?php

// Conexion a la base de datos 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contacto";


// Crear la conexion 

$conn = new mysqli($servername , $username , $password , $dbname);

// Verificar la conexion 

if($conn -> connect_error) {
    die ("Conexion Fallida" . $conn ->connect_error);
}

//Obtener los datos del formulario 

$nombre = $_POST ['name'];
$email = $_POST ['email'];
$mensaje = $_POST['message'];


// Evitar inyecciones de SQL

$nombre = $conn-> real_escape_string($nombre);
$email  = $conn-> real_escape_string($email);
$mensaje = $conn-> real_escape_string($mensaje);

//Insertar a la base de datos 

$sql = "INSERT INTO mensajes (nombre, email , mensaje)
 VALUES ('$nombre', '$email', '$mensaje')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
        alert('✅ Mensaje guardado correctamente.');
        window.location.href = 'form.html';
    </script>";
}


?>