<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crud Native</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<?php
include "koneksidatabase.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nim = $_POST['nim'];
  $name = $_POST['name'];
  $konsentrasi = $_POST['konsentrasi'];
  $kurikulum = $_POST['kurikulum'];

  $query = "INSERT INTO tb_mhs (nim, name, konsentrasi, kurikulum, is_deleted) VALUES 
            ('$nim', '$name', '$konsentrasi', '$kurikulum', 0)";

  $eksekusi = mysqli_query($db, $query);

  if ($eksekusi) {
    $message = "Data Berhasil ditambahkan!";
  } else {
    $message = "Data Gagal ditambahkan!";
  }
}
?>
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <a id="open_add_modal" data-toggle="modal" data-target="#addStudentModal"><button>Tambah mhs</button></a>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="table" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Konsentrasi</th>
                      <th>Kurikulum</th>
                      <th>Pic</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addStudentModalLabel">Tambah Mahasiswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" id="form-datamhs" enctype="multipart/form-data" method="POST">
            <div class="form-group">
              <label for="nama">Nim:</label>
              <input type="text" class="form-control" id="nim" name="nim" required>
            </div>
            <div class="form-group">
              <label for="nama">Nama:</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
              <label for="nama">Konsentrasi:</label>
              <input type="text" class="form-control" id="name" name="konsentrasi" required>
            </div>
            <div class="form-group">
              <label for="nama">Kurikulum:</label>
              <input type="text" class="form-control" id="name" name="kurikulum" required>
            </div>


            <button type="submit" class="btn btn-primary">Tambah Mahasiswa</button>
          </form>
        </div>
    
      </div>
    </div>
  </div>
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog"   aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="prosesedit.php" id="form-datamhs" enctype="multipart/form-data" method="POST">
                    <input type="hidden" id="editId" name="editId">
                    <div class="form-group">
                        <label for="editNim">Nim:</label>
                        <input type="text" class="form-control" id="editNim" name="nim" required>
                    </div>
                    <div class="form-group">
                        <label for="editName">Nama:</label>
                        <input type="text" class="form-control" id="editName" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="editKonsentrasi">Konsentrasi:</label>
                        <input type="text" class="form-control" id="editKonsentrasi" name="konsentrasi" required>
                    </div>
                    <div class="form-group">
                        <label for="editKurikulum">Kurikulum:</label>
                        <input type="text" class="form-control" id="editKurikulum" name="kurikulum" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Detail Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="detailNim">Nim:</label>
                    <p id="detailNim"></p>
                </div>
                <div class="form-group">
                    <label for="detailName">Nama:</label>
                    <p id="detailName"></p>
                </div>
                <div class="form-group">
                    <label for="detailKonsentrasi">Konsentrasi:</label>
                    <p id="detailKonsentrasi"></p>
                </div>
                <div class="form-group">
                    <label for="detailKurikulum">Kurikulum:</label>
                    <p id="detailKurikulum"></p>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>

<script src="datamhs.js"></script>
