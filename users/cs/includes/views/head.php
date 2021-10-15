<?php 

ob_start();
session_start();

require_once '../../config/db_connect.php';

if (!isset($_SESSION['email'])) {
  header('Location: auth/login.php');
} else {

  $query = "SELECT * FROM cs WHERE email='" . $_SESSION['email'] . "'";
  $result = $db->query($query);

  if (!$result) {
    die('Could not get the user: <br>' . $db->error . '<br>Query: ' . $query);
  } else {

    while ($row = $result->fetch_object()) {
      $_SESSION['user'] = $row;
      $_SESSION['email'] = $row->email;
    }
    
  }
}

?>
<?php require_once 'includes/functions.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="shortcut icon" type="image/x-icon" href="../../favicon.ico" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Dashboard | KoKeRu</title>
  <link href="../css/styles.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
  <link rel="stylesheet" href="../css/bootstrap.fd.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>