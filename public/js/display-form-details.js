$(function(){

  let howManySteps = "1";

  let daysLeft = 0;

  let when;
  let whenY;
  let whenM;
  let whenD;

  let inputWhy1 = "";
  let inputWhy2 = "";
  let inputWhy3 = "";
  let inputWhy4 = "";
  let inputWhy5 = "";

  let inputStep1 = "";
  let inputStep2 = "";
  let inputStep3 = "";
  let inputStep4 = "";
  let inputStep5 = "";
  let inputStep6 = "";
  let inputStep7 = "";
  let inputStep8 = "";
  let inputStep9 = "";
  let inputStep10 = "";

  // 目標が入力されたら発火
  $('#inputWhat').blur(function(e) {
    checkError("what");
  });

  // 時期が設定されたら発火
  $('#inputWhen').blur(function(e) {
    howManyDaysLeft();
  });

  // 理由が入力されたら発火
  $('#inputWhy1').blur(function(e) {
    inputWhy1 = $("#inputWhy1").val();
    checkError("why1");
  });
  $('#inputWhy2').blur(function(e) {
    inputWhy2 = $("#inputWhy2").val();
    checkError("why2");
  });
  $('#inputWhy3').blur(function(e) {
    inputWhy3 = $("#inputWhy3").val();
    checkError("why3");
  });
  $('#inputWhy4').blur(function(e) {
    inputWhy4 = $("#inputWhy4").val();
    checkError("why4");
  });
  $('#inputWhy5').blur(function(e) {
    inputWhy5 = $("#inputWhy5").val();
    checkError("why5");
  });

  // ステップが入力されたら発火
  $('#inputStep1').blur(function(e) {
    inputStep1 = $("#inputStep1").val();
    checkError("step1");
  });
  $('#inputStep2').blur(function(e) {
    inputStep2 = $("#inputStep2").val();
    checkError("step2");
  });
  $('#inputStep3').blur(function(e) {
    inputStep3 = $("#inputStep3").val();
    checkError("step3");
  });
  $('#inputStep4').blur(function(e) {
    inputStep4 = $("#inputStep4").val();
    checkError("step4");
  });
  $('#inputStep5').blur(function(e) {
    inputStep5 = $("#inputStep5").val();
    checkError("step5");
  });
  $('#inputStep6').blur(function(e) {
    inputStep6 = $("#inputStep6").val();
    checkError("step6");
  });
  $('#inputStep7').blur(function(e) {
    inputStep7 = $("#inputStep7").val();
    checkError("step7");
  });
  $('#inputStep8').blur(function(e) {
    inputStep8 = $("#inputStep8").val();
    checkError("step8");
  });
  $('#inputStep9').blur(function(e) {
    inputStep9 = $("#inputStep9").val();
    checkError("step9");
  });
  $('#inputStep10').blur(function(e) {
    inputStep10 = $("#inputStep10").val();
    checkError("step10");
  });

  // 重要度を確認画面に表示
  $('#selectImportant').change(function(e) {

    let selectImportant = $("#selectImportant").val();
    switch(selectImportant) {
      case "1":
        $('#confirmImportant').text("１");
      break;
      case "2":
        $('#confirmImportant').text("２");
      break;
      case "3":
        $('#confirmImportant').text("３");
      break;
      case "4":
        $('#confirmImportant').text("４");
      break;
      case "5":
        $('#confirmImportant').text("５");
      break;
      case "6":
        $('#confirmImportant').text("６");
      break;
      case "7":
        $('#confirmImportant').text("７");
      break;
      case "8":
        $('#confirmImportant').text("８");
      break;
      case "9":
        $('#confirmImportant').text("９");
      break;
      case "10":
        $('#confirmImportant').text("１０");
      break;
      default:
      break;
    }

  });

  // 緊急度を確認画面に表示
  $('#selectUrgent').change(function(e) {

    let selectUrgent = $("#selectUrgent").val();
    switch(selectUrgent) {
      case "1":
        $('#confirmUrgent').text("１");
      break;
      case "2":
        $('#confirmUrgent').text("２");
      break;
      case "3":
        $('#confirmUrgent').text("３");
      break;
      case "4":
        $('#confirmUrgent').text("４");
      break;
      case "5":
        $('#confirmUrgent').text("５");
      break;
      case "6":
        $('#confirmUrgent').text("６");
      break;
      case "7":
        $('#confirmUrgent').text("７");
      break;
      case "8":
        $('#confirmUrgent').text("８");
      break;
      case "9":
        $('#confirmUrgent').text("９");
      break;
      case "10":
        $('#confirmUrgent').text("１０");
      break;
      default:
      break;
    }

  });

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

      $('#howManyDays').css("display", "inline-block");
      $('#howManyDays').text("※有効な日付が選択されていません");
      checkError("when");

    }else if(daysLeft > 0){

      $('#howManyDays').css("display", "inline-block");
      $('#howManyDays').text(`${whenY} / ${whenM} / ${whenD} まで残り ${daysLeft} 日`);
      
      displayStepDays();
      checkError("when");

    }else{

      $('#howManyDays').css("display", "inline-block");
      $('#howManyDays').text("※有効な日付が選択されていません");
      checkError("when");

    }

  }

  // ステップを入力するためのinputタグを,選択した数表示する
  $('#howManySteps').change(function() {
    
    howManySteps = $('#howManySteps').val();

    displayStepDays();

    if(howManySteps === "1"){

      $('#inputStep2').val('');
      $('#inputStep3').val('');
      $('#inputStep4').val('');
      $('#inputStep5').val('');
      $('#inputStep6').val('');
      $('#inputStep7').val('');
      $('#inputStep8').val('');
      $('#inputStep9').val('');
      $('#inputStep10').val('');

      $('#inputStep2').css("display", "none");
      $('#inputStep3').css("display", "none");
      $('#inputStep4').css("display", "none");
      $('#inputStep5').css("display", "none");
      $('#inputStep6').css("display", "none");
      $('#inputStep7').css("display", "none");
      $('#inputStep8').css("display", "none");
      $('#inputStep9').css("display", "none");
      $('#inputStep10').css("display", "none");

    }else if(howManySteps === "2"){

      $('#inputStep3').val('');
      $('#inputStep4').val('');
      $('#inputStep5').val('');
      $('#inputStep6').val('');
      $('#inputStep7').val('');
      $('#inputStep8').val('');
      $('#inputStep9').val('');
      $('#inputStep10').val('');

      $('#inputStep2').css("display", "inline-block");
      $('#inputStep3').css("display", "none");
      $('#inputStep4').css("display", "none");
      $('#inputStep5').css("display", "none");
      $('#inputStep6').css("display", "none");
      $('#inputStep7').css("display", "none");
      $('#inputStep8').css("display", "none");
      $('#inputStep9').css("display", "none");
      $('#inputStep10').css("display", "none");

    }else if(howManySteps === "3"){

      $('#inputStep4').val('');
      $('#inputStep5').val('');
      $('#inputStep6').val('');
      $('#inputStep7').val('');
      $('#inputStep8').val('');
      $('#inputStep9').val('');
      $('#inputStep10').val('');

      $('#inputStep2').css("display", "inline-block");
      $('#inputStep3').css("display", "inline-block");
      $('#inputStep4').css("display", "none");
      $('#inputStep5').css("display", "none");
      $('#inputStep6').css("display", "none");
      $('#inputStep7').css("display", "none");
      $('#inputStep8').css("display", "none");
      $('#inputStep9').css("display", "none");
      $('#inputStep10').css("display", "none");

    }else if(howManySteps === "4"){

      $('#inputStep5').val('');
      $('#inputStep6').val('');
      $('#inputStep7').val('');
      $('#inputStep8').val('');
      $('#inputStep9').val('');
      $('#inputStep10').val('');

      $('#inputStep2').css("display", "inline-block");
      $('#inputStep3').css("display", "inline-block");
      $('#inputStep4').css("display", "inline-block");
      $('#inputStep5').css("display", "none");
      $('#inputStep6').css("display", "none");
      $('#inputStep7').css("display", "none");
      $('#inputStep8').css("display", "none");
      $('#inputStep9').css("display", "none");
      $('#inputStep10').css("display", "none");

    }else if(howManySteps === "5"){

      $('#inputStep6').val('');
      $('#inputStep7').val('');
      $('#inputStep8').val('');
      $('#inputStep9').val('');
      $('#inputStep10').val('');

      $('#inputStep2').css("display", "inline-block");
      $('#inputStep3').css("display", "inline-block");
      $('#inputStep4').css("display", "inline-block");
      $('#inputStep5').css("display", "inline-block");
      $('#inputStep6').css("display", "none");
      $('#inputStep7').css("display", "none");
      $('#inputStep8').css("display", "none");
      $('#inputStep9').css("display", "none");
      $('#inputStep10').css("display", "none");

    }else if(howManySteps === "6"){

      $('#inputStep7').val('');
      $('#inputStep8').val('');
      $('#inputStep9').val('');
      $('#inputStep10').val('');

      $('#inputStep2').css("display", "inline-block");
      $('#inputStep3').css("display", "inline-block");
      $('#inputStep4').css("display", "inline-block");
      $('#inputStep5').css("display", "inline-block");
      $('#inputStep6').css("display", "inline-block");
      $('#inputStep7').css("display", "none");
      $('#inputStep8').css("display", "none");
      $('#inputStep9').css("display", "none");
      $('#inputStep10').css("display", "none");

    }else if(howManySteps === "7"){

      $('#inputStep8').val('');
      $('#inputStep9').val('');
      $('#inputStep10').val('');

      $('#inputStep2').css("display", "inline-block");
      $('#inputStep3').css("display", "inline-block");
      $('#inputStep4').css("display", "inline-block");
      $('#inputStep5').css("display", "inline-block");
      $('#inputStep6').css("display", "inline-block");
      $('#inputStep7').css("display", "inline-block");
      $('#inputStep8').css("display", "none");
      $('#inputStep9').css("display", "none");
      $('#inputStep10').css("display", "none");

    }else if(howManySteps === "8"){

      $('#inputStep9').val('');
      $('#inputStep10').val('');

      $('#inputStep2').css("display", "inline-block");
      $('#inputStep3').css("display", "inline-block");
      $('#inputStep4').css("display", "inline-block");
      $('#inputStep5').css("display", "inline-block");
      $('#inputStep6').css("display", "inline-block");
      $('#inputStep7').css("display", "inline-block");
      $('#inputStep8').css("display", "inline-block");
      $('#inputStep9').css("display", "none");
      $('#inputStep10').css("display", "none");

    }else if(howManySteps === "9"){

      $('#inputStep10').val('');

      $('#inputStep2').css("display", "inline-block");
      $('#inputStep3').css("display", "inline-block");
      $('#inputStep4').css("display", "inline-block");
      $('#inputStep5').css("display", "inline-block");
      $('#inputStep6').css("display", "inline-block");
      $('#inputStep7').css("display", "inline-block");
      $('#inputStep8').css("display", "inline-block");
      $('#inputStep9').css("display", "inline-block");
      $('#inputStep10').css("display", "none");

    }else if(howManySteps === "10"){

      $('#inputStep2').css("display", "inline-block");
      $('#inputStep3').css("display", "inline-block");
      $('#inputStep4').css("display", "inline-block");
      $('#inputStep5').css("display", "inline-block");
      $('#inputStep6').css("display", "inline-block");
      $('#inputStep7').css("display", "inline-block");
      $('#inputStep8').css("display", "inline-block");
      $('#inputStep9').css("display", "inline-block");
      $('#inputStep10').css("display", "inline-block");

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


  function checkError(form) {

    if(form === "what"){

      let inputWhat = $("#inputWhat").val();

      if(inputWhat === ""){

        $('#errorWhat').text("※目標が未入力です");
        $('#confirmWhat').text("");

      }else{

        $('#errorWhat').text("");

        $('#confirmWhat').text(inputWhat);
        
      }

    }else if(form === "when"){

      if(isNaN(daysLeft)){

        $('#errorWhen').text("※有効な日付が選択されていません");
        $('#confirmWhen').text("");
  
      }else if(daysLeft > 0){
  
        $('#errorWhen').text("");
        $('#confirmWhen').text(`${whenY} / ${whenM} / ${whenD} （${daysLeft} 日後）`);
  
      }else{
  
        $('#errorWhen').text("※有効な日付が選択されていません");
        $('#confirmWhen').text("");
  
      }
    
    }else if(form === "why1"){

      checkWhyBlank();
      if(inputWhy1 === ""){
        $('#confirmWhy1').text("");
      }else{
        $('#confirmWhy1').text(`・${inputWhy1}`);
      }
      
    }else if(form === "why2"){

      checkWhyBlank();
      if(inputWhy2 === ""){
        $('#confirmWhy2').text("");
      }else{
        $('#confirmWhy2').text(`・${inputWhy2}`);
      }

    }else if(form === "why3"){

      checkWhyBlank();
      if(inputWhy3 === ""){
        $('#confirmWhy3').text("");
      }else{
        $('#confirmWhy3').text(`・${inputWhy3}`);
      }

    }else if(form === "why4"){

      checkWhyBlank();
      if(inputWhy4 === ""){
        $('#confirmWhy4').text("");
      }else{
        $('#confirmWhy4').text(`・${inputWhy4}`);
      }

    }else if(form === "why5"){

      checkWhyBlank();
      if(inputWhy5 === ""){
        $('#confirmWhy5').text("");
      }else{
        $('#confirmWhy5').text(`・${inputWhy5}`);
      }

    }else if(form === "step1"){

      checkStepBlank();
      if(inputStep1 === ""){
        $('#confirmStep1').text("");
      }else{
        $('#confirmStep1').text(`・${inputStep1}`);
      }
      
    }else if(form === "step2"){

      checkStepBlank();
      if(inputStep2 === ""){
        $('#confirmStep2').text("");
      }else{
        $('#confirmStep2').text(`・${inputStep2}`);
      }
      
    }else if(form === "step3"){

      checkStepBlank();
      if(inputStep3 === ""){
        $('#confirmStep3').text("");
      }else{
        $('#confirmStep3').text(`・${inputStep3}`);
      }
      
    }else if(form === "step4"){

      checkStepBlank();
      if(inputStep4 === ""){
        $('#confirmStep4').text("");
      }else{
        $('#confirmStep4').text(`・${inputStep4}`);
      }
      
    }else if(form === "step5"){

      checkStepBlank();
      if(inputStep5 === ""){
        $('#confirmStep5').text("");
      }else{
        $('#confirmStep5').text(`・${inputStep5}`);
      }
      
    }else if(form === "step6"){

      checkStepBlank();
      if(inputStep6 === ""){
        $('#confirmStep6').text("");
      }else{
        $('#confirmStep6').text(`・${inputStep6}`);
      }
      
    }else if(form === "step7"){

      checkStepBlank();
      if(inputStep7 === ""){
        $('#confirmStep7').text("");
      }else{
        $('#confirmStep7').text(`・${inputStep7}`);
      }
      
    }else if(form === "step8"){

      checkStepBlank();
      if(inputStep8 === ""){
        $('#confirmStep8').text("");
      }else{
        $('#confirmStep8').text(`・${inputStep8}`);
      }
      
    }else if(form === "step9"){

      checkStepBlank();
      if(inputStep9 === ""){
        $('#confirmStep9').text("");
      }else{
        $('#confirmStep9').text(`・${inputStep9}`);
      }
      
    }else if(form === "step10"){

      checkStepBlank();
      if(inputStep10 === ""){
        $('#confirmStep10').text("");
      }else{
        $('#confirmStep10').text(`・${inputStep10}`);
      }
      
    }
  }

  // 理由の入力欄が全て未入力ではないかチェック
  function checkWhyBlank() {

    if(inputWhy1 === "" && inputWhy2 === "" && inputWhy3 === "" && inputWhy4 === "" && inputWhy5 === ""){

      $('#errorWhy').text("※理由が未入力です");

    }else{

      $('#errorWhy').text("");

    }

  }

  // ステップの入力欄が全て未入力ではないかチェック
  function checkStepBlank() {

    if(inputStep1 === "" && inputStep2 === "" && inputStep3 === "" && inputStep4 === "" && inputStep5 === ""
       && inputStep6 === "" && inputStep7 === "" && inputStep8 === "" && inputStep9 === "" && inputStep10 === ""){

      $('#errorStep').text("※ステップが未入力です");

    }else{

      $('#errorStep').text("");

    }

  }

});