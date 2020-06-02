<!--<html>

<head>

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/signup.css">
</head>

<body>
    <img src="img/test.png" id="leftpic">
    <img src="img/000.png" id="botpic">
    <div class="signup_container">
        <!--<form name="signupfrm" method="GET" action="signup.php">
        <form name="signupfrm" method="POST"action = "signup.php">

            <div class="title">SIGN UP</div>
            <div class="suname su">이름<span id="essential"> *</span><br /><input type="text" class="signup" name="name"
                    required>
            </div>
            <div class="suid su">아이디<span id="essential"> *</span><br /><input type="text" class="signup" name="id"
                    required>
            </div>
            <div class="supw su">비밀번호<span id="essential"> *</span><br /><input type="password" class="signup"
                    id="userPw" name="pw" required>
            </div>
            <div class="supwre su">비밀번호 확인<span id="essential"> *</span><br /><input type="password"
                    placeholder="비밀번호 재확인 입력" class="signup signuppwre" id="userPwChk" required>
                <font id="chkNotice" size="2"></font>
            </div>
            <div class="suemail su">이메일<input type="text" class="signup" name="email"></div>
            <a href="signin.php"><button class="signupbtn">회원가입</button></a>
        </form>

    </div>
    <script type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script>
        $(function () {
            $('#userPw').keyup(function () {
                $('#chkNotice').html('');
            });

            $('#userPwChk').keyup(function () {

                if ($('#userPw').val() != $('#userPwChk').val()) {
                    $('#chkNotice').html('비밀번호 일치하지 않음<br><br>');
                    $('#chkNotice').attr('color', '#f82a2aa3');
                    $('#chkNotice').css({
                        margin: "0 0 0 -160px"
                    });
                } else {
                    $('#chkNotice').html('비밀번호 일치함<br><br>');
                    $('#chkNotice').attr('color', '#199894b3');
                    $('#chkNotice').css({
                        margin: "0 0 0 -120px"
                    });
                }

            });
        });
    </script>
</body>

</html> -->

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


//<!--db연결 ------------------------------------------------------------------------------------------->

    //이름과 이메일 html에서 가져오는거임
    $get_name = $_GET['name'];
    $get_id = $_GET['id'];
    $get_pw = $_GET['pw'];
    $get_email= $_GET['email'];


    //값 받기
    $query = "select * from members where id='$get_id'";

    $result = mysqli_query($conn,$query);
    //$result = $connect->query($query);
    
    if(mysqli_num_rows($result)>0){//아이디 중복 확인
       ?><script> alert('아이디가 이미 있습니다'); 
            location.href = 'signup.php'; 
            document.signupfrm.id.focus();
            </script>
            <?php    
    }else{

        $sql = "insert into members (name, id, pw, email)values('$get_name', '$get_id', '$get_pw', '$get_email')";//정보 입력

        $result1 = mysqli_query($conn,$sql);
    }
        //저장이 됬다면 (result = true) 가입 완료
        if($result1) {
    
    
?>      
        <script> alert('회원가입이 되었습니다.');
        location.replace('signin.html');
        </script>
<?php
   }
    else{
?>              
    <script>
        alert("가입이 되지 않았습니다......................");
    </script>
<?php   }

    mysqli_close($connect);
?>
