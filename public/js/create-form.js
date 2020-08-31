$(function(){

  $("#nextBtn1").on('click', function(e) {

    $("#whatForm").css("display", "none");
    $("#whyForm").css("display", "block");

    $("#markNumber1").css("background", "rgba(255, 255, 255, 0.3)");
    $("#markNumber1").css("box-shadow", "none");

    $("#markNumber2").css("background", "white");
    $("#markNumber2").css("box-shadow", "0 5px 14px 0 rgba(0,0,0,.3)");

  });

  $("#prevBtn2").on('click', function(e) {

    $("#whyForm").css("display", "none");
    $("#whatForm").css("display", "block");

    $("#markNumber1").css("background", "white");
    $("#markNumber1").css("box-shadow", "0 5px 14px 0 rgba(0,0,0,.3)");

    $("#markNumber2").css("background", "rgba(255, 255, 255, 0.3)");
    $("#markNumber2").css("box-shadow", "none");

  });

  $("#nextBtn2").on('click', function(e) {

    $("#whyForm").css("display", "none");
    $("#whenForm").css("display", "block");

    $("#markNumber2").css("background", "rgba(255, 255, 255, 0.3)");
    $("#markNumber2").css("box-shadow", "none");

    $("#markNumber3").css("background", "white");
    $("#markNumber3").css("box-shadow", "0 5px 14px 0 rgba(0,0,0,.3)");

  });

  $("#prevBtn3").on('click', function(e) {

    $("#whenForm").css("display", "none");
    $("#whyForm").css("display", "block");

    $("#markNumber2").css("background", "white");
    $("#markNumber2").css("box-shadow", "0 5px 14px 0 rgba(0,0,0,.3)");

    $("#markNumber3").css("background", "rgba(255, 255, 255, 0.3)");
    $("#markNumber3").css("box-shadow", "none");

  });

  $("#nextBtn3").on('click', function(e) {

    $("#whenForm").css("display", "none");
    $("#howMuchForm").css("display", "block");

    $("#markNumber3").css("background", "rgba(255, 255, 255, 0.3)");
    $("#markNumber3").css("box-shadow", "none");

    $("#markNumber4").css("background", "white");
    $("#markNumber4").css("box-shadow", "0 5px 14px 0 rgba(0,0,0,.3)");

  });

  $("#prevBtn4").on('click', function(e) {

    $("#howMuchForm").css("display", "none");
    $("#whenForm").css("display", "block");

    $("#markNumber3").css("background", "white");
    $("#markNumber3").css("box-shadow", "0 5px 14px 0 rgba(0,0,0,.3)");

    $("#markNumber4").css("background", "rgba(255, 255, 255, 0.3)");
    $("#markNumber4").css("box-shadow", "none");

  });

  $("#nextBtn4").on('click', function(e) {

    $("#howMuchForm").css("display", "none");
    $("#stepForm").css("display", "block");

    $("#markNumber4").css("background", "rgba(255, 255, 255, 0.3)");
    $("#markNumber4").css("box-shadow", "none");

    $("#markNumber5").css("background", "white");
    $("#markNumber5").css("box-shadow", "0 5px 14px 0 rgba(0,0,0,.3)");

  });

  $("#prevBtn5").on('click', function(e) {

    $("#stepForm").css("display", "none");
    $("#howMuchForm").css("display", "block");

    $("#markNumber4").css("background", "white");
    $("#markNumber4").css("box-shadow", "0 5px 14px 0 rgba(0,0,0,.3)");

    $("#markNumber5").css("background", "rgba(255, 255, 255, 0.3)");
    $("#markNumber5").css("box-shadow", "none");

  });

  $("#nextBtn5").on('click', function(e) {

    $("#stepForm").css("display", "none");
    // $("#confirmForm").css("display", "block");

    $("#markNumber5").css("background", "rgba(255, 255, 255, 0.3)");
    $("#markNumber5").css("box-shadow", "none");

    $("#markNumber6").css("background", "white");
    $("#markNumber6").css("box-shadow", "0 5px 14px 0 rgba(0,0,0,.3)");

  });


});