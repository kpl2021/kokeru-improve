<?php 

function getCsCount() {
  global $db;

  $query = "SELECT COUNT(id_cs) AS csCount FROM cs";
  $result = $db->query($query);

  if (!$result) {
    die('Could not query the database: <br>' . $db->error . '<br>Query: ' . $query);
  }

  return $result;
}

function getRoomsCount() {
  global $db;

  $query = "SELECT COUNT(id_ruang) AS roomCount FROM ruang";
  $result = $db->query($query);

  if (!$result) {
    die('Could not query the database: <br>' . $db->error . '<br>Query: ' . $query);
  }

  return $result;
}

function getRoomsCountByStatus($status) {
  global $db;

  $query = "SELECT COUNT(id_laporan) AS roomCountByStatus
            FROM laporan
            WHERE status = '$status' AND DATE(created_at) = CURDATE()";
  $result = $db->query($query);

  if (!$result) {
    die('Could not query the database: <br>' . $db->error . '<br>Query: ' . $query);
  }

  return $result;
}

function getAllCS() {
  global $db;

  $query = "SELECT * FROM cs";
  $result = $db->query($query);

  if (!$result) {
    die('Could not query the database: <br>' . $db->error . '<br>Query: ' . $query);
  }

  return $result;
}

function createCs() {
  global $db;

  if (isset($_POST['createCs'])) {
    if (empty($_POST['createCsName']) && empty($_POST['createCsEmail']) && empty($_POST['createCsPassword'])) {
      return 'Please fill the form';
    } else {
      $csName = $_POST['createCsName'];
      $csEmail = $_POST['createCsEmail'];
      $csPassword = $_POST['createCsPassword'];
      $csNoHP = $_POST['createCsNo'];

      $csPassword = sha1($csPassword);

      $query = "INSERT INTO cs VALUES (NULL, '$csName', '$csEmail', '$csPassword', '$csNoHP');";
      $result = $db->query($query);

      if (!$result) {
        die('Could not add the data: <br>' . $db->error . '<br>Query: ' . $query);
      }

      header('Location: cs.php');
      return;
    }
  }
}

function deleteCs() {
  global $db;

  if (isset($_POST['deleteCs'])) {
    $csId = $_POST['deleteCsId'];

    $query = "DELETE FROM cs WHERE id_cs='$csId'";
    $result = $db->query($query);

    if (!$result) {
      die('Could not delete the data: <br>' . $db->error . '<br>Query: ' . $query);
    }

    header('Location: cs.php');
    return;
  }
}
deleteCs();

function assignCs() {
  global $db;

  if (isset($_POST['submitAssignCs'])) {
    $roomId = $_POST['assignCsRoomId'];
    $csId = $_POST['assignCs'];

    $query = "UPDATE jadwal SET id_cs='$csId' WHERE id_ruang='$roomId'";
    $result = $db->query($query);

    if (!$result) {
      die('Could not update the data: <br>' . $db->error . '<br>Query: ' . $query);
    }

    header('Location: room.php?source=manage');
    return;
  }
}

function getRooms() {
  global $db;

  $query = "SELECT * FROM ruang";
  $result = $db->query($query);

  if (!$result) {
    die('Could not query the database: <br>' . $db->error . '<br>Query: ' . $query);
  }

  return $result;
}

function createRoom() {
  global $db;

  if (isset($_POST['create'])) {
    if (empty($_POST['createRoomName'])) {
      return 'Please provide a room name';
    } else {
      $roomName = $_POST['createRoomName'];

      $query = "INSERT INTO ruang (nama_ruang) VALUES ('$roomName');";
      $result = $db->query($query);

      if (!$result) {
        die('Could not add the data: <br>' . $db->error . '<br>Query: ' . $query);
      }

      header('Location: room.php?source=manage');
      return;
    }
  }
}

function editRoom() {
  global $db;

  if (isset($_POST['edit'])) {
    $roomId = $_POST['editRoomId'];
    $roomName = $_POST['editRoomName'];

    $query = "UPDATE ruang SET nama_ruang='$roomName' WHERE id_ruang='$roomId'";
    $result = $db->query($query);

    if (!$result) {
      die('Could not update the data: <br>' . $db->error . '<br>Query: ' . $query);
    }

    header('Location: room.php?source=manage');
    return;
  }
}
editRoom();

