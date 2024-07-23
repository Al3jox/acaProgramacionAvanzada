<?php

    include ("crearDB.php");

    $txtPlate = $_POST["txtPlate"];
    $txtBrand = $_POST["txtBrand"];
    $txtModel = $_POST["txtModel"];
    $txtColor = $_POST["txtColor"];

    $query = "INSERT INTO auto(placa, marca, modelo, color) VALUES (?,?,?,?)";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssis", $txtPlate,$txtBrand,$txtModel,$txtColor);
    $stmt->execute();

    echo "<h2>El vehiculo se registró exitosamente en la base de datos!</h2>";

    // Header("Location: index.html");
    Header("Location: prueba.html");


    $conn->close();

?>

