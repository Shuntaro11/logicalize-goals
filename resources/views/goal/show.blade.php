@extends('layouts/app')

@section('title', 'Lozicalize Goals / 目標詳細')

@section('script')
    
@endsection

@section('content')

@include("header")

<div class="main-container main-container__show">


  <div class="left-container">

    <div class="edit-bar">
      <a class="btn btn__goal-edit" href="{{ route('goals.edit', $goal->id) }}">Edit</a>
    </div>

    <div class="small-container small-container__show">
      <h3 class="middle-title">What</h3>
      <h3>{{ $goal->what }}</h3>
    </div>
    
    <div class="small-container small-container__show">

      <div class="by-when-container" >
        <div>
          <h5 class="middle-title">Start</h5>
          <h5 style="margin-bottom: 5px;">{{ $goal->created_at->format('Y / m / d') }}</h5>
        </div>
      <div>
        <h5 class="middle-title">Today</h5>
        <h5 style="margin-bottom: 10px;">{{ $today->format('Y / m / d') }}</h5>
      </div>

      </div>

      <h3 class="middle-title">By when</h3>
      <h3 style="margin-bottom: 5px;">{{ $goal->when->format('Y / m / d') }}</h3>
      <h4>残り {{ $leftDay }} 日</h4>

    </div>

    <div class="small-container small-container__show">
      <h3 class="middle-title">How</h3>
      <div class="steps-index">
        @if($goal->achievement === 0)
          <div id="app">
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
          </div>
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

        <a method="get" href="/goals/{{ $goal->id }}/achieve">
          <button type="button" class="btn btn__achievement">
            Achievement
          </button>
        </a>
      
      @else

        <div class="btn btn__achieved">
          Achieved!!
        </div>

      @endif
    </div>

  </div>


  <div class="right-container">

    <div class="how-much-container small-container">
        <div>
          <div class="how-much-number">{{ $goal->how_important }}</div>
          <h4>重要度</h4>
        </div>

        <div>
          <div class="how-much-number">{{ $goal->how_urgent }}</div>
          <h4>緊急度</h4>
        </div>
    </div>

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