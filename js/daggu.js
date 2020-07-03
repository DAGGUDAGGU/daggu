//사용자의 이미지 삽입
var fileSrc = new Array(); //삭제되지 않은 이미지들의 주소
window.addEventListener('load', function () {
    document.querySelector('input[type="file"]').addEventListener('change', function () {
        if (this.files && this.files[0]) {
            var src = URL.createObjectURL(this.files[0]);
            $('.file-upload').val(""); //같은 파일 업로드 or 삭제 될 수 있도록
            fileSrc.push(src);
            $('.showImg').append('<div class="userImg"><img src=' + src +
                ' height="70%"></div>');

            if ($('#deleteUploadImg').hasClass('deleteOn')) { //삭제 off
                $('.userImg').append('<img src="img/criss-cross.png" class="deleteIcon">');
                $('.deleteIcon').click(function () {
                    $(this).parent().remove();
                    fileSrc.splice(fileSrc.indexOf($(this).parent().src), 1);
                    if (!$('.userImg').length) {
                        $('#deleteUploadImg').removeClass('deleteOn');
                    }
                });
            }
        }
    });
});
//사진 삽입 btn click event
$('#inputImg').click(function () {
    alert(document.querySelector('input[type="file"]').files.length);
    for (var i = 0; i < fileSrc.length; i++) {
        $('.diary_content').append('<div class="daggu_ele"><img src=' +
            fileSrc[i] +
            ' width="100%"></div>');
        addEventToEle();
    }
});
//사진 삭제 btn click event
$('#deleteUploadImg').click(function () {
    if ($('.userImg').length) {
        if ($('#deleteUploadImg').hasClass('deleteOn')) { //삭제 off
            $('#deleteUploadImg').removeClass('deleteOn');
            $('.deleteIcon').remove();
        } else { //삭제 on
            $('#deleteUploadImg').addClass('deleteOn');
            $('.userImg').append('<img src="img/criss-cross.png" class="deleteIcon">');
            $('.deleteIcon').click(function () {
                $(this).parent().remove();
                fileSrc.splice(fileSrc.indexOf($(this).parent().src), 1);
                if (!$('.userImg').length) {
                    $('#deleteUploadImg').removeClass('deleteOn');
                }
            });

        }
    }

});

//슬라이드 탭메뉴 바꿨을 때 이미지 안 뜨는 거 해결
$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    $('.slick-slider').slick('setPosition'); // 슬릭 위치 재배치
});

// 메뉴 클릭해서 탭메뉴 선택
$('.menu li').click(function () {
    var idx = $(this).index() + 1;

    if (idx == 7) {
        var src = ($('#trashIcon').attr('src') == 'img/쓰레기통수정.png') ? 'img/쓰레기통 열린 아이콘.png' :
            'img/쓰레기통수정.png';
        $('#trashIcon').toggleClass('trashOn');
        $('#trashIcon').attr('src', src);

        if ($('#trashIcon').hasClass('trashOn')) {
            $('.daggu_ele').addClass('trash');
            $('.daggu_ele').addClass('vibrate-1');

            $('.daggu_ele_text').addClass('trash');
            $('.daggu_ele_text').addClass('vibrate-1');

            // $('.eleGroup').append('<img src="img/criss-cross.png" class="deleteIcon">');

            $('.daggu_ele').click(function () {
                if ($('.daggu_ele').hasClass('trash')) {
                    $(this).remove();
                }
            });

            $('.daggu_ele_text').click(function () {
                if ($('.daggu_ele_text').hasClass('trash')) {
                    $(this).remove();
                }
            });

        } else {
            // $('.deleteIcon').remove();
            $('.daggu_ele').removeClass('trash');
            $('.daggu_ele').removeClass('vibrate-1');
            $('.daggu_ele_text').removeClass('trash');
            $('.daggu_ele_text').removeClass('vibrate-1');
        }
        return false;
    }

    $('.tab-content div').removeClass('active');
    $('.tab-content div:nth-child(' + idx + ')').addClass('active');
    //$('.slick-slider').slick('refresh');

    $('.slick-slider').slick('setPosition');
    $('.nav li:nth-child(' + idx + ')').tab('show');

    $("input:checkbox[id='slideIcon']").prop("checked", true);

    if ($('.tab_wrap').hasClass('down')) {
        $('.tab_wrap').removeClass('down');
        $('.tab_wrap').css('top', '50%');
    }
});

$("#switchBox").click(function () {
    $(".showSwitch").toggle();
});

$(".complete_btn").on("click", function () {
    html2canvas(document.querySelector("body"), {
        allowTaint: true
    }).then(canvas => {
        saveAs(canvas.toDataURL('image/png'), "capture-test.png");
        var photo = canvas.toDataURL("image/png");
        //음 뭔가 photo를 폴더에 저장하지 말고 바로 db에 넣을 수 있을 것 같기도 하고...

        $.ajax({
            method: 'POST',
            url: 'photo_upload.php',
            data: {
                photo: photo
            }
        });
    });


});

