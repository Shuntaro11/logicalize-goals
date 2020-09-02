@extends('layouts/app')

@section('title', 'Lozicalize Goals/ 目標詳細')

@section('content')

@include("header")

<div class="main-container main-container__show">


  <div class="left-container">

    <div class="small-container small-container__show">
      <h3 class="middle-title">What</h3>
      <h3>{{ $goal->what }}</h3>
    </div>
    
    <div class="small-container small-container__show">
      <h3 class="middle-title">By when</h3>
      <h3>{{ $goal->when->format('Y / m / d') }}</h3>
    </div>

    <div class="small-container small-container__show">
      <h3 class="middle-title">How</h3>
      <div class="steps-index">
        @foreach($steps as $step)
          <h4>2020/12/02まで</h4>
          <h4 class="each-reason">
            {{ $step->step }}
            <button class="ok-btn"></button>
          </h4><br>
        @endforeach
      </div>
    </div>

  </div>


  <div class="right-container">

    <div class="chart-wrapper small-container"></div>

    <div class="small-container small-container__show">
      <h3 class="middle-title">Why</h3>
      <div class="reasons-index">
        @foreach($reasons as $reason)
          <h4>・{{ $reason->reason }}</h4><br>
        @endforeach
      </div>
    </div>

  </div>


</div>
@endsection