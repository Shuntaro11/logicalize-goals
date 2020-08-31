$(function(){

  let howManySteps = "1";

  let daysLeft = 0;

  let when;
  let whenY;
  let whenM;
  let whenD

  $("#inputWhen").blur(howManyDaysLeft);

  // 今日から目標達成日までの日数を計算
  function howManyDaysLeft() {

    let inputWhen = $("#inputWhen").val();

    when = new Date(inputWhen);

    whenY = when.getFullYear();
    whenM = when.getMonth()+1;
    whenD = when.getDate();

    let today = new Date();

    daysLeft = Math.floor( (when - today) / 86400000 );

    if(isNaN(daysLeft)){

      $('#howManyDays').text("");

    }else if(daysLeft > 0){

      $('#howManyDays').text(`${whenY} / ${whenM} / ${whenD} まで残り ${daysLeft} 日`);
      
      displayStepDays();

    }else{

      $('#howManyDays').text("");

    }

  }

  // ステップを入力するためのinputタグを,選択した数表示する
  $('#howManySteps').change(function() {
    
    howManySteps = $('#howManySteps').val();

    displayStepDays();

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

  function displayStepDays() {
    
    if(isNaN(daysLeft)){
      resetStepDays();
      return;
    }else if(daysLeft < 1){
      resetStepDays();
      return;
    }

    if(howManySteps === "1"){

      $('#stepDay1').text(`１ / １ step : ${whenY} / ${whenM} / ${whenD} までの目標`);

      $('#stepDay2').text("");
      $('#stepDay3').text("");
      $('#stepDay4').text("");
      $('#stepDay5').text("");
      $('#stepDay6').text("");
      $('#stepDay7').text("");
      $('#stepDay8').text("");
      $('#stepDay9').text("");
      $('#stepDay10').text("");

    }else if(howManySteps === "2"){

      let stepDaysFor = Math.floor(daysLeft / 2);
      let stepDay1 = new Date();
      let stepDay2 = new Date();

      stepDay1.setDate(stepDay1.getDate() + stepDaysFor);
      stepDay2.setDate(stepDay2.getDate() + (stepDaysFor * 2));

      $('#stepDay1').text(`１ / ２ step : ${stepDay1.getFullYear()} / ${stepDay1.getMonth()+1} / ${stepDay1.getDate()} までの目標`);
      $('#stepDay2').text(`２ / ２ step : ${stepDay2.getFullYear()} / ${stepDay2.getMonth()+1} / ${stepDay2.getDate()} までの目標`);

      $('#stepDay3').text("");
      $('#stepDay4').text("");
      $('#stepDay5').text("");
      $('#stepDay6').text("");
      $('#stepDay7').text("");
      $('#stepDay8').text("");
      $('#stepDay9').text("");
      $('#stepDay10').text("");

    }else if(howManySteps === "3"){

      let stepDaysFor = Math.floor(daysLeft / 3);
      let stepDay1 = new Date();
      let stepDay2 = new Date();
      let stepDay3 = new Date();

      stepDay1.setDate(stepDay1.getDate() + stepDaysFor);
      stepDay2.setDate(stepDay2.getDate() + (stepDaysFor * 2));
      stepDay3.setDate(stepDay3.getDate() + (stepDaysFor * 3));

      $('#stepDay1').text(`１ / ３ step : ${stepDay1.getFullYear()} / ${stepDay1.getMonth()+1} / ${stepDay1.getDate()} までの目標`);
      $('#stepDay2').text(`２ / ３ step : ${stepDay2.getFullYear()} / ${stepDay2.getMonth()+1} / ${stepDay2.getDate()} までの目標`);
      $('#stepDay3').text(`３ / ３ step : ${stepDay3.getFullYear()} / ${stepDay3.getMonth()+1} / ${stepDay3.getDate()} までの目標`);
      
      $('#stepDay4').text("");
      $('#stepDay5').text("");
      $('#stepDay6').text("");
      $('#stepDay7').text("");
      $('#stepDay8').text("");
      $('#stepDay9').text("");
      $('#stepDay10').text("");

    }else if(howManySteps === "4"){

      let stepDaysFor = Math.floor(daysLeft / 4);
      let stepDay1 = new Date();
      let stepDay2 = new Date();
      let stepDay3 = new Date();
      let stepDay4 = new Date();

      stepDay1.setDate(stepDay1.getDate() + stepDaysFor);
      stepDay2.setDate(stepDay2.getDate() + (stepDaysFor * 2));
      stepDay3.setDate(stepDay3.getDate() + (stepDaysFor * 3));
      stepDay4.setDate(stepDay4.getDate() + (stepDaysFor * 4));

      $('#stepDay1').text(`１ / ４ step : ${stepDay1.getFullYear()} / ${stepDay1.getMonth()+1} / ${stepDay1.getDate()} までの目標`);
      $('#stepDay2').text(`２ / ４ step : ${stepDay2.getFullYear()} / ${stepDay2.getMonth()+1} / ${stepDay2.getDate()} までの目標`);
      $('#stepDay3').text(`３ / ４ step : ${stepDay3.getFullYear()} / ${stepDay3.getMonth()+1} / ${stepDay3.getDate()} までの目標`);
      $('#stepDay4').text(`４ / ４ step : ${stepDay4.getFullYear()} / ${stepDay4.getMonth()+1} / ${stepDay4.getDate()} までの目標`);
      
      $('#stepDay5').text("");
      $('#stepDay6').text("");
      $('#stepDay7').text("");
      $('#stepDay8').text("");
      $('#stepDay9').text("");
      $('#stepDay10').text("");
      
    }else if(howManySteps === "5"){

      let stepDaysFor = Math.floor(daysLeft / 5);
      let stepDay1 = new Date();
      let stepDay2 = new Date();
      let stepDay3 = new Date();
      let stepDay4 = new Date();
      let stepDay5 = new Date();

      stepDay1.setDate(stepDay1.getDate() + stepDaysFor);
      stepDay2.setDate(stepDay2.getDate() + (stepDaysFor * 2));
      stepDay3.setDate(stepDay3.getDate() + (stepDaysFor * 3));
      stepDay4.setDate(stepDay4.getDate() + (stepDaysFor * 4));
      stepDay5.setDate(stepDay5.getDate() + (stepDaysFor * 5));

      $('#stepDay1').text(`１ / ５ step : ${stepDay1.getFullYear()} / ${stepDay1.getMonth()+1} / ${stepDay1.getDate()} までの目標`);
      $('#stepDay2').text(`２ / ５ step : ${stepDay2.getFullYear()} / ${stepDay2.getMonth()+1} / ${stepDay2.getDate()} までの目標`);
      $('#stepDay3').text(`３ / ５ step : ${stepDay3.getFullYear()} / ${stepDay3.getMonth()+1} / ${stepDay3.getDate()} までの目標`);
      $('#stepDay4').text(`４ / ５ step : ${stepDay4.getFullYear()} / ${stepDay4.getMonth()+1} / ${stepDay4.getDate()} までの目標`);
      $('#stepDay5').text(`５ / ５ step : ${stepDay5.getFullYear()} / ${stepDay5.getMonth()+1} / ${stepDay5.getDate()} までの目標`);
      
      $('#stepDay6').text("");
      $('#stepDay7').text("");
      $('#stepDay8').text("");
      $('#stepDay9').text("");
      $('#stepDay10').text("");
      
    }else if(howManySteps === "6"){

      let stepDaysFor = Math.floor(daysLeft / 6);
      let stepDay1 = new Date();
      let stepDay2 = new Date();
      let stepDay3 = new Date();
      let stepDay4 = new Date();
      let stepDay5 = new Date();
      let stepDay6 = new Date();

      stepDay1.setDate(stepDay1.getDate() + stepDaysFor);
      stepDay2.setDate(stepDay2.getDate() + (stepDaysFor * 2));
      stepDay3.setDate(stepDay3.getDate() + (stepDaysFor * 3));
      stepDay4.setDate(stepDay4.getDate() + (stepDaysFor * 4));
      stepDay5.setDate(stepDay5.getDate() + (stepDaysFor * 5));
      stepDay6.setDate(stepDay6.getDate() + (stepDaysFor * 6));

      $('#stepDay1').text(`１ / ６ step : ${stepDay1.getFullYear()} / ${stepDay1.getMonth()+1} / ${stepDay1.getDate()} までの目標`);
      $('#stepDay2').text(`２ / ６ step : ${stepDay2.getFullYear()} / ${stepDay2.getMonth()+1} / ${stepDay2.getDate()} までの目標`);
      $('#stepDay3').text(`３ / ６ step : ${stepDay3.getFullYear()} / ${stepDay3.getMonth()+1} / ${stepDay3.getDate()} までの目標`);
      $('#stepDay4').text(`４ / ６ step : ${stepDay4.getFullYear()} / ${stepDay4.getMonth()+1} / ${stepDay4.getDate()} までの目標`);
      $('#stepDay5').text(`５ / ６ step : ${stepDay5.getFullYear()} / ${stepDay5.getMonth()+1} / ${stepDay5.getDate()} までの目標`);
      $('#stepDay6').text(`６ / ６ step : ${stepDay6.getFullYear()} / ${stepDay6.getMonth()+1} / ${stepDay6.getDate()} までの目標`);
      
      $('#stepDay7').text("");
      $('#stepDay8').text("");
      $('#stepDay9').text("");
      $('#stepDay10').text("");
      
    }else if(howManySteps === "7"){

      let stepDaysFor = Math.floor(daysLeft / 7);
      let stepDay1 = new Date();
      let stepDay2 = new Date();
      let stepDay3 = new Date();
      let stepDay4 = new Date();
      let stepDay5 = new Date();
      let stepDay6 = new Date();
      let stepDay7 = new Date();

      stepDay1.setDate(stepDay1.getDate() + stepDaysFor);
      stepDay2.setDate(stepDay2.getDate() + (stepDaysFor * 2));
      stepDay3.setDate(stepDay3.getDate() + (stepDaysFor * 3));
      stepDay4.setDate(stepDay4.getDate() + (stepDaysFor * 4));
      stepDay5.setDate(stepDay5.getDate() + (stepDaysFor * 5));
      stepDay6.setDate(stepDay6.getDate() + (stepDaysFor * 6));
      stepDay7.setDate(stepDay7.getDate() + (stepDaysFor * 7));

      $('#stepDay1').text(`１ / ７ step : ${stepDay1.getFullYear()} / ${stepDay1.getMonth()+1} / ${stepDay1.getDate()} までの目標`);
      $('#stepDay2').text(`２ / ７ step : ${stepDay2.getFullYear()} / ${stepDay2.getMonth()+1} / ${stepDay2.getDate()} までの目標`);
      $('#stepDay3').text(`３ / ７ step : ${stepDay3.getFullYear()} / ${stepDay3.getMonth()+1} / ${stepDay3.getDate()} までの目標`);
      $('#stepDay4').text(`４ / ７ step : ${stepDay4.getFullYear()} / ${stepDay4.getMonth()+1} / ${stepDay4.getDate()} までの目標`);
      $('#stepDay5').text(`５ / ７ step : ${stepDay5.getFullYear()} / ${stepDay5.getMonth()+1} / ${stepDay5.getDate()} までの目標`);
      $('#stepDay6').text(`６ / ７ step : ${stepDay6.getFullYear()} / ${stepDay6.getMonth()+1} / ${stepDay6.getDate()} までの目標`);
      $('#stepDay7').text(`７ / ７ step : ${stepDay7.getFullYear()} / ${stepDay7.getMonth()+1} / ${stepDay7.getDate()} までの目標`);
      
      $('#stepDay8').text("");
      $('#stepDay9').text("");
      $('#stepDay10').text("");
      
    }else if(howManySteps === "8"){

      let stepDaysFor = Math.floor(daysLeft / 8);
      let stepDay1 = new Date();
      let stepDay2 = new Date();
      let stepDay3 = new Date();
      let stepDay4 = new Date();
      let stepDay5 = new Date();
      let stepDay6 = new Date();
      let stepDay7 = new Date();
      let stepDay8 = new Date();

      stepDay1.setDate(stepDay1.getDate() + stepDaysFor);
      stepDay2.setDate(stepDay2.getDate() + (stepDaysFor * 2));
      stepDay3.setDate(stepDay3.getDate() + (stepDaysFor * 3));
      stepDay4.setDate(stepDay4.getDate() + (stepDaysFor * 4));
      stepDay5.setDate(stepDay5.getDate() + (stepDaysFor * 5));
      stepDay6.setDate(stepDay6.getDate() + (stepDaysFor * 6));
      stepDay7.setDate(stepDay7.getDate() + (stepDaysFor * 7));
      stepDay8.setDate(stepDay8.getDate() + (stepDaysFor * 8));

      $('#stepDay1').text(`１ / ８ step : ${stepDay1.getFullYear()} / ${stepDay1.getMonth()+1} / ${stepDay1.getDate()} までの目標`);
      $('#stepDay2').text(`２ / ８ step : ${stepDay2.getFullYear()} / ${stepDay2.getMonth()+1} / ${stepDay2.getDate()} までの目標`);
      $('#stepDay3').text(`３ / ８ step : ${stepDay3.getFullYear()} / ${stepDay3.getMonth()+1} / ${stepDay3.getDate()} までの目標`);
      $('#stepDay4').text(`４ / ８ step : ${stepDay4.getFullYear()} / ${stepDay4.getMonth()+1} / ${stepDay4.getDate()} までの目標`);
      $('#stepDay5').text(`５ / ８ step : ${stepDay5.getFullYear()} / ${stepDay5.getMonth()+1} / ${stepDay5.getDate()} までの目標`);
      $('#stepDay6').text(`６ / ８ step : ${stepDay6.getFullYear()} / ${stepDay6.getMonth()+1} / ${stepDay6.getDate()} までの目標`);
      $('#stepDay7').text(`７ / ８ step : ${stepDay7.getFullYear()} / ${stepDay7.getMonth()+1} / ${stepDay7.getDate()} までの目標`);
      $('#stepDay8').text(`８ / ８ step : ${stepDay8.getFullYear()} / ${stepDay8.getMonth()+1} / ${stepDay8.getDate()} までの目標`);
      
      $('#stepDay9').text("");
      $('#stepDay10').text("");
      
    }else if(howManySteps === "9"){

      let stepDaysFor = Math.floor(daysLeft / 9);
      let stepDay1 = new Date();
      let stepDay2 = new Date();
      let stepDay3 = new Date();
      let stepDay4 = new Date();
      let stepDay5 = new Date();
      let stepDay6 = new Date();
      let stepDay7 = new Date();
      let stepDay8 = new Date();
      let stepDay9 = new Date();

      stepDay1.setDate(stepDay1.getDate() + stepDaysFor);
      stepDay2.setDate(stepDay2.getDate() + (stepDaysFor * 2));
      stepDay3.setDate(stepDay3.getDate() + (stepDaysFor * 3));
      stepDay4.setDate(stepDay4.getDate() + (stepDaysFor * 4));
      stepDay5.setDate(stepDay5.getDate() + (stepDaysFor * 5));
      stepDay6.setDate(stepDay6.getDate() + (stepDaysFor * 6));
      stepDay7.setDate(stepDay7.getDate() + (stepDaysFor * 7));
      stepDay8.setDate(stepDay8.getDate() + (stepDaysFor * 8));
      stepDay9.setDate(stepDay9.getDate() + (stepDaysFor * 9));

      $('#stepDay1').text(`１ / ９ step : ${stepDay1.getFullYear()} / ${stepDay1.getMonth()+1} / ${stepDay1.getDate()} までの目標`);
      $('#stepDay2').text(`２ / ９ step : ${stepDay2.getFullYear()} / ${stepDay2.getMonth()+1} / ${stepDay2.getDate()} までの目標`);
      $('#stepDay3').text(`３ / ９ step : ${stepDay3.getFullYear()} / ${stepDay3.getMonth()+1} / ${stepDay3.getDate()} までの目標`);
      $('#stepDay4').text(`４ / ９ step : ${stepDay4.getFullYear()} / ${stepDay4.getMonth()+1} / ${stepDay4.getDate()} までの目標`);
      $('#stepDay5').text(`５ / ９ step : ${stepDay5.getFullYear()} / ${stepDay5.getMonth()+1} / ${stepDay5.getDate()} までの目標`);
      $('#stepDay6').text(`６ / ９ step : ${stepDay6.getFullYear()} / ${stepDay6.getMonth()+1} / ${stepDay6.getDate()} までの目標`);
      $('#stepDay7').text(`７ / ９ step : ${stepDay7.getFullYear()} / ${stepDay7.getMonth()+1} / ${stepDay7.getDate()} までの目標`);
      $('#stepDay8').text(`８ / ９ step : ${stepDay8.getFullYear()} / ${stepDay8.getMonth()+1} / ${stepDay8.getDate()} までの目標`);
      $('#stepDay9').text(`９ / ９ step : ${stepDay9.getFullYear()} / ${stepDay9.getMonth()+1} / ${stepDay9.getDate()} までの目標`);
      
      $('#stepDay10').text("");
      
    }else if(howManySteps === "10"){

      let stepDaysFor = Math.floor(daysLeft / 10);
      let stepDay1 = new Date();
      let stepDay2 = new Date();
      let stepDay3 = new Date();
      let stepDay4 = new Date();
      let stepDay5 = new Date();
      let stepDay6 = new Date();
      let stepDay7 = new Date();
      let stepDay8 = new Date();
      let stepDay9 = new Date();
      let stepDay10 = new Date();

      stepDay1.setDate(stepDay1.getDate() + stepDaysFor);
      stepDay2.setDate(stepDay2.getDate() + (stepDaysFor * 2));
      stepDay3.setDate(stepDay3.getDate() + (stepDaysFor * 3));
      stepDay4.setDate(stepDay4.getDate() + (stepDaysFor * 4));
      stepDay5.setDate(stepDay5.getDate() + (stepDaysFor * 5));
      stepDay6.setDate(stepDay6.getDate() + (stepDaysFor * 6));
      stepDay7.setDate(stepDay7.getDate() + (stepDaysFor * 7));
      stepDay8.setDate(stepDay8.getDate() + (stepDaysFor * 8));
      stepDay9.setDate(stepDay9.getDate() + (stepDaysFor * 9));
      stepDay10.setDate(stepDay10.getDate() + (stepDaysFor * 10));

      $('#stepDay1').text(`１ / １０ step : ${stepDay1.getFullYear()} / ${stepDay1.getMonth()+1} / ${stepDay1.getDate()} までの目標`);
      $('#stepDay2').text(`２ / １０ step : ${stepDay2.getFullYear()} / ${stepDay2.getMonth()+1} / ${stepDay2.getDate()} までの目標`);
      $('#stepDay3').text(`３ / １０ step : ${stepDay3.getFullYear()} / ${stepDay3.getMonth()+1} / ${stepDay3.getDate()} までの目標`);
      $('#stepDay4').text(`４ / １０ step : ${stepDay4.getFullYear()} / ${stepDay4.getMonth()+1} / ${stepDay4.getDate()} までの目標`);
      $('#stepDay5').text(`５ / １０ step : ${stepDay5.getFullYear()} / ${stepDay5.getMonth()+1} / ${stepDay5.getDate()} までの目標`);
      $('#stepDay6').text(`６ / １０ step : ${stepDay6.getFullYear()} / ${stepDay6.getMonth()+1} / ${stepDay6.getDate()} までの目標`);
      $('#stepDay7').text(`７ / １０ step : ${stepDay7.getFullYear()} / ${stepDay7.getMonth()+1} / ${stepDay7.getDate()} までの目標`);
      $('#stepDay8').text(`８ / １０ step : ${stepDay8.getFullYear()} / ${stepDay8.getMonth()+1} / ${stepDay8.getDate()} までの目標`);
      $('#stepDay9').text(`９ / １０ step : ${stepDay9.getFullYear()} / ${stepDay9.getMonth()+1} / ${stepDay9.getDate()} までの目標`);
      $('#stepDay10').text(`１０ / １０ step : ${stepDay10.getFullYear()} / ${stepDay10.getMonth()+1} / ${stepDay10.getDate()} までの目標`);
      
    }


  }

  function resetStepDays(){

    $('#stepDay1').text("");
    $('#stepDay2').text("");
    $('#stepDay3').text("");
    $('#stepDay4').text("");
    $('#stepDay5').text("");
    $('#stepDay6').text("");
    $('#stepDay7').text("");
    $('#stepDay8').text("");
    $('#stepDay9').text("");
    $('#stepDay10').text("");

  }

});