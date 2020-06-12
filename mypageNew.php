<?php
    $mysql_host = "localhost";
    $mysql_user="root";
    $mysql_passwd="mirim2";
    $mysql_db="dakku";
    
    $getDate=$_POST['date'];
    // echo  "날짜 "+$getDate;
    $conn = mysqli_connect($mysql_host, $mysql_user,$mysql_passwd,$mysql_db);
    
    if(!$conn){
        die("연결 실패 : ".mysqli_connect_error());
    }
    echo "<script> console.log('연결성공')</script> <br>";
    $myId="dgh09053";


    if($getDate==null){
        $sql = "SELECT * FROM image";
    }else{
        $sql = "SELECT * FROM image WHERE id = '$myId' AND select_date='$getDate'";

    }
    // else{
    //     $sql = "SELECT image FROM image WHERE id = '$myId'";
    // }

    //  echo("날짜:" . $_POST['date'] . "<br/>");
    //  echo $sql;

//session받기 -> 로그인 한 값가져오기
session_start();
// $myId = $_SESSION['user_id'];


//id, select_date에 맞게 이미지 출력 부분
$result = mysqli_query($conn,$sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" type="text/css" />  
    <link rel="stylesheet" href="css/mypageNew.css">
    <link rel="stylesheet" href="css/forum.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>  
    <script src="http://code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>  
    
    <script>
        
        $(function() {
            $( "#calender" ).datepicker({
            showAnim: "slide",
            dateFormat: 'yymmdd',
            showOn: 'button',
            changeMonth:'true',
            buttonImageOnly: true,
            buttonImage: 'img/mypageIcon/calenderIcon.png',
            onSelect: function(date) {
            var ttt=$('#calender').val()
            }
            // ,beforeShow: function (input, inst) {
            // var rect = input.getBoundingClientRect();
            // setTimeout(function () {
            // inst.dpDiv.css({ top: rect.top - 250, left: rect.left +0 });
            //     }, 0);
            //     }
            });
            $("img.ui-datepicker-trigger").attr("style","padding-left:20%;  height:10%; vertical-align:middle; cursor: Pointer; ");           
            });
    </script> 



</head>
<body>
<div>
        <div class="fixed-bottom" style="z-index:0;">
            <img class="img-fluid" id="cloud2" src="img/구름2.png" alt="구름 2 이미지">
        </div>
        <div class="fixed-bottom" style="z-index:0;">
            <img src="img/구름1_1.png" id="cloud1" class="img-fluid float-right" alt="구름 1 이미지">
        </div>
    </div>

<header>
        <!--내비바를 사용한 타이틀 부분-->
        <nav class="nav navbar-light justify-content-center">
            <div id="title" class="textDragDisable">
                <img src="img/Moon2.png" class="d-inline-block align-top img-fluid" id="titleImage" alt="타이틀 이미지">
                다꾸다꾸다꾸
            </div>
        </nav>
        <div class="d-flex justify-content-center textDragDisable">
            <div class="row flex-column flex-md-row font" id="sub">
                <div class="pr-5 pl-5">다꾸다꾸다꾸</div>
                <div class="pr-5 pl-5">게시판</div>
                <div class="pr-5 pl-5">마이페이지</div>
                <div class="pr-5 pl-5">로그아웃</div>
            </div>
        </div>
    </header>
    <hr class="line">

   
<div id="left">
    <form action="mypageNew.php" method="post" id="dateFrm">
    <input type="text"  id="calender" name="date" style="display:none;">
      <!-- <input type="text" src="img/mypageIcon/calenderIcon.svg" id="calender" name="date" onclick='return false;'> -->
    <input type="submit" value="검색" id="go" class="btn btn-primary">
    <!-- <input type="hidden" name="date2" > -->
    </form>
</div>

<div id="center">

    <div id="title">
    <p id ="title_text">
        <img src="img/mypageIcon/sparkler.svg" width=2%>
        <?php echo $myId; ?>님의 마이페이지 어쩌구 저쩌구 추카추카
        <img src="img/mypageIcon/sparkler2.svg" width=2%>
    </p>
    </div>
    

    <div id="main">
         <div class="body">
         <table>
                    <tr>
                        <th>
                            <?php
                    if(mysqli_num_rows($result)>0){//내가 가지고있는 데이터베이스 테이블에 있는 튜플이 있는 경우
                        while($row=mysqli_fetch_array($result)){  ?>
                            <div id="contentsWord"><?=$row['select_date'] ?></div>
                            <img
                                src=<?= '"data:image/jpeg;base64,'.base64_encode($row['image']).'"';?>
                                class="callImage" width="100%">

                        <?php   
                        }
                    }else{
                        ?>
                        <div id="contentsWord">저장되어 있는 이미지가 없습니다.</div>
                        <?php 
                        echo "<script> console.log('안됨')</script> <br>";
                    }
                ?>
                        </th>
                    </tr>
                </table>
            </div>
        </div> 

</div>

<div id="right"></div>
               
</div>

    
    
    

</body>
</html>
