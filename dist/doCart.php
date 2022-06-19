<?php
header('Access-Control-Allow-Origin: *');
// 接收使用者POST過來的資料(對應前端append的東西)
$cp = $_POST['chooseproduct'];
$cp2 = $_POST['chooseproduct2'];
$cu = $_POST['cartUser'];
$am = $_POST['amount'];

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
$sql = "INSERT INTO carts (user_name, product_count, product_name,amount) VALUES ('$cu', '$cp','$cp2', '$am')";
$result = $conn->query($sql);
    echo json_encode($result);

?>