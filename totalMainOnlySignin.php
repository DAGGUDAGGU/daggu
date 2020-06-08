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
    <link rel="stylesheet" href="css/newMainsi.css">
    <link rel="stylesheet" href="css/mainonlysignin.css">
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
    <img src="img/backgroundWhiteContain.png" id="whiteBg">
    <div class="nav">
        <div class="login_container">
            <div class="title">다꾸다꾸다꾸</div>
            <form name="signinfrm" method="get" action="signin.php">
                <input type="text" class="login" placeholder="아이디" name="id" required autocomplete="off"><br />
                <input type="password" class="login login1" placeholder="비밀번호" name="pw" required autocomplete="off"><br />
                <button class="signin">로그인</button>
            </form>
            <hr>
            <div class="opt">
                <ul>
                    <li><a href="findid.html">아이디 찾기</a></li>
                    <li><a href="findpw.html">비밀번호 찾기</a></li>
                    <li><a href="signup.html">회원가입</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
</script>

</body>


</html>