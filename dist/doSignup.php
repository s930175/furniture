<?php
// 讓其他所有port端口也連得上
// 也可把這份檔案放入專案資料夾，在專案發起axios請求時用相對路徑直接取得
header('Access-Control-Allow-Origin: *');
// 接收使用者POST過來的資料(對應前端append的東西，和form表單name的名字)
$usn = $_POST['userName'];
$ac = $_POST['account'];
$ps = $_POST['password'];

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
$check = "SELECT * FROM users WHERE account = '$ac'";
// 檢查資料庫有無重複帳號(查第一個結果)
$checkResult = $conn->query($check)->fetch_assoc();
if($checkResult){
    // php的array欄位對應值用=>     ps:->提供方法
    // 檢查結果為:有 則從後端回報給前端，前端再去做畫面回饋
    $response = ["status"=>0];
}else{
    $sql = "INSERT INTO users (name, account, password) VALUES ('$usn', '$ac', '$ps')";
    $conn->query($sql);
    $response = ["status"=>1];
}

echo json_encode($response);
?>
