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

    //이름과 이메일 html에서 가져오는거임
    $get_name = $_GET['name'];
    $get_id = $_GET['id'];
    $get_pw = $_GET['pw'];
    $get_email= $_GET['email'];
    $query = "select * from member where id='$get_id'";
    $result = $connect->query($query);

    if(mysqli_num_rows($result)>0){//아이디 중복 확인
       ?><script> alert('아이디가 이미 있습니다'); 
            document.signupfrm.id.focus();
            </script>
            <?php
            
    }

    $sql = "insert into members (name, id, pw, email)values('$get_name', '$get_id', '$get_pw', '$get_email')";//정보 입력
    // $sql = "SELECT id FROM members WHERE name= '$get_name' AND email='$get_email' ";
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
        
        alert("fail");
    </script>
<?php   }

    mysqli_close($connect);
?>
