<?php
    
    session_start();
    $myId = $_SESSION['user_id'];
    $data = $_POST['photo'];
    $availability =$_POST['availability'];
    
    $mysql_host = "localhost";
    $mysql_user="dakku";
    $mysql_passwd="OTQlqUC5MF4lk2kl";
    $mysql_db="dakku";

    $conn = mysqli_connect($mysql_host, $mysql_user,$mysql_passwd,$mysql_db);

    if(!$conn){
        die("연결 실패 : ".mysqli_connect_error());
    }
    echo "<script> console.log('연결성공')</script> <br>";

    $today = date("Ymd");

    $insertQuery = "insert into image (id,image,truefalse,select_date)"
        ." values ('".$myId."','$data','".$availability."','".$today."')";

    $result = mysqli_query($conn,$insertQuery);

    mysqli_close($conn);
?>