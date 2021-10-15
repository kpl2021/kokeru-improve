<?php 

function getCsRoomsCount($cs) {
  global $db;

  $query = "SELECT COUNT(id_jadwal) AS roomCount
            FROM jadwal
            WHERE id_cs = '$cs'";
  $result = $db->query($query);

  if (!$result) {
    die('Could not query the database: <br>' . $db->error . '<br>Query: ' . $query);
  }

  return $result;
}

function getCsRoomsCountByStatus($status, $cs) {
  global $db;

  $query = "SELECT COUNT(L.id_laporan) AS roomCountByStatus
            FROM laporan L
            JOIN jadwal J ON L.id_jadwal = J.id_jadwal 
            WHERE id_cs = '$cs' AND status = '$status' AND DATE(created_at) = CURDATE()";
  $result = $db->query($query);

  if (!$result) {
    die('Could not query the database: <br>' . $db->error . '<br>Query: ' . $query);
  }

  return $result;
}

function getLaporanCsRooms($csId) {
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
            WHERE J.id_cs = '$csId' AND DATE(created_at) = CURDATE()
            ORDER BY L.created_at DESC, R.nama_ruang ASC
            LIMIT $startIndex, $nDataPerPage";
  $result = $db->query($query);

  if (!$result) {
    die('Could not query the database: <br>' . $db->error . '<br>Query: ' . $query);
  }

  return [$result, $nPage];
}

function getBukti($idLaporan) {
  global $db;

  $query = "SELECT *
            FROM bukti
            WHERE id_laporan = '$idLaporan' AND DATE(created_at) = CURDATE()";
  $result = $db->query($query);

  if (!$result) {
    die('Could not query the database: <br>' . $db->error . '<br>Query: ' . $query);
  }

  return $result;  
}