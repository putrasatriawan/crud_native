<?php
include "koneksidatabase.php";

$id = $_GET['id'];

$query = "UPDATE tb_mhs SET 
          is_deleted = 1
          WHERE id = $id";

$eksekusi = mysqli_query($db, $query);

if ($eksekusi) {
    echo "<script> 
           
            window.location.reload(); 
          </script>";
} else {
    echo "<script> 
         
            window.location.reload(); 
          </script>";
}
?>
