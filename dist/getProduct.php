<?php
// 讓其他所有port端口也連得上
// 也可把這份檔案放入專案資料夾，在專案發起axios請求時用相對路徑直接取得
header('Access-Control-Allow-Origin: *');
$servername = "localhost";
$username = "root";
$password = "fn102";
$dbname = "home";
//dbname 對應資料庫名稱
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// if ($conn->connect_error) {
//     die("連線失敗: " . $conn->connect_error);
// }else{
//   echo "資料庫連線成功";
// }
$sql = "SELECT * FROM home";
// query提供查詢方法(輸入MYSQL語句) 再用fetch_all(MYSQLI_ASSOC)回報查詢結果
$result = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
// 只寫echo $result只會回傳"Array"，加上json_encode可以讓回傳的東西變成JSON格式
echo json_encode($result);



?>