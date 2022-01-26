
<?php
    $servidor="localhost";
    $database="bd_prestamos";
    $usuario="root";
    $password=""; 

    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=$database", $usuario, $password);
        //se logro establecer la conexión
    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
        $conexion=null;
    }
?>

