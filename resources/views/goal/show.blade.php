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
        @if($goal->achievement === 0)

            @for($i = 0; $i < $howManySteps; $i++)
              <h4>{{ $stepDays[$i] }}</h4>
              <h4 class="each-reason">
                {{ $steps[$i]->step }}
                <complete-step
                  :step-id="{{ json_encode($steps[$i]->id) }}"
                  :default-Completed="{{ json_encode($defaultCompleted[$i]) }}"
                ></complete-step>
              </h4><br>
            @endfor

        @else

            @for($i = 0; $i < $howManySteps; $i++)
              <h4>{{ $stepDays[$i] }}</h4>
              <h4 class="each-reason">
                {{ $steps[$i]->step }}
              </h4><br>
            @endfor

        @endif
      </div>
      @if($goal->achievement === 0)

        <a href="/">
          <button type="button" class="btn btn__achievement">
            Achievement
          </button>
        </a>

      @endif
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