$(document).ready(function(){

  //로그인 버튼 이벤트
  $(".login_btn").on("click",function(){
    $(".login_box").css({"display":"block"})

  })
  $(".login_box_close").on("click",function(){

    $(".login_box").css({"display":"none"})
  })
  //로그인 box 보이기 안보이기

  //로기인 box signup join 이벤트
  $("#selector_login").click(function(){
    $(this).css({"border-bottom":"3px solid #1b2d43"})
    $("#selector_join").css({"border-bottom":"none"})
    $(".select_login").css({"display":"block"})
    $(".select_join").css({"display":"none"})




    })
    $("#selector_join").click(function(){
      $(this).css({"border-bottom":"3px solid #1b2d43"})
      $("#selector_login").css({"border-bottom":"none"})
      $(".select_login").css({"display":"none"})
      $(".select_join").css({"display":"block"})


      })







  $("#team_ul").on("click",function(){
    $(".small_list_1").toggle();
    $(".small_list_2").hide();
    $(".small_list_3").hide();
  })
  $("#member_ul").on("click",function(){
    $(".small_list_2").toggle();
    $(".small_list_1").hide();
    $(".small_list_3").hide();
  })
  $("#league_ul").on("click",function(){
    $(".small_list_3").toggle();
    $(".small_list_2").hide();
    $(".small_list_1").hide();
  })


$("#hamber_open").on("click",function(){
  $(".nav").animate({left:'0px'});
    $(this).css({"display":"none"});
    $("#hamber_close").css({"display":"block"});
});
$("#hamber_close").on("click",function(){
  $(".nav").animate({left:'-250px'});
    $("#hamber_close").css({"display":"none"});
    $("#hamber_open").css({"display":"block"});
});


})
