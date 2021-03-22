<?php
    include "db_conn.php";

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $name = $_REQUEST['name']; 
    $brand = $_REQUEST['brand']; 
    $microprocessor = $_REQUEST['microprocessor']; 
    $memory = $_REQUEST['memory']; 
    $video_graphics = $_REQUEST['video-graphics'];
    $hard_drive = $_REQUEST['hard-drive'];
            
    $sql = "INSERT INTO products (productName, productBrand, productCpu, productRam, productGpu, productHdd) VALUES ('$name', '$brand', '$microprocessor', '$memory', '$video_graphics', '$hard_drive')";  
            
    if (mysqli_query($conn, $sql)) {
        header("Location: dashboard.php");
    }      
?>