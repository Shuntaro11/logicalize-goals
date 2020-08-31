$(function(){

  $("#inputWhen").blur(sampleEvent);

  function sampleEvent() {

    var val = $("#inputWhen").val();
    console.log(val);

    var when = new Date(val);
    console.log(when);

    var whenY = when.getFullYear();
    var whenM = when.getMonth()+1;
    var whenD = when.getDate();

    var today = new Date();
    console.log(today);

    var daysLeft = Math.floor( (when - today) / 86400000 );

    if(!isNaN(daysLeft)){

      $('#howManyDays').text(`${whenY}/${whenM}/${whenD}まで残り${daysLeft}日`);

    }

  }

  $('#howManySteps').change(function() {
    
    var howManySteps = $('#howManySteps').val();

    if(howManySteps === "1"){

      $('#step2').val('');
      $('#step3').val('');
      $('#step4').val('');
      $('#step5').val('');
      $('#step6').val('');
      $('#step7').val('');
      $('#step8').val('');
      $('#step9').val('');
      $('#step10').val('');

      $("#step2").css("display", "none");
      $("#step3").css("display", "none");
      $("#step4").css("display", "none");
      $("#step5").css("display", "none");
      $("#step6").css("display", "none");
      $("#step7").css("display", "none");
      $("#step8").css("display", "none");
      $("#step9").css("display", "none");
      $("#step10").css("display", "none");

    }else if(howManySteps === "2"){

      $('#step3').val('');
      $('#step4').val('');
      $('#step5').val('');
      $('#step6').val('');
      $('#step7').val('');
      $('#step8').val('');
      $('#step9').val('');
      $('#step10').val('');

      $("#step2").css("display", "inline-block");
      $("#step3").css("display", "none");
      $("#step4").css("display", "none");
      $("#step5").css("display", "none");
      $("#step6").css("display", "none");
      $("#step7").css("display", "none");
      $("#step8").css("display", "none");
      $("#step9").css("display", "none");
      $("#step10").css("display", "none");

    }else if(howManySteps === "3"){

      $('#step4').val('');
      $('#step5').val('');
      $('#step6').val('');
      $('#step7').val('');
      $('#step8').val('');
      $('#step9').val('');
      $('#step10').val('');

      $("#step2").css("display", "inline-block");
      $("#step3").css("display", "inline-block");
      $("#step4").css("display", "none");
      $("#step5").css("display", "none");
      $("#step6").css("display", "none");
      $("#step7").css("display", "none");
      $("#step8").css("display", "none");
      $("#step9").css("display", "none");
      $("#step10").css("display", "none");

    }else if(howManySteps === "4"){

      $('#step5').val('');
      $('#step6').val('');
      $('#step7').val('');
      $('#step8').val('');
      $('#step9').val('');
      $('#step10').val('');

      $("#step2").css("display", "inline-block");
      $("#step3").css("display", "inline-block");
      $("#step4").css("display", "inline-block");
      $("#step5").css("display", "none");
      $("#step6").css("display", "none");
      $("#step7").css("display", "none");
      $("#step8").css("display", "none");
      $("#step9").css("display", "none");
      $("#step10").css("display", "none");

    }else if(howManySteps === "5"){

      $('#step6').val('');
      $('#step7').val('');
      $('#step8').val('');
      $('#step9').val('');
      $('#step10').val('');

      $("#step2").css("display", "inline-block");
      $("#step3").css("display", "inline-block");
      $("#step4").css("display", "inline-block");
      $("#step5").css("display", "inline-block");
      $("#step6").css("display", "none");
      $("#step7").css("display", "none");
      $("#step8").css("display", "none");
      $("#step9").css("display", "none");
      $("#step10").css("display", "none");

    }else if(howManySteps === "6"){

      $('#step7').val('');
      $('#step8').val('');
      $('#step9').val('');
      $('#step10').val('');

      $("#step2").css("display", "inline-block");
      $("#step3").css("display", "inline-block");
      $("#step4").css("display", "inline-block");
      $("#step5").css("display", "inline-block");
      $("#step6").css("display", "inline-block");
      $("#step7").css("display", "none");
      $("#step8").css("display", "none");
      $("#step9").css("display", "none");
      $("#step10").css("display", "none");

    }else if(howManySteps === "7"){

      $('#step8').val('');
      $('#step9').val('');
      $('#step10').val('');

      $("#step2").css("display", "inline-block");
      $("#step3").css("display", "inline-block");
      $("#step4").css("display", "inline-block");
      $("#step5").css("display", "inline-block");
      $("#step6").css("display", "inline-block");
      $("#step7").css("display", "inline-block");
      $("#step8").css("display", "none");
      $("#step9").css("display", "none");
      $("#step10").css("display", "none");

    }else if(howManySteps === "8"){

      $('#step9').val('');
      $('#step10').val('');

      $("#step2").css("display", "inline-block");
      $("#step3").css("display", "inline-block");
      $("#step4").css("display", "inline-block");
      $("#step5").css("display", "inline-block");
      $("#step6").css("display", "inline-block");
      $("#step7").css("display", "inline-block");
      $("#step8").css("display", "inline-block");
      $("#step9").css("display", "none");
      $("#step10").css("display", "none");

    }else if(howManySteps === "9"){

      $('#step10').val('');

      $("#step2").css("display", "inline-block");
      $("#step3").css("display", "inline-block");
      $("#step4").css("display", "inline-block");
      $("#step5").css("display", "inline-block");
      $("#step6").css("display", "inline-block");
      $("#step7").css("display", "inline-block");
      $("#step8").css("display", "inline-block");
      $("#step9").css("display", "inline-block");
      $("#step10").css("display", "none");

    }else if(howManySteps === "10"){

      $("#step2").css("display", "inline-block");
      $("#step3").css("display", "inline-block");
      $("#step4").css("display", "inline-block");
      $("#step5").css("display", "inline-block");
      $("#step6").css("display", "inline-block");
      $("#step7").css("display", "inline-block");
      $("#step8").css("display", "inline-block");
      $("#step9").css("display", "inline-block");
      $("#step10").css("display", "inline-block");

    }
  
  });

});