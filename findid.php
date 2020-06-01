<html>

<head>
    <meta charset="UTF-8">
    <style>
      
    </style>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/findid.css">
</head>

<body>
    <div class="findid_container">
        <div class="title">아이디 찾기</div>
        <form method="GET" action="findid.php">
            <input type="text" class="findid" placeholder="이름" name="name" required><br />
            <input type="text" class="findid findid1" placeholder="이메일" name="email"" required><br />
            <button class=" find">찾기</button>
        </form>
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

    //이름과 이메일 html에서 가져오는거임
    $get_name = $_GET['name'];
    $get_email= $_GET['email'];

    $sql = "SELECT id FROM members WHERE name= '$get_name' AND email='$get_email' ";

    //echo $get_name;
    //echo $get_email;
    
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){//내가 가지고있는 데이터베이스 테이블에 있는 튜플이 있는 경우
        while($row=mysqli_fetch_array($result)){
            $content = $row['id'];
            //echo "아이디 : ".$row['id']."<br>";
            echo "<script> alert('$content');  
            location.href = 'signin.html'; 
            </script>";
            
        }
    }else{
        echo "저장된 데이터가 없습니다.";
    }

    mysqli_close($conn);//데이터베이스 전송 종료하는 것이에용~~미나상~.
?>