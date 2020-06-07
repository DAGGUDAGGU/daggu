<?php
    $mysql_host = "localhost";
    $mysql_user="dakku";
    $mysql_passwd="OTQlqUC5MF4lk2kl";
    $mysql_db="dakku";
    
    $conn = mysqli_connect($mysql_host, $mysql_user,$mysql_passwd,$mysql_db);
    
    if(!$conn){
        die("연결 실패 : ".mysqli_connect_error());
    }
    echo "<script> console.log('연결성공')</script> <br>";


//session받기 -> 로그인 한 값가져오기
session_start();
$myId = $_SESSION['user_id'];


//id맞게 이미지 출력 부분
$sql = "SELECT image FROM image WHERE id = '$myId'";
$result = mysqli_query($conn,$sql);


?>

<!--html-->
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>다꾸다꾸</title>
        <link rel="stylesheet" href="css/mypage.css">

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
                        <button
                            class="bu"
                            onmouseover="this.style.color='#FBDA65'"
                            onmouseout="this.style.color='#000'">FORUM</button>
                    </a><br>

                    <img src="img/dot.svg" id="dot">
                    <a href="mypage.html">
                        <button class="bu" style="color: #FBDA65;">MY PAGE</button>
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
                <div id="mypage">MY PAGE</div><br>
                <!-- <div style="font-size: 5vw;">MY PAGE</div><br> -->
                <hr width="100%" style="border: solid 0.1vw #8F35E9; ">
            </div>
            <div class="body">

                <table>
                    <tr>
                        <th>
                            <?php
                    if(mysqli_num_rows($result)>0){//내가 가지고있는 데이터베이스 테이블에 있는 튜플이 있는 경우
                        while($row=mysqli_fetch_array($result)){  ?>

                            <img
                                src=<?= '"data:image/jpeg;base64,'.base64_encode($row['image']).'"';?>
                                class="callImage">

                        <?php   
                        }
                    }else{
                        echo "저장되있는 이미지가 없습니다.";
                        echo "<script> console.log('야 왜 안되는거야? 진짜 손가락 뿌셔뿌셔')</script> <br>";
                    }
                ?>
                        </th>
                    </tr>
                </table>
            </div>
        </div>

    </body>

</html>
<?php
mysqli_close($conn);//데이터베이스 전송 종료하는 것이에용~
?>