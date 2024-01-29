<?php
include "koneksidatabase.php";

$data = $_POST;

// var_dump($data);
// die;
$id = $_POST['editId'];
$nim = $_POST['nim'];
$name = $_POST['name'];
$konsentrasi = $_POST['konsentrasi'];
$kurikulum = $_POST['kurikulum'];

$query = "UPDATE tb_mhs SET 
                    nim = '$nim',
                    name = '$name',
                    konsentrasi = '$konsentrasi',
                    kurikulum = '$kurikulum'
                    WHERE id = '$id'";

$eksekusi = mysqli_query($db, $query);

// var_dump($eksekusi);
// die;
if ($eksekusi) {
    echo "<script> 
            alert('Data Berhasil diubah!');
            window.location='index.php';
    
    </script>";
} else {
    echo "<script> 
    alert('Data Gagal diubah!');
    window.location='index.php';

</script>";
}
?>
