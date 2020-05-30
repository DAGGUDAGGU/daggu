<?php
//DB 연동
header('Content-Type: text/html; charset=utf-8');
$mysql_host = "localhost";
$mysql_user="root";
$mysql_passwd="mirim2";
$mysql_db="dakku";

$conn = mysqli_connect($mysql_host, $mysql_user,$mysql_passwd,$mysql_db);

if(!$conn){//DB 연동 안될 때
   die("연결 실패 : ".mysqli_connect_error());
}

//session받기 -> 로그인 한 값가져오기
session_start();
$myId = $_SESSION['user_id'];
$myName = $_SESSION['user_name'];

//php 이미지 받을 list선언
$imageList = null;

//php부분
$sql = "SELECT image FROM image WHERE id = '$myId'";
$result = mysqli_query($conn,$sql);

/*
if(mysqli_num_rows($result)>0){//내가 가지고있는 데이터베이스 테이블에 있는 튜플이 있는 경우
    while($row=mysqli_fetch_array($result)){
        
        echo '
        <table>
            <tr border=1px>
        <td><img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" id="myImage"/></td>
            </tr>
        </table>';
    }
}else{
    echo "저장되있는 이미지가 없습니다.";
}
*/
mysqli_close($conn);//데이터베이스 전송 종료하는 것이에용~

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


    
    <!-- <div id="menu">
        <div id="fixmenu">
            <img src="img/circle3.svg" id="circle"><br>
            <div class="buttons">
                <img src="img/dot.svg" id="dot">
                <a href="daggu.html"><button class="bu" onMouseOver="this.style.color='#FBDA65'"
                        onMouseOut="this.style.color='#000'">DAGGU</button></a><br>
                    다꾸하는 페이지

                <img src="img/dot.svg" id="dot">
                <a href="notice.html"><button class="bu" onMouseOver="this.style.color='#FBDA65'"
                        onMouseOut="this.style.color='#000'">FORUM</button></a><br>

                <img src="img/dot.svg" id="dot">
                <a href="mypage.html"><button class="bu" style="color: #FBDA65;">MY PAGE</button></a><br>

                <img src="img/dot.svg" id="dot">
                <a href="logout.php"><button class="bu" onMouseOver="this.style.color='#FBDA65'"
                        onMouseOut="this.style.color='#000'">LOG OUT</button></a>
            </div>
        </div>
    </div> -->
    <div id="menu">
        <div id="fixmenu">
            <img src="img/circle3.svg" id="circle"><br>
            
            <div class="buttons">
                <img src="img/dot.svg" id="dot">
                <a href="daggu.html"><button class="bu" onMouseOver="this.style.color='#FBDA65'"
                        onMouseOut="this.style.color='#000'">DAGGU</button></a><br>
                <!--다꾸하는 페이지-->

                <img src="img/dot.svg" id="dot">
                <a href="notice.html"><button class="bu" onMouseOver="this.style.color='#FBDA65'"
                        onMouseOut="this.style.color='#000'">FORUM</button></a><br>

                <img src="img/dot.svg" id="dot">
                <a href="mypage.html"><button class="bu" style="color: #FBDA65;">MY PAGE</button></a><br>

                <img src="img/dot.svg" id="dot">
                <button class="bu" onMouseOver="this.style.color='#FBDA65'" onclick="logout()"
                    onMouseOut="this.style.color='#000'">LOG OUT</button>
            </div>
        </div>
    </div>



    <div class="main" id="main">
        <div id="head">
            <div id="mypage">MY PAGE</div><br>
            <!-- <div style="font-size: 5vw;">MY PAGE</div><br> -->
            <hr width=100% style="border: solid 0.1vw #8F35E9; ">
        </div>
        <div class="body">
            <div id="content">
                <div id="contentsWord">2020.05.20</div>
                <img src="img/image.png" width="90%"><br>
            </div>

            <div id="content">
                <div id="contentsWord">2020.05.20</div>
                <img src="img/image.png" width="90%"><br>
            </div>



            <div id="content">
                <div id="contentsWord">2020.05.20</div>
                <img src="img/다이어리커버1.png" width="90%"><br>
            </div>

            <div id="content">
                <div id="contentsWord">2020.05.20</div>
                <img src="img/다이어리커버1.png" width="90%"><br>
            </div>

            <div id="content">
                <div id="contentsWord">2020.05.20</div>
                <img src="img/다이어리커버1.png" width="90%"><br>
            </div>

            <div id="content">
                <div id="contentsWord">2020.05.20</div>
                <img src="img/다이어리커버1.png" width="90%"><br>
            </div>

            <div id="content">
                <div id="contentsWord">2020.05.20</div>
                <img src="img/다이어리커버1.png" width="90%"><br>
            </div>

            <div id="content">
                <div id="contentsWord">2020.05.20</div>
                <img src="img/다이어리커버1.png" width="90%"><br>
            </div>
        </div>

    </div>

    <div class="space" id="space">

            
    
        <div class = "info"style ="    display: flex;
    margin-top: 30px;" >
        <img src="img/user 3.svg"style = "margin-right:10px;">
        <?php 
            echo  $_SESSION['user_id'];
            ?>
    </div> 

    </div>
    <script>
        function logout() {
            alert("정말 로그아웃을 하시겠습니까?");
            location.href = 'logout.php';
        }
    </script>


    <table>
        <tr>
            <th>
                <?php
                    if(mysqli_num_rows($result)>0){//내가 가지고있는 데이터베이스 테이블에 있는 튜플이 있는 경우
                        while($row=mysqli_fetch_array($result)){  
                            echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/>';
                        }
                    }else{
                        echo "저장되있는 이미지가 없습니다.";
                    }
                ?>
            </th>
        </tr>
    </table>




</body>

</html>