$(document).ready(function () {
  //   App.baseUrl = document.getElementById("base_url").value;

  App.init();
});

var App = {
  init: function () {
    App.initEvent();
    App.initEdit();
    App.initDelete();
    App.initDetail();
    // App.addButton();
  },
  initEvent: function () {
    App.table = $("#table").DataTable({
      language: {
        search: "Cari",
        lengthMenu: "Tampilkan _MENU_ baris per halaman",
        zeroRecords: "Data tidak ditemukan",
        info: "Menampilkan _PAGE_ dari _PAGES_",
        infoEmpty: "Tidak ada data yang ditampilkan ",
        infoFiltered: "(pencarian dari _MAX_ total records)",
        paginate: {
          first: "Pertama",
          last: "Terakhir",
          next: "Selanjutnya",
          previous: "Sebelum",
        },
      },
      responsive: true,
      processing: true,
      serverSide: true,
      ajax: {
        url: "datalistmhs.php",
        dataType: "json",
        type: "POST",
      },

      columns: [
        { data: "id" },
        { data: "name" },
        { data: "nim" },
        { data: "konsentrasi" },
        { data: "kurikulum" },
        { data: "action", orderable: false },
      ],
    });

    if ($("#form-datamhs").length > 0) {
      $("#save-btn-datamhs").removeAttr("disabled");
      $("#form-datamhs").validate({
        rules: {
          nim: {
            required: true,
          },
          name: {
            required: true,
          },
          konsentrasi: {
            required: true,
          },
          kurikulum: {
            required: true,
          },
        },
        messages: {
          nim: {
            required: "Nim Harus Diisi",
          },
          name: {
            required: "Nama Harus Diisi",
          },
          konsentrasi: {
            required: "Konsenstrasi Harus Diisi",
          },
          kurikulum: {
            required: "Kurikulum Harus Diisi",
          },
        },

        submitHandler: function (form) {
          // console.log(form);
          form.submit();
        },
      });
    }

    // Initiate Confirm Event
  },
  initDelete: function () {
    $("#table tbody").on("click", ".delete", function () {
      console.log("hai");
      var id = $(this).data("id");

      if (confirm("Are you sure you want to delete this data?")) {
        $.ajax({
          url: "delete.php?id=" + id,
          type: "GET",
          success: function (result) {
            console.log(result);
          },
          error: function (xhr, status, error) {
            console.error(xhr.responseText);
          },
        });
      }
    });
  },
  initEdit: function () {
    $("#table tbody").on("click", ".edit", function () {
      var id = $(this).data("id");
      console.log(id);
      var apiUrl = "datamhs.php?id=" + id;
      $.ajax({
        url: apiUrl,
        method: "GET",
        success: function (response) {
          $("#editId").val(response.id);
          $("#editNim").val(response.nim);
          $("#editName").val(response.name);
          $("#editKonsentrasi").val(response.konsentrasi);
          $("#editKurikulum").val(response.kurikulum);
          $("#editModal").modal("show");
        },
        error: function (error) {
          console.log(error);
        },
      });
    });
  },
  initDetail: function () {
    $("#table tbody").on("click", ".detail", function () {
      var id = $(this).data("id");
      console.log(id);
      var apiUrl = "datamhs.php?id=" + id;
      $.ajax({
        url: apiUrl,
        method: "GET",
        success: function (response) {
          $("#detailNim").text(response.nim);
          $("#detailName").text(response.name);
          $("#detailKonsentrasi").text(response.konsentrasi);
          $("#detailKurikulum").text(response.kurikulum);
          $("#detailModal").modal("show");
        },
        error: function (error) {
          console.log(error);
        },
      });
    });
  },
};
