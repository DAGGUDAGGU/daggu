<?php
    $mysql_host = "localhost";
    $mysql_user="dakku";
    $mysql_passwd="OTQlqUC5MF4lk2kl";
    $mysql_db="dakku";
    
    $getDate=$_POST['date'];
    $conn = mysqli_connect($mysql_host, $mysql_user,$mysql_passwd,$mysql_db);
    
    if(!$conn){
        die("연결 실패 : ".mysqli_connect_error());
    }
    echo "<script> console.log('연결성공')</script> <br>";
    session_start();
    $myId = $_SESSION['user_id'];

    if($getDate==null){
        $sql = "SELECT * FROM image WHERE id = '$myId' order by num";
    }else{
        $sql = "SELECT * FROM image WHERE id = '$myId' AND select_date='$getDate' order by num";

    }
    
session_start();


$result = mysqli_query($conn,$sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.9.0.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-1.2.1.js"></script>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" type="text/css" />  
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mypageNew.css">
    <link rel="stylesheet" href="css/forum.css">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>
    
    <script>
        jQuery.browser = {}; (function () { jQuery.browser.msie = false; jQuery.browser.version = 0; if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) { jQuery.browser.msie = true; jQuery.browser.version = RegExp.$1; } })();
        $(function() {
            $( "#calender" ).datepicker({
            closeText : '닫기',        
            prevText : '이전달',        
            nextText : '다음달',        
            currentText : '오늘',        
            monthNames : ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],        
            monthNamesShort : ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],        
            dayNames : ['일', '월', '화', '수', '목', '금', '토'],        
            dayNamesShort : ['일', '월', '화', '수', '목', '금', '토'],        
            dayNamesMin : ['일', '월', '화', '수', '목', '금', '토'], 
            showAnim: 'slide',
            dateFormat: 'yymmdd',
            showOn: 'button',
            changeMonth:'true',
            buttonImageOnly: true,
            showButtonPanel: true,
            buttonImage: 'img/mypageIcon/calenderIcon.svg',
            onSelect: function(date) {
            var ttt=$('#calender').val()
            document.getElementById('dateFrm').submit();
            },
            beforeShow: function (input, inst) {
            var rect = input.getBoundingClientRect();
            setTimeout(function () {
                inst.dpDiv.css({ top: rect.top-100, left: rect.left + 0 });
        }, 0);
    }
            
            }); 
            $('.ui-datepicker ').css({ "margin-left" : "-10%", "margin-top": "5%"});  //달력(calendar) 위치
            $('.jquery-datepicker__panel').css({ "background-color": "#fff"}); 
            $('img.ui-datepicker-trigger').css({'cursor':'pointer','margin-top':'-9.6%','right':'-12%','height':'5%'});  //아이콘(icon) 위치
            // $("img.ui-datepicker-trigger").attr("style"," height:15%; vertical-align:middle; cursor: Pointer; ");      
                 
            });
    </script> 





</head>
<body>
<div>
        <div class="fixed-bottom" style="z-index:-2;">
            <img class="img-fluid" id="cloud2" src="img/구름2.png" alt="구름 2 이미지">
        </div>
        <div class="fixed-bottom" style="z-index:-2;">
            <img src="img/구름1_1.png" id="cloud1" class="img-fluid float-right" alt="구름 1 이미지">
        </div>
    </div>

