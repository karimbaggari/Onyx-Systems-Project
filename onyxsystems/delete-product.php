<?php
    include "db_conn.php";

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $product_id_delete = $_REQUEST['id-delete'];
    
    $sql = "DELETE FROM products WHERE productId = '$product_id_delete'";
            
    if (mysqli_query($conn, $sql)) {
        header("Location: dashboard.php");
    }      
?>