<?php //DB 연동
//session받기 -> 로그인 한 값가져오기
session_start();
$myId = $_SESSION['user_id'];
$myName = $_SESSION['user_name'];


?>
<!DOCTYPE html>
<html lang="ko" class="no-js">

<head>
    <style>

    </style>

    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/newMain.css">
</head>

<body>
    <img src="img/mainbg2.jpg" id="background">

    <img src="img/별똥별아이콘.png" id="star" class="slide-in-blurred-tr slide-out-bl">
    <img src="img/구름1.png" id="cloud1" class="fade-in-right">
    <img src="img/구름2.png" id="cloud2" class="fade-in-left">
    <img src="img/구름3.png" id="cloud3" class="fade-in-left">

    <img src="img/Moon2.png" id="moon" class="wobble-hor-top">

    <div class="right bounce-in-right">
        <img src="img/backgroundWhite.png" id="whiteBg">
        <img src="img/backgroundLine.png" id="lineBg">
        <div class="nav">
            <a href="notice.html">게시판</a>
            <a href="mypage.html">마이페이지</a>
            <a href="signin.html"id = "sign">로그인</a>
        </div>
        <p>나만의 다이어리를 만드세요<br>다꾸다꾸다꾸</p>
        <a href="daggu.html" class="dakkuBtn">다이어리 꾸미기</a>
    </div>

    <script>
        var res = document.getElementById("sign").innerHTML;
        <?php
        if($myId!=null){//내가 가지고있는 데이터베이스 테이블에 비교
        ?>
            document.getElementById("sign").innerHTML="로그아웃";
        <?php
        }else{
        ?>
            document.getElementById("sign").innerHTML="로그인";
        <?php
        }
        ?>
        function signclick(){
            console.log(document.getElementById("sign").innerHTML);
            if((document.getElementById("sign").innerHTML) === "SIGN IN"){
                location.href = 'signin.php';
            }
            else if((document.getElementById("sign").innerHTML)==="LOG OUT"){ 
                location.href = 'logout.php';
            }
        }
        function btn(){
            if(document.getElementById("Button").disabled == "true"){
                
                alert('로그인 후 사용가능');
            }
        }
    </script>

</body>


</html>