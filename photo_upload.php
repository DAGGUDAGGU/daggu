<?php
    $data = $_POST['photo'];
    // list($type, $data) = explode(';', $data);
    // list(, $data)      = explode(',', $data);
    $data = str_replace(' ','+',$data);
    $data = base64_decode($data);

    mkdir($_SERVER['DOCUMENT_ROOT'] . "/photos");

    echo $_SERVER['DOCUMENT_ROOT'];
    
    //file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/photos/'.'test.png', $data);
    //file_put_contents('/home/dakku/www/photos/test.png', $data);
    if (!$data =file_put_contents('/home/dakku/www/test.png', $data)) {
        $error = error_get_last();
        echo "HTTP request failed. Error was: " . $error['message'];
  } else {
        echo "Everything went better than expected";
  }

    die;
?>