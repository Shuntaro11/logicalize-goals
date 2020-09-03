@extends('layouts/app')

@section('title', 'Lozicalize Goals/ 目標詳細')

@section('script')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
    
@endsection

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

    <div class="chart-wrapper small-container">
      <canvas id="important-chart">
        <script>
            var w = $('.chart-wrapper').width();
            var h = $('.chart-wrapper').height();
            $('#important-chart').attr('width', w);
            $('#important-chart').attr('height', h);

            const importance = @json($goal->how_important);
            const urgency = @json($goal->how_urgent);

            var ctx = document.getElementById("important-chart");
            var myBar = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['重要度','緊急度'],
                    datasets: [{
                        data: [importance, urgency],
                        backgroundColor: ['#9c2020b0', '#9c2020b0']
                    }]
                },
                options: {
                    responsive: true,
                    legend: {
                        display: false
                  },
                    title: {
                        display: false,
                    },
                    scales: {
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                              display: false,
                            },
                            ticks: {
                                min: 0,
                                max: 10,
                                fontSize: 12,
                                stepSize: 1
                            },
                        }],
                        xAxes: [{
                            display: true,
                            barPercentage: 1,
                            categoryPercentage: 0.3,
                            scaleLabel: {
                              display: false,
                            },
                            ticks: {
                                fontSize: 12
                            },
                        }],
                    },
                }
            });
        </script>
      </canvas>
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