<?php
header('Access-Control-Allow-Origin: *');
// 接收使用者POST過來的資料(對應前端append的東西)
$ac = $_POST['account'];
$ps = $_POST['password'];

$servername = "localhost";
$username = "root";
$password = "fn102";
$dbname = "home";
//dbname 對應資料庫名稱
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT * FROM `users` WHERE `account` = '$ac' AND `password` = '$ps';";
$result = $conn->query($sql)->fetch_assoc();
if($result){
    // echo json_encode($result);
    $userInfo = [
        "account"=>$result['account'],
        "userName"=>$result['name']
    ];
    echo json_encode($userInfo);
}
?>