<header>
        <!--내비바를 사용한 타이틀 부분-->
        <nav class="nav navbar-light justify-content-center">
            <div id="title" class="textDragDisable">
                <img src="img/Moon2.png" class="d-inline-block align-top img-fluid" id="titleImage" alt="타이틀 이미지">
                <a href="https://dakku.emirim.kr/index.php" style="text-decoration:none;line-height: 2;font-size: 4vw;">
                다꾸다꾸다꾸
                </a>
            </div>
        </nav>
        <div class="d-flex justify-content-center textDragDisable">
            <div class="row flex-column flex-md-row font" id="sub">
                <div class="pr-5 pl-5"><a href="https://dakku.emirim.kr/daggu.html" style="text-decoration:none; " >다이어리 꾸미기</a></div>
                <div class="pr-5 pl-5"><a href="https://dakku.emirim.kr/forum.php" style="text-decoration:none;">게시판</a></div>
                <div class="pr-5 pl-5"><a href="https://dakku.emirim.kr/mypageNew.php"style="text-decoration:none; "><strong>내 다이어리</strong></a></div>
                <!-- <div class="pr-5 pl-5"><a href="https://dakku.emirim.kr/logout.php"style="text-decoration:none;">로그아웃</a></div> -->
            </div>
        </div>
    </header>
    <hr class="line">

   
<div id="left">
<!-- <img src="img/upBtn.png" alt="My Image"> -->
</div>

<div id="center">

    <div id="title">
    
    <p id ="title_text">
        <img src="img/mypageIcon/sparkler.svg" width=2%>
        <?php echo $myId?>님의 다이어리
        <img src="img/mypageIcon/sparkler2.svg" width=2%>
        <br><br>
        <input type="image" name="button" src="img/LYarrow.svg" width=3% onclick="button2_click();" style="margin-right:13%;">

        <script>
        function button2_click() {
            var a = new Date(
                <?php echo substr($getDate, 0, 4) ?>,
                <?php echo substr($getDate, 4, 2) ?>-1,
                <?php echo substr($getDate, 6, 2) ?>
                  );

            a.setDate(a.getDate() - 1);
            var year = a.getFullYear();              
            var month = (1 + a.getMonth()); 
            month = month >= 10 ? month : '0' + month; 
            var day = a.getDate(); 
            day = day >= 10 ? day : '0' + day;       
            var date=  year + '' + month + '' + day;

            console.log(date);
            document.getElementById('calender').value=date;
            document.getElementById('dateFrm').submit();
        }
        </script>

        <?php
         if($getDate!=null){
            echo substr($getDate, 0, 4),"년 ",substr($getDate, 4, 2),"월 ",substr($getDate, 6, 2),"일";
            // echo $myId,"님의 모든 다이어리입니다"; 
        }else{
            echo "전체"; 
            ?>
            <script>
                document.getElementById("showAll").style.display = "none";
            </script>
            <?php
        }
         
         ?>
         
         <input type="image" name="button" src="img/RYarrow.svg" width=3% onclick="button1_click();"  style="margin-left:14%;">

         <script>
        function button1_click() {
            var a = new Date(
                <?php echo substr($getDate, 0, 4) ?>,
                <?php echo substr($getDate, 4, 2) ?>-1,
                <?php echo substr($getDate, 6, 2) ?>
                  );

            a.setDate(a.getDate() + 1);
            var year = a.getFullYear();              
            var month = (1 + a.getMonth()); 
            month = month >= 10 ? month : '0' + month; 
            var day = a.getDate(); 
            day = day >= 10 ? day : '0' + day;       
            var date=  year + '' + month + '' + day;

            console.log(date);
            document.getElementById('calender').value=date;
            document.getElementById('dateFrm').submit();
        }
        </script>

         <form action="mypageNew.php" method="post" id="dateFrm">
        <input type="text"  id="calender" name="date" style="display:none">
        </form> 
        
        <a href="mypageNew.php" style="text-align: right;font-size: 1vw;"><div id="showAll">전체보기</div></a>
        
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
                            <div id="contentsWord">
                            <?php 
                             $date_all = $row['select_date'];
                             $dateVal_year = substr($date_all, 0, 3); 
                             echo substr($date_all, 0, 4),"년",substr($date_all, 4, 2),"월",substr($date_all, 6, 2),"일"; 
                            ?>
                            </div>
                            <img
                                src=<?= '"'.$row['image'].'"';?>'
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

<div id="right">

</div>
          

</div>

    
    
    

</body>
</html>
