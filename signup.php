<?php
    $mysql_host = "localhost";
    $mysql_user="root";
    $mysql_passwd="mirim2";
    $mysql_db="dakku";
    
    $conn = mysqli_connect($mysql_host, $mysql_user,$mysql_passwd,$mysql_db);
    
    if(!$conn){
        die("연결 실패 : ".mysqli_connect_error());
    }
?><script> console.log('연결성공')</script>
<!--db연결 ------------------------------------------------------------------------------------------->
<?php

    //이름과 이메일 html에서 가져오는거임
    $get_name = $_GET['name'];
    $get_id = $_GET['id'];
    $get_pw = $_GET['pw'];
    $get_email= $_GET['email'];
    //값 받기
    $query = "select * from members where id='$get_id'";
    $result = $connect->query($query);

    if(mysqli_num_rows($result)>0){//아이디 중복 확인
       ?><script> alert('아이디가 이미 있습니다'); 
            document.signupfrm.id.focus();
            </script>
            <?php
            
    }

    $sql = "insert into members (name, id, pw, email)values('$get_name', '$get_id', '$get_pw', '$get_email')";//정보 입력
    $result1 = $connect->query($query);

    //저장이 됬다면 (result = true) 가입 완료
    if($result1) {
?>      <script>
            alert('가입 되었습니다.');
            location.replace("login.html");
        </script>

<?php   }
    else{
?>              
    <script>
        
        alert("가입이 되지 않았습니다......................");
    </script>
<?php   }

    mysqli_close($connect);
?>
