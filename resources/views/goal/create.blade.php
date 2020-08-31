@extends('layouts/app')

@section('title', 'Lozicalize Goals/What is your goal')

@section('script')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="{{ asset('/js/create-form.js') }}" defer></script>
    <script src="{{ asset('/js/day-calculation.js') }}" defer></script>
    
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
        <p class="mark-number" id="markNumber6">6</p>
    </div>
    
    <form class="goal-form" method="POST" action="{{ route('login') }}">
        @csrf
        <div id="whatForm" class="goal-form-each goal-form-each__first">
            <div class="main-text">What is your goal ?</div>
            <p class="main-text-sub">達成したい目標はなんですか？</p>
            <div>
                <input class="input-group input-what" type="text" name="what" value="{{ old('what') }}" required autofocus placeholder="目標を入力してください">
            
                <div>
                    @error('what')
                        <span role="alert">
                            <p class="form-error">{{ $message }}</p>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="btn-bar btn-bar__first">
                <button type="button" class="small-btn" id="nextBtn1">next▷</button>
            </div>
        </div>
        <div id="whyForm" class="goal-form-each goal-form-each__why">
            <div class="main-text">Why do you want to achieve that ?</div>
            <p class="main-text-sub">なぜそれを達成したいですか？</p>
            <h5>※なぜを繰り返し目標を深掘りしてみましょう</h5>
            <div class="form-why-index">
                <div>
                    @error('why')
                        <span role="alert">
                            <p class="form-error">{{ $message }}</p>
                        </span>
                    @enderror
                </div>
                <input class="input-group input-what" type="text" name="why" required placeholder="理由を入力してください">
                <input class="input-group input-what" type="text" name="why" placeholder="上の理由にさらに理由があれば入力してください">
                <input class="input-group input-what" type="text" name="why" placeholder="上の理由にさらに理由があれば入力してください">
                <input class="input-group input-what" type="text" name="why" placeholder="上の理由にさらに理由があれば入力してください">
                <input class="input-group input-what" type="text" name="why" placeholder="上の理由にさらに理由があれば入力してください">
            </div>
            <div class="btn-bar">
                <button type="button" class="small-btn" id="prevBtn2">◁prev</button>
                <button type="button" class="small-btn" id="nextBtn2">next▷</button>
            </div>
        </div>
        <div id="whenForm" class="goal-form-each">
            <div class="main-text">When do you want to achieve that ?</div>
            <p class="main-text-sub">それはいつまでに達成したいですか？</p>
            <div>
                <input id="inputWhen" class="input-group input-when" type="date" name="when" value="{{ old('when') }}" required>
            
                <div>
                    @error('when')
                        <span role="alert">
                            <p class="form-error">{{ $message }}</p>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="btn-bar">
                <button type="button" class="small-btn" id="prevBtn3">◁prev</button>
                <button type="button" class="small-btn" id="nextBtn3">next▷</button>
            </div>
        </div>
        <div id="howMuchForm" class="goal-form-each goal-form-each__how-much">
            <div class="main-text">How important? How urgent ?</div>
            <p class="main-text-sub">それらの重要度は？また緊急度は？</p>
            <h5>※1~10の数値で入力してください</h5>

                <input class="input-group input-how-much" type="number" min="1" max="10" step="1" name="how_important" value="{{ old('how_important') }}" required placeholder="重要度(1~10)">
                <div>
                    @error('how_important')
                        <span role="alert">
                            <p class="form-error">{{ $message }}</p>
                        </span>
                    @enderror
                </div>

                <input class="input-group input-how-much" type="number" min="1" max="10" step="1" name="how_urgent" value="{{ old('how_urgent') }}" required placeholder="緊急度(1~10)">
                <div>
                    @error('how_urgent')
                        <span role="alert">
                            <p class="form-error">{{ $message }}</p>
                        </span>
                    @enderror
                </div>

            <div class="btn-bar">
                <button type="button" class="small-btn" id="prevBtn4">◁prev</button>
                <button type="button" class="small-btn" id="nextBtn4">next▷</button>
            </div>
        </div>
        <div id="stepForm" class="goal-form-each goal-form-each__why">
            <div class="main-text">Lets subdivide the goal !</div>
            <p class="main-text-sub">小目標を立て細分化しましょう！</p>

            <h4 id="howManyDays" class="mgt-2"></h4>
            
            <h4 class="mgt-2">目標までいくつの小目標を準備しますか？</h4>
            <select id="howManySteps">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>

            <div class="form-why-index">
                <input class="input-group input-what" type="text" name="step" required placeholder="細分化した目標を入力してください">
                <input id="step2" class="input-group input-what display-none" type="text" name="step" placeholder="細分化した目標を入力してください">
                <input id="step3" class="input-group input-what display-none" type="text" name="step" placeholder="細分化した目標を入力してください">
                <input id="step4" class="input-group input-what display-none" type="text" name="step" placeholder="細分化した目標を入力してください">
                <input id="step5" class="input-group input-what display-none" type="text" name="step" placeholder="細分化した目標を入力してください">
                <input id="step6" class="input-group input-what display-none" type="text" name="step" placeholder="細分化した目標を入力してください">
                <input id="step7" class="input-group input-what display-none" type="text" name="step" placeholder="細分化した目標を入力してください">
                <input id="step8" class="input-group input-what display-none" type="text" name="step" placeholder="細分化した目標を入力してください">
                <input id="step9" class="input-group input-what display-none" type="text" name="step" placeholder="細分化した目標を入力してください">
                <input id="step10" class="input-group input-what display-none" type="text" name="step" placeholder="細分化した目標を入力してください">
            </div>

            <div class="btn-bar">
                <button type="button" class="small-btn" id="prevBtn5">◁prev</button>
                <button type="button" class="small-btn" id="nextBtn5">next▷</button>
            </div>
        </div>
    </form>

</div>

@endsection