<?php
    $mysql_host = "localhost";
    $mysql_user="root";
    $mysql_passwd="mirim2";
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
    echo $sql,"::**";
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
    }else{
?>
    <script>
        alert('아이디 또는 비밀번호가 맞지 않습니다.');
        document.signinfrm.id.focus();
    </script>
<?php
    }

    mysqli_close($conn);//데이터베이스 전송 종료
    
?>
