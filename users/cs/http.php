<?php 

require_once '../../config/db_connect.php';

for ($i = 0; $i < count($_FILES['files']['name']); $i++) {
  $idLaporan = $_POST['idLaporan'];
  $fileName = $_FILES['files']['name'][$i];
  $fileTemp = $_FILES['files']['tmp_name'][$i];

  $fileName = time() . $i . '_' . $fileName;

  move_uploaded_file($fileTemp, '../../uploads/' . $fileName);

  $query = "INSERT INTO bukti
            VALUES (NULL, $idLaporan, '$fileName', NULL)";
  $result = $db->query($query);
  
  if (!$result) {
    die('Could not update the status: <br>' . $db->error . '<br>Query: ' . $query);
  }
}
