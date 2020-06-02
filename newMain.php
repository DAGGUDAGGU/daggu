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

<img src="img/별똥별아이콘.png" id="star" class="slide-out-bl">

<img src="img/구름1.png" id="cloud1" class="fade-in-right">
<img src="img/구름2.png" id="cloud2" class="fade-in-left">
<img src="img/구름3.png" id="cloud3" class="fade-in-left">
<img src="img/별똥별아이콘.png" id="star2" class="slide-out-bl2">
<img src="img/별똥별아이콘.png" id="star3" class="slide-out-bl2">
<img src="img/Moon2.png" id="moon" class="wobble-hor-top">

<div class="right bounce-in-right">
    <img src="img/backgroundWhite.png" id="whiteBg">
    <img src="img/backgroundLine.png" id="lineBg">
    <div class="nav">
        <a href="#"onclick="btn1()">게시판</a>
        <a href="#"onclick="btn()">마이페이지</a>
        <a href="signin.html"id = "sign"onclick="signclick()">로그인</a> 
        </div>
        <p>나만의 다이어리를 만드세요<br>다꾸다꾸다꾸</p>
        <a href="#" class="dakkuBtn"onclick="btn2()">다이어리 꾸미기</a>
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
            if((document.getElementById("sign").innerHTML) === "로그인"){
                document.getElementById( "sign" ).setAttribute( 'href', 'signin.html' );
            }
            else if((document.getElementById("sign").innerHTML)==="로그아웃"){ 
                document.getElementById( "sign" ).setAttribute( 'href', 'logout.php' );
            }
        }
        function btn(){
            if((document.getElementById("sign").innerHTML) === "로그인"){
                
                alert('로그인 후 사용가능');
            }else if((document.getElementById("sign").innerHTML) === "로그아웃"){
                
                location.href="mypage.html";
            }
        }
        function btn1(){
            if((document.getElementById("sign").innerHTML) === "로그인"){
                
                alert('로그인 후 사용가능');
            }else if((document.getElementById("sign").innerHTML) === "로그아웃"){
                
                location.href="notice.html";
            }
        }
        function btn2(){
            if((document.getElementById("sign").innerHTML) === "로그인"){
                
                alert('로그인 후 사용가능');
            }else if((document.getElementById("sign").innerHTML) === "로그아웃"){
                
                location.href="daggu.html";
            }
        }
    </script>

</body>


</html>