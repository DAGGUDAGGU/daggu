var check = true;
$(window).on("beforeunload", function(){
        if(check){
        return "이 페이지를 벗어나면 작성된 내용은 저장되지 않습니다.";
    }
});
