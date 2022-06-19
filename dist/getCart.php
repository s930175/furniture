<?php
header('Access-Control-Allow-Origin: *');
// 接收使用者POST過來的資料(對應前端append的東西)
$cu = $_POST['cartUsers'];

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
// $sql = "SELECT `product_name`,`product_count`,`amount` FROM carts WHERE `user_name` = '$cu'";
$sql = "SELECT * FROM `carts` WHERE `user_name` = '$cu'";
$result = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
    echo json_encode($result);

?>