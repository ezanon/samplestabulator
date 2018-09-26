<?php


if (isset($_POST['envio'])){
    if ($_FILES['file']['name']=='') {
        echo "<script>alert('Você deve enviar um arquivo');history.back();</script>";
        exit;
    }  
}
else {
    echo "<script>alert('Você deve enviar um arquivo');history.back();</script>";
}

$uploadDir = 'files/';
$uploadFile = $uploadDir . date('Ymd') . '-' . mt_rand(100,999) . '-' . $_FILES['file']['name'];
move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile);

require_once 'samplesFile.php';

$file = new samplesFile($uploadFile);
$file->getValues('Ox mass%', 3);
$file->putCSV();
$file->download();
$file = NULL;

unlink($uploadFile);
