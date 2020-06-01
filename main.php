<?php //DB 연동
//session받기 -> 로그인 한 값가져오기
session_start();
$myId = $_SESSION['user_id'];
$myName = $_SESSION['user_name'];


?>
<html>

<head>
    <style>

    </style>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <img src="img/moon.png" id="moon">
    <div class="buttons">
        <!-- <a href="notice.html"><button class="forum" onclick="javascript:btn()">FORUM</button></a><br />
        <a href="mypage.html"><button class="mypage" onclick="javascript:btn()">MY PAGE</button></a><br />
        <a href="signin.html"><button class="signin" onclick="javascript:btn()">SIGN IN</button></a><br /> -->
        <button class="forum" onclick="javascript:btn()">FORUM</button></a><br />
        <button class="mypage" onclick="javascript:btn()">MY PAGE</button></a><br />
        <button class="signin"id = "sign" onclick = "signclick()"></button><br />
    </div>
    <button class="daggu" onclick="javascript:btn()">DAGGU</button></a>

    <script>
        function btn() {
            alert('로그인 후 사용가능');
        }
    </script>
<script>
        var res = document.getElementById("sign").innerHTML;
    <?php
    if($myId!=null){//내가 가지고있는 데이터베이스 테이블에 비교
    ?>
        document.getElementById("sign").innerHTML="LOG OUT";
    <?php
    }else{
    ?>
        document.getElementById("sign").innerHTML="SIGN IN";
    <?php
    }
    ?>
    function signclick(){
        console.log(document.getElementById("sign").innerHTML);
        if(res === "SIGN IN"){
            location.href = 'signin.html';
        }
        else if((document.getElementById("sign").innerHTML)==="LOG OUT"){ 
            location.href = 'logout.php';
        }
    }
</script>
</body>

</html>