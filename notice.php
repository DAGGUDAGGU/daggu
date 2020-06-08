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
        <title>다꾸다꾸</title>
        <link rel="stylesheet" href="css/forum.css">
    </head>

    <body>

        <div id="menu">
            <div id="fixmenu">
                <img src="img/circle3.svg" id="circle"><br>
                <div class="buttons">
                    <img src="img/dot.svg" id="dot">
                    <a href="daggu.html">
                        <button
                            class="bu"
                            onmouseover="this.style.color='#FBDA65'"
                            onmouseout="this.style.color='#000'">DAGGU</button>
                    </a><br>
                    <!--다꾸하는 페이지-->

                    <img src="img/dot.svg" id="dot">
                    <a href="notice.html">
                        <button class="bu" style="color: #FBDA65;">FORUM</button>
                    </a><br>

                    <img src="img/dot.svg" id="dot">
                    <a href="mypage.html">
                        <button
                            class="bu"
                            onmouseover="this.style.color='#FBDA65'"
                            onmouseout="this.style.color='#000'">MY PAGE</button>
                    </a><br>

                    <img src="img/dot.svg" id="dot">
                    <a href="main.html">
                        <button
                            class="bu"
                            onmouseover="this.style.color='#FBDA65'"
                            onmouseout="this.style.color='#000'">MAIN</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="main" id="main">
            <div id="head">
                <div id="mypage">FORUM</div><br>
                <!-- <div style="font-size: 5vw;">MY PAGE</div><br> -->
                <hr width="100%" style="border: solid 0.1vw #8F35E9; ">
            </div>
            <div class="body">
                <table>
                    <tr>
                        <th>
                            <?php
                    //echo "sql : ".$sql;
                    if(mysqli_num_rows($result)>0){//내가 가지고있는 데이터베이스 테이블에 있는 튜플이 있는 경우
                        while($row=mysqli_fetch_array($result)){
                    ?>
                            <img
                                src=<?= '"data:image/jpeg;base64,'.base64_encode($row['image']).'" id="callImage"';?>
                                class="callImage">
                        <?php
                        }//if문 끝
                    }else{
                        echo "저장되있는 이미지가 없습니다.";
                    }//else 문 끝
                    ?>
                        </th>
                    </tr>
                </table>
            </div>
        </div>
        <div class="space" id="space">
            <!-- <div> <img src="img/user 3.svg" style="margin: 5%;">사용자이름 </div> -->

        </div>

    </body>

</html>