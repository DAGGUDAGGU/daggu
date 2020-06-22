<?php
//DB 연동
header('Content-Type: text/html; charset=utf-8');
$mysql_host = "localhost";
$mysql_user="dakku";
$mysql_passwd="OTQlqUC5MF4lk2kl";
$mysql_db="dakku";

$conn = mysqli_connect($mysql_host, $mysql_user,$mysql_passwd,$mysql_db);

if(!$conn){//DB 연동 안될 때
   die("연결 실패 : ".mysqli_connect_error());
}

//session받기 -> 로그인 한 값가져오기
session_start();
$myId = $_SESSION['user_id'];

//php부분
$sql = "SELECT id,image FROM image WHERE truefalse=1";
$result = mysqli_query($conn,$sql);
//echo "$sql : ".$sql;


mysqli_close($conn);//데이터베이스 전송 종료하는 것이에용~
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
            integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
            crossorigin="anonymous">
        <link rel="stylesheet" href="css/forum.css">
        <title>Main</title>
    </head>
    <body>
        <header>
            <!--내비바를 사용한 타이틀 부분-->
            <nav class="nav navbar-light justify-content-center">
            <div id="title" class="textDragDisable">
                <a href="index.php">
                    <img src="img/Moon2.png" 
                    class="d-inline-block align-top img-fluid" 
                    id="titleImage"
                    alt="타이틀 이미지">
                    다꾸다꾸다꾸
                </a>
            </div>
            </nav>
            <div class="d-flex justify-content-center textDragDisable">
                <div class="row flex-column flex-md-row font" id="sub">
                    <div class="pr-5 pl-5">다꾸다꾸다꾸</div>
                    <div class="pr-5 pl-5">게시판</div>
                    <div class="pr-5 pl-5">마이페이지</div>
                    <div class="pr-5 pl-5">로그아웃</div>
                </div>
            </div>
        </header>
        <hr class="line">

        <!--body부분-->

        <?php
//echo "sql : ".$sql;
if(mysqli_num_rows($result)>0){//내가 가지고있는 데이터베이스 테이블에 있는 튜플이 있는 경우
    while($row=mysqli_fetch_array($result)){
?>

        <div class="col-lg-offset-1 col-lg-5 card" style="z-index:1;">
            <div class="pr-5 pl-5 text" id="text" style="padding:0;"><?=$row['id']?>님</div>
            <img
                src=<?= '"data:image/jpeg;base64,'.base64_encode($row['image']).'"';?>
                class="img-fluid imageFluid" >
        </div>
    <?php  
}//if문
     }
else{
    echo "저장되있는 이미지가 없습니다.";
}//else 문 끝
?>

        <!--bottom-->
        <div>
            <div class="fixed-bottom" >
                <img src="img/구름2.png" class="img-fluid" id="cloud2"  alt="구름 2 이미지">
            </div>
            <div class="fixed-bottom" >
                <img src="img/구름1.png" id="cloud1" class="img-fluid float-right" alt="구름 1 이미지">
            </div>
        </div>

        <script
            src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
        <script
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
            crossorigin="anonymous"></script>
        <script src="js/forum.js"></script>
    </body>
</html>