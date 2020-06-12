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


    // echo("날짜:" . $_POST['date'] . "<br/>");


//session받기 -> 로그인 한 값가져오기
session_start();
// $myId = $_SESSION['user_id'];
$myId="성이름";


//id, select_date에 맞게 이미지 출력 부분
$sql = "SELECT image FROM image WHERE id = '$myId' AND select_date='$getDate'";
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

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
            buttonImage: 'img/mypageIcon/calenderIcon.svg',
            onSelect: function(date) {
            var ttt=$('#calender').val()
            alert(ttt);

            }
            ,beforeShow: function (input, inst) {
            var rect = input.getBoundingClientRect();
            setTimeout(function () {
            inst.dpDiv.css({ top: rect.top - 250, left: rect.left +0 });
                }, 0);
                }
                
            });
            $("img.ui-datepicker-trigger").attr("style", " margin-left:10%;  height:10%; vertical-align:middle; cursor: Pointer;");           });
    </script> 



</head>
<body>
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
        
        <img src="img/mypageIcon/sparkler.svg" width=2%>
        <p id ="title_text">
        <?php echo $myId; ?>님의 마이페이지 어쩌구 저쩌구 추카추카
        </p>
        <img src="img/mypageIcon/sparkler2.svg" width=2%>
    </div>
    

    <div id="main">
         <div class="body">
         <div id="content">
                <div id="contentsWord">2020.05.20</div>
                <img src="photos/1589917978.png" width="100%"><br>
            </div>
         <table>
                    <tr>
                        <th>
                            <?php
                    if(mysqli_num_rows($result)>0){//내가 가지고있는 데이터베이스 테이블에 있는 튜플이 있는 경우
                        while($row=mysqli_fetch_array($result)){  ?>

                            <img
                                src=<?= '"data:image/jpeg;base64,'.base64_encode($row['image']).'"';?>
                                class="callImage">

                        <?php   
                        }
                    }else{
                        echo "저장되있는 이미지가 없습니다.";
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