function deleteRoom() {
  global $db;

  if (isset($_POST['delete'])) {
    $roomId = $_POST['deleteRoomId'];

    $query = "DELETE FROM ruang WHERE id_ruang='$roomId'";
    $result = $db->query($query);

    if (!$result) {
      die('Could not delete the data: <br>' . $db->error . '<br>Query: ' . $query);
    }

    header('Location: room.php?source=manage');
    return;
  }
}
deleteRoom();

function getJadwal() {
  global $db;

  $query = "SELECT * FROM jadwal J";
  $result = $db->query($query);

  if (!$result) {
    die('Could not query the database: <br>' . $db->error . '<br>Query: ' . $query);
  }

  return $result;
}

function getJadwalByRuang($roomName) {
  global $db;

  $query = "SELECT * 
            FROM jadwal J
            JOIN ruang R ON J.id_ruang = R.id_ruang
            JOIN cs CS ON J.id_cs = CS.id_cs
            WHERE nama_ruang = '$roomName'";
  $result = $db->query($query);

  if (!$result) {
    die('Could not query the database: <br>' . $db->error . '<br>Query: ' . $query);
  }

  return $result;
}

function getLaporanRooms() {
  global $db;

  $nData = 30;
  $nDataPerPage = 12;
  $nPage = ceil($nData / $nDataPerPage);

  $activePage = (isset($_GET['page'])) ? $_GET['page'] : 1;
  $startIndex = ($nDataPerPage * $activePage) - $nDataPerPage;

  $query = "SELECT *
            FROM laporan L 
            JOIN jadwal J ON L.id_jadwal = J.id_jadwal
            LEFT JOIN ruang R ON J.id_ruang = R.id_ruang
            LEFT JOIN cs CS ON J.id_cs = CS.id_cs
            WHERE DATE(created_at) = CURDATE()
            ORDER BY L.created_at DESC, R.nama_ruang ASC
            LIMIT $startIndex, $nDataPerPage";
  $result = $db->query($query);

  if (!$result) {
    die('Could not query the database: <br>' . $db->error . '<br>Query: ' . $query);
  }

  return [$result, $nPage];
}

function getLaporanByDateStatus() {
  global $db;

  if (isset($_GET['generatePrintData'])) {
    $date = $_GET['date'];
    $status = $_GET['status'];

    if ($status == '') {
      return;
    } else if ($status == 'semua') {
      $query = "SELECT *
                FROM laporan L 
                JOIN jadwal J ON L.id_jadwal = J.id_jadwal
                LEFT JOIN ruang R ON J.id_ruang = R.id_ruang
                LEFT JOIN cs CS ON J.id_cs = CS.id_cs
                WHERE DATE(created_at) = '$date'
                ORDER BY R.nama_ruang ASC";
    } else {
      $query = "SELECT *
                FROM laporan L 
                JOIN jadwal J ON L.id_jadwal = J.id_jadwal
                LEFT JOIN ruang R ON J.id_ruang = R.id_ruang
                LEFT JOIN cs CS ON J.id_cs = CS.id_cs
                WHERE DATE(created_at) = '$date' AND status = '$status'
                ORDER BY R.nama_ruang ASC";
    }

    $result = $db->query($query);

    if (!$result) {
      die('Could not query the database: <br>' . $db->error . '<br>Query: ' . $query);
    }

    return $result;
  }
}

function resetStatus() {
  global $db;

  if (isset($_POST['resetStatus'])) {
    $createdAt = date('Y-m-d H:i:s', time());

    $resultJadwal = getJadwal();

    while ($jadwal = $resultJadwal->fetch_object()) {
      $idJadwal = $jadwal->id_jadwal;

      $query = "INSERT INTO laporan
                VALUES (NULL, '$idJadwal', 'belum', '$createdAt', '$createdAt');";
    
      $result = $db->query($query);

      if (!$result) {
        die('Could not delete the data: <br>' . $db->error . '<br>Query: ' . $query);
      }
    }

    header('Location: room.php');
    return;
  }
}
resetStatus();