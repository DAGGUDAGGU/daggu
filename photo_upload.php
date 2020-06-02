<?php
    $data = $_POST['photo'];
    list($type, $data) = explode(';', $data);
    list(, $data)      = explode(',', $data);
    $data = base64_decode($data);

    mkdir($_SERVER['DOCUMENT_ROOT'] . "/photos");

    echo $_SERVER['DOCUMENT_ROOT'];
    // file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/photos/".time().'.png', $data);
    file_put_contents("https://dakku.emirim.kr/photos/".time().'.png', $data);
    echo "성공";
    die;
?>