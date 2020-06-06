<?php //DB 연동
//session받기 -> 로그인 한 값가져오기
session_start();
$myId = $_SESSION['user_id'];
$myName = $_SESSION['user_name'];


?>
<!DOCTYPE html>
<html lang="ko" class="no-js">

<head>
    <style>

    </style>

    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/newMainsiu.css"><!--전체적인 css-->
    <link rel="stylesheet" href="css/mainsignin.css"><!--위에 테이블 로그인-->
    <link rel="stylesheet" href="css/maintotal.css"><!--회원가입 css-->
</head>

<body>
<img src="img/mainbg2.jpg" id="background">

<img src="img/별똥별아이콘.png" id="star" class="slide-out-bl">

<img src="img/구름1.png" id="cloud1" class="fade-in-right">
<img src="img/구름2.png" id="cloud2" class="fade-in-left">
<img src="img/구름3.png" id="cloud3" class="fade-in-left">
<img src="img/별똥별아이콘.png" id="star2" class="slide-out-bl2">
<img src="img/별똥별아이콘.png" id="star3" class="slide-out-bl2">
<img src="img/Moon2.png" id="moon" class="wobble-hor-top">

<div class="right bounce-in-right">
    <img src="img/backgroundWhiteContain.png" id="whiteBg">
    <div class="nav">
        <form name="signinfrm" method="get" action="signin.php"style="
    margin-bottom: 5px;
">
            <table>
                <tr >
                    <td>아이디</td>
                    <td>비밀번호</td>
                    <td></td>
                </tr>
                <tr>
                    <td class = "frm1"><input type="text" class="login" placeholder="아이디" name="id" required autocomplete="off"></td>
                    <td class = "frm1"><input type="password" class="login login1" placeholder="비밀번호" name="pw" required autocomplete="off"></td>
                    <td><button class="signin">로그인</button></td>
                </tr>
                <tr>
                    
                <td></td>
                    <div class="opt">
    
                        <td colspan = "2">
                            <ul>
                                <li><a href="findid.html">아이디 찾기</a></li>
                                <li><a href="findpw.html">비밀번호 찾기</a></li>
                            </ul>
                        </td>
                    </div>
                </tr>
            </table>
        </form>
        <div class="signup_container">
            <form name="signupfrm" method="GET" action="signup.php">

                <div class="title"><span style = "font-size : 24px;">빠르고 쉽게</span> 가입하기</div>
                <div class="suname su">이름<span id="essential"> *</span><br /><input type="text" class="signup" name="name"
                        required>
                </div>
                <div class="suid su">아이디<span id="essential"> *</span><br /><input type="text" class="signup" name="id"
                        required>
                </div>
                <div class="supw su">비밀번호<span id="essential"> *</span><br /><input type="password" class="signup"
                        id="userPw" placeholder="" name="pw" required>
                </div>
                <div class="supwre su">비밀번호 확인<span id="essential"> *</span><br /><input type="password"
                        placeholder="비밀번호 재확인 입력" class="signup signuppwre" id="userPwChk" required>
                    <font id="chkNotice" size="2"></font>
                </div>
                <div class="suemail su">이메일<br><input type="text" class="signup" name="email"></div>
                <a href="signin.html" style = "padding : 0;"><button class="signupbtn">회원가입</button></a>
            </form>
        </div>
    </div>
</div>

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


</html>