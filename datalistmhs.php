<?php
require_once 'koneksidatabase.php';

$sql = "SELECT * FROM tb_mhs WHERE is_deleted = 0";
$result = mysqli_query($db, $sql);

$data = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $edit_url = "";
        $delete_url = "";
        $detail_url = "";

        $edit_url = "<a href='#editModal' class='btn btn-sm btn-info white edit' data-toggle='modal' data-id='{$row['id']}'><i class='fas fa-edit'></i> Ubah</a>";
        $delete_url = "<a href='#' class='btn btn-sm btn-danger white delete' data-id='{$row['id']}'><i class='fas fa-times'></i> Delete</a>";
        $detail_url = "<a href='#' class='btn btn-sm btn-warning white detail' data-toggle='modal' data-target='#detailModal' data-id='{$row['id']}'><i class='fas fa-eye'></i> Detail</a>";

        $nestedData['id'] = $row['id'];
        $nestedData['nim'] = $row['nim'];
        $nestedData['name'] = $row['name'];
        $nestedData['konsentrasi'] = $row['konsentrasi'];
        $nestedData['kurikulum'] = $row['kurikulum'];
        $nestedData['action'] = $edit_url . " " . $delete_url . " " . $detail_url;
        $data[] = $nestedData;
    }
}

$json_data = array(
    "data" => $data,
);

header('Content-Type: application/json');

echo json_encode($json_data);
?>
