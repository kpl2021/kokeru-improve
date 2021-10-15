<?php 

require_once 'config/db_connect.php';

function getLaporanRooms() {
  global $db;

  $nData = 30;
  $nDataPerPage = 9;
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