function saveAs(uri, filename) {
    // 캡쳐된 파일을 이미지 파일로 내보낸다.
    var link = document.createElement('a');
    if (typeof link.download === 'string') {
        link.href = uri;
        link.download = filename;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    } else {
        window.open(uri);
    }
}


var css_test_idx = 1;
//이미지 클릭 시 다이어리 부분에 추가, 
$('img[src^="img/maskingTape/"],img[src^="img/stiker/"], img[src^="img/notePad/"]').click(function () {
    var src = $(event.target).attr("src");
    $('.diary_content').append('<div class="daggu_ele"><img src=' + src +
        ' width="100%"></div></div>');

    addEventToEle();
    if ($('#trashIcon').hasClass('trashOn')) {
        $('.daggu_ele').addClass('trash');
        $('.daggu_ele').addClass('vibrate-1');
        $('.daggu_ele').click(function () {
            if ($('.daggu_ele').hasClass('trash')) {
                $(this).remove();
            }
        });
    }

});

function addEventToEle() {
    //드래그 가능하게, 이미지 위에 커서 올라갔을 때 커서 변경, 클릭했을때 맨앞으로 오게
    $('.daggu_ele')
        .draggable({
            containment: ".diary_content"
        })
        .css('cursor', 'move')
        .css('z-index', css_test_idx)
        .resizable({
            //비율 유지
            aspectRatio: true,
            //마우스 hover 아닐때 핸들러 숨기기
            autoHide: true,
        })
        .mousedown(function () { // mousedown 이벤트 생성
            $(this).css('z-index', css_test_idx); // 클릭한 이미지만 z-index 증가시킴
            css_test_idx++;
            // 그러면 이미지가 겹칠경우 클릭한 것이 항상 위에 표시됨
        });

}

// 텍스트 추가
$("#selectFont").change(function () {
    var selectFont = $("#selectFont option:selected").val();
    $(".inputText").css('font-family', selectFont);
});

var fontSize = 18;
$("#font_size").change(() => {
    fontSize = $("#font_size option:selected").val();
    $(".inputText").css('font-size', fontSize + "px");
});
$("#text_sizeUp").click(function () {
    fontSize++;
    $(".inputText").css('font-size', fontSize);
});
$("#text_sizeDown").click(function () {
    fontSize--;
    $(".inputText").css('font-size', fontSize);
});


var colorButton = document.getElementById("colorChange");
var colorDiv = document.getElementById("color_val");
colorButton.onchange = () => {
    colorDiv.innerHTML = colorButton.value;
    var color = $("#colorChange").val();
    $(".inputText").css('color', color);
}

$(".text_btn").click(function () {
    var text = $(".inputText").val();
    var color = $("#colorChange").val();
    var selectFont = $("#selectFont option:selected").val();
    var fontSize = $("#font_size option:selected").val();

    $('.diary_content').append('<div class="daggu_ele_text" style="font-family:' + selectFont +
        ';font-size:' + textSize + 'px;color:' + color + ';font-size:' + fontSize + '">' + text + '</div>');
    $('.daggu_ele_text')
        .draggable()
        .css('cursor', 'move')
        .css('z-index', css_test_idx)
        .resizable({
            //비율 유지
            //aspectRatio: true,
            //마우스 hover 아닐때 핸들러 숨기기
            autoHide: true
        })
        .mousedown(function () { // mousedown 이벤트 생성
            $(this).css('z-index', css_test_idx); // 클릭한 이미지만 z-index 증가시킴
            css_test_idx++;
            // 그러면 이미지가 겹칠경우 클릭한 것이 항상 위에 표시됨
        });

    if ($('#trashIcon').hasClass('trashOn')) {
        $('.daggu_ele_text').addClass('trash');
        $('.daggu_ele_text').addClass('vibrate-1');
        $('.daggu_ele_text').click(function () {
            if ($('.daggu_ele_text').hasClass('trash')) {
                $(this).remove();
            }
        });
    }
    $(".inputText").val("");
});

//슬라이드 jquery 
$(".center").slick({
    dots: false,
    infinite: true,
    centerMode: true,
    slidesToShow: 5,
    arrows: true,
    slidesToScroll: 5
});

$('#slideIcon').click(function () {
    //슬라이드가 아래로 내려가있는 상태
    if ($('.tab_wrap').hasClass('down')) {
        $("input:checkbox[id='slideIcon']").prop("checked", false);
        // $('.tab_wrap').removeClass('down');
        // $('.tab_wrap').css('top', '50%');
    }
    // 슬라이드 올라와있는 상태
    else {
        $('.tab_wrap').addClass('down');
        $('.tab_wrap').css('top', '100%');
    }
});


// 다이어리 속지 변경이벤트
$('img[src^="img/paper/"]').click(function () {
    var src = $(event.target).attr("src");
    $('.diary_paper').attr("src", src);
});

// 새로고침, 뒤로가기 버튼 누르면 경고창 띄움
$(window).bind("beforeunload", function (e) {
    //return "창을 닫으시겠습니까?";
});