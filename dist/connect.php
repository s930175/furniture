<?php
$servername = "localhost";
$username = "root";
$password = "fn102";
$dbname = "home";
//dbname 對應資料庫名稱
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// 檢查連線
if ($conn->connect_error) {
  	die("連線失敗: " . $conn->connect_error);
}else{
    echo "資料庫連線成功";
}


?>