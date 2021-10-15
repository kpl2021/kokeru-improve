<?php

require_once '../../../../config/db_connect.php';

$userid = 0;
$id = 1;
if (isset($_POST['userid'])) {
  $userid = mysqli_real_escape_string($db, $_POST['userid']);
}

$sql = "SELECT * FROM bukti WHERE id_laporan=" . $userid;
$result = $db->query($sql);

$response = '<div class="container-fluid">';
$response .= '<div class="row">';

while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
 
  $emp_name = $row['nama_file'];
  $response .= '<div class="col-6">';

  if (strpos($emp_name,'.png') !== false) {
    $response .= '<a href = "../../uploads/' . $emp_name . '" target="_blank"><img src="../../uploads/' . $emp_name . '" style="width: 90%; height: 90%;"></a>';
  } else if (strpos($emp_name,'.jpeg') !== false) {
    $response .= '<a href = "../../uploads/' . $emp_name . '" target="_blank"><img src="../../uploads/' . $emp_name . '" style="width: 90%; height: 90%;"></a>'; 
  } else if (strpos($emp_name,'.jpg') !== false) {
    $response .= '<a href = "../../uploads/' . $emp_name . '" target="_blank"><img src="../../uploads/' . $emp_name . '" style="width: 90%; height: 90%;"></a>';
  } else if (strpos($emp_name,'.gif') !== false) {
    $response .= '<a href = "../../uploads/' . $emp_name . '" target="_blank"><img src="../../uploads/' . $emp_name . '" style="width: 90%; height: 90%;"></a>';
  } else {
    $response .= '<video width="90%" height="90%" controls>
    <source src="../../uploads/' . $emp_name . '" type="video/mp4">
    <source src="../../uploads/' . $emp_name . '" type="video/ogg">
    <source src="../../uploads/' . $emp_name . '" type="video/mkv">
    Your browser does not support the video tag.
    </video>';
  }
  $response .= "</div>";
}

$response .= "</div>";
$response .= "</div>";

echo $response;
exit;