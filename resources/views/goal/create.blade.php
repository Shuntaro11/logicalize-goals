@extends('layouts/app')

@section('title', 'Lozicalize Goals/What is your goal')

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="{{ asset('/js/create-form.js') }}" defer></script>
@endsection

@section('content')

<div class="create-container">

    @include("header")

    <div class="number-vav-bar">
        <p class="mark-number mark-number__first" id="markNumber1">1</p>
        <p class="mark-number" id="markNumber2">2</p>
        <p class="mark-number" id="markNumber3">3</p>
        <p class="mark-number" id="markNumber4">4</p>
        <p class="mark-number" id="markNumber5">5</p>
    </div>
    
    <form class="goal-form" method="POST" action="{{ route('login') }}">
        @csrf
        <div id="whatForm" class="goal-form-each goal-form-each__first">
            <div class="main-text">What is your goal??</div>
            <p class="main-text-sub">目標はなんですか？</p>
            <div>
                <input class="input-group input-what" type="text" name="what" value="{{ old('what') }}" required autocomplete="what" autofocus placeholder="達成したい目標を入力してください">
            
                <div>
                    @error('what')
                        <span role="alert">
                            <p class="form-error">{{ $message }}</p>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="btn-bar btn-bar__first">
                <button type="button" class="small-btn" id="nextBtn1">next</button>
            </div>
        </div>
        <div id="whenForm" class="goal-form-each">
            <div class="main-text">When do you want to achieve that??</div>
            <p class="main-text-sub">それはいつまでに達成したいですか？</p>
            <div>
                <input class="input-group input-when" type="date" name="when" value="{{ old('when') }}" required autocomplete="when">
            
                <div>
                    @error('when')
                        <span role="alert">
                            <p class="form-error">{{ $message }}</p>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="btn-bar">
                <button type="button" class="small-btn" id="prevBtn2">prev</button>
                <button type="button" class="small-btn" id="nextBtn2">next</button>
            </div>
        </div>
        <div id="whyForm" class="goal-form-each goal-form-each__why">
            <div class="main-text">Why do you want to achieve that??</div>
            <p class="main-text-sub">なぜそれを達成したいですか？</p>
            <div class="form-why-index">
                <div>
                    @error('why')
                        <span role="alert">
                            <p class="form-error">{{ $message }}</p>
                        </span>
                    @enderror
                </div>
                <input class="input-group input-what" type="text" name="why" value="{{ old('why') }}" required autocomplete="why" placeholder="達成したい理由は？">
                <input class="input-group input-what" type="text" name="why" value="{{ old('why') }}" required autocomplete="why">
                <input class="input-group input-what" type="text" name="why" value="{{ old('why') }}" required autocomplete="why">
                <input class="input-group input-what" type="text" name="why" value="{{ old('why') }}" required autocomplete="why">
                <input class="input-group input-what" type="text" name="why" value="{{ old('why') }}" required autocomplete="why">
            </div>
            <div class="btn-bar">
                <button type="button" class="small-btn" id="prevBtn3">prev</button>
                <button type="button" class="small-btn" id="nextBtn3">next</button>
            </div>
        </div>
        <div id="howMuchForm" class="goal-form-each goal-form-each__how-much">
            <div class="main-text">How important?? How urgent??</div>
            <p class="main-text-sub">それらの重要度は？また緊急度は？</p>

                <input class="input-group input-how-much" type="number" name="how_important" value="{{ old('how_important') }}" required autocomplete="how_important" placeholder="重要度(1~100)">
                <div>
                    @error('how_important')
                        <span role="alert">
                            <p class="form-error">{{ $message }}</p>
                        </span>
                    @enderror
                </div>

                <input class="input-group input-how-much" type="number" name="how_urgent" value="{{ old('how_urgent') }}" required autocomplete="how_urgent" placeholder="緊急度(1~100)">
                <div>
                    @error('how_urgent')
                        <span role="alert">
                            <p class="form-error">{{ $message }}</p>
                        </span>
                    @enderror
                </div>

            <div class="btn-bar">
                <button type="button" class="small-btn" id="prevBtn4">prev</button>
                <button type="button" class="small-btn" id="nextBtn4">next</button>
            </div>
        </div>
    </form>

</div>

@endsection