<html>

<head>
<meta charset="utf-8">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/signin.css">
</head>

<body>
    <img src="img/signinbgpic.png" id="up">
    <img src="img/signinbgpic.png" id="down">
    <div class="login_container">
        <div class="title">다꾸다꾸다꾸</div>
        <form name="signinfrm" method="POST">
            <input type="text" class="login" placeholder="아이디" name="id" required><br />
            <input type="password" class="login login1" placeholder="비밀번호" name="pw" required><br />
            <button class="signin">로그인</button>
        </form>
        <hr>

        <div class="opt">
            <ul>
                <li><a href="findid.php">아이디 찾기</a></li>
                <li><a href="findpw.php">비밀번호 찾기</a></li>
                <li><a href="signup.php">회원가입</a></li>
            </ul>
        </div>
        
    </div>
</body>

</html>

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
    
    //아이디와 패스워드 가져오기
    $get_id = $_GET['id'];
    $get_pw= $_GET['pw'];
    
    $sql = "SELECT * FROM members WHERE id= '$get_id' AND pw='$get_pw' ";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){//내가 가지고있는 데이터베이스 테이블에 비교
        $get_name = "SELECT name FROM members WHERE id= '$get_id' AND pw='$get_pw' ";
        session_start();
        $_SESSION['user_id'] = $get_id;
        $_SESSION['user_name'] = $get_name;
        echo"{$_SESSION['user_id']} <- 아이디";
?>
<!-- <meta http-equiv="refresh" content="0;url=notice.html"/> -->
    <script>
        alert('로그인 성공 ');
        
        location.replace("notice.html");
    </script>

<?php 
    }else if(!($get_id==null ||$get_name=null)){
?>
    <script>
        alert('아이디 또는 비밀번호가 맞지 않습니다.');
        document.signinfrm.id.focus();
    </script>
    
<?php
    }

    mysqli_close($conn);//데이터베이스 전송 종료
    
?>
