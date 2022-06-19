<?php
header('Access-Control-Allow-Origin: *');
//googleReacptcha會自動產生token 在點擊時 POST 到後端
$reacptchaToken = $_POST['reacptchaToken'];

function recaptchaCheck($reacptchaToken)
{
    //沒有token
    if (!$reacptchaToken) {
        echo json_encode(["status" => 0, "msg" => "機器人驗證-未驗證"]);
        // return false;
    }
    //本機和google伺服器的連線密鑰
    $secret_key = '6LcJVX0gAAAAABApsEDQe79lZRLaNQyHenenKNba';
    //將我們的需求丟到伺服器
    $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $reacptchaToken);
    //迴傳值是JSON json_encode是將迴傳轉換成array或是object的樣式，不是 json format的樣式。
    $response_data = json_decode($response, true);
    //內部的data success是true
    if ($response_data['success'] == true) {
        $checkTokenSuccess = $response_data['success'];
        echo json_encode(['status' => $checkTokenSuccess]);
    } else {
        echo json_encode(['status' => 0, "msg" => "機器人!發現機器人!"]);
    }
}
recaptchaCheck($reacptchaToken);
