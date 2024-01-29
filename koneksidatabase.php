<?php
$db = mysqli_connect("localhost", "root", "", "crud_ajax");
if (!$db) {
  echo "Koneksi error";
}
