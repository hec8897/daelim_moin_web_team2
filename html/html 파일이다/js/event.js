$(document).ready(function(){
  $(".login_btn").on("click",function(){
    $(".login_box").css({"display":"block"})

  })
  $(".login_box_close").on("click",function(){

    $(".login_box").css({"display":"none"})
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
