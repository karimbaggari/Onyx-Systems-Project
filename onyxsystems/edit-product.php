<?php
    include "db_conn.php";

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $product_id = $_REQUEST['id'];
    $microprocessor_edit = $_REQUEST['microprocessor']; 
    $memory_edit = $_REQUEST['memory']; 
    $video_graphics_edit = $_REQUEST['video-graphics'];
    $hard_drive_edit = $_REQUEST['hard-drive'];
            
    $sql = "UPDATE products SET productCpu='$microprocessor_edit', productRam='$memory_edit', productGpu='$video_graphics_edit', productHdd='$hard_drive_edit'
    WHERE productId = '$product_id'";
            
    if (mysqli_query($conn, $sql)) {
        header("Location: dashboard.php");
    }      
?>