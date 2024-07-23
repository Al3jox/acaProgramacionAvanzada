<?php

    // Función para conectar a la base de datos
    function connectToDB($server, $username, $password) {
        $conn = new mysqli($server, $username, $password);
        if ($conn->connect_error) {
            throw new Exception("Error de conexión: " . $conn->connect_error);
        }
        return $conn;
    }

    // Función para crear la base de datos
    function createDB($conn, $dbName) {
        $conn->query("CREATE DATABASE IF NOT EXISTS $dbName");
        if ($conn->connect_error) {
            throw new Exception("Error al crear la base de datos: " . $conn->connect_error);
        }
    }

    // Función para seleccionar la base de datos
    function selectDB($conn, $dbName) {
        $conn->select_db($dbName);
        if ($conn->connect_error) {
            throw new Exception("Error al seleccionar la base de datos: " . $conn->connect_error);
        }
    }

    // Función para crear la tabla
    function createTable($conn, $tableName, $query) {
        $query = "CREATE TABLE IF NOT EXISTS $tableName ($query)";
        $conn->query($query);
        if ($conn->connect_error) {
            throw new Exception("Error al crear la tabla: " . $conn->connect_error);
        }
    }

    // **Primera ejecución:**

    try {
        // Conexión a la base de datos
        $conn = connectToDB("localhost", "root", "");

        // **Creación de la base de datos**
        createDB($conn, "concesionario");

        // Selección de la base de datos
        selectDB($conn, "concesionario");

        // Creación de la tabla
        createTable($conn, "auto", "
            placa varchar(6) PRIMARY KEY,
            marca varchar(15) NOT NULL,
            modelo int NOT NULL,
            color varchar(10) NOT NULL
        ");

        echo "Base de datos y tabla creadas correctamente";

    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }

    Header("Location: index.html");

?>
