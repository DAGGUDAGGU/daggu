<?php
//박소원이 만듬
$mysql_host = "localhost";
    $mysql_user="dakku";
    $mysql_passwd="OTQlqUC5MF4lk2kl";
    $mysql_db="dakku";

$conn = mysqli_connect($mysql_host, $mysql_user,$mysql_passwd,$mysql_db);

if(!$conn){
    die("연결 실패 : ".mysqli_connect_error());
}
echo "<script> console.log('연결성공')</script> <br>";

$size = GetImageSize($image); 
$width = $size[0]; 
$height = $size[1]; 
$imageblob = addslashes(fread(fopen($image, "r"), filesize($image))); 
$filesize = filesize($image) ; 

$query=" INSERT INTO gallery VALUES ('', '$imageblob', '$title', '$width','$height', '$filesize', '$detail' )" ; 
$result = mysqli_query($conn,$query);

?>