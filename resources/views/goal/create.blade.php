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
                <input class="create-form-input input-what" type="text" name="what" value="{{ old('what') }}" required autofocus placeholder="目標を入力してください">
            
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
            <h5>※なぜを書き出し、目標を深掘りしてみましょう</h5>
            <div class="form-why-index">
                <div>
                    @error('why')
                        <span role="alert">
                            <p class="form-error">{{ $message }}</p>
                        </span>
                    @enderror
                </div>
                <h5 class="small-label">なぜ達成したいですか？</h5>
                <input class="create-form-input" type="text" name="why" required placeholder="理由を入力してください">
                <h5 class="small-label">その他に理由はありますか</h5>
                <input class="create-form-input" type="text" name="why" placeholder="ある場合は入力してください">
                <h5 class="small-label">その他に理由はありますか</h5>
                <input class="create-form-input" type="text" name="why" placeholder="ある場合は入力してください">
                <h5 class="small-label">その他に理由はありますか</h5>
                <input class="create-form-input" type="text" name="why" placeholder="ある場合は入力してください">
                <h5 class="small-label">その他に理由はありますか</h5>
                <input class="create-form-input" type="text" name="why" placeholder="ある場合は入力してください">
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
            <p class="main-text-sub">その重要度は？また緊急度は？</p>
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

            <h4 id="howManyDays" class="mgt-2 how-many-days"></h4>
            
            <h4 class="mgt-2">目標までいくつのステップを設定しますか？</h4>
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
                
                <h4 id="stepDay1" class="small-label"></h4>
                <input class="create-form-input" type="text" name="step" required placeholder="１個目のステップを入力してください">

                <h4 id="stepDay2" class="small-label"></h4>
                <input id="step2" class="create-form-input display-none" type="text" name="step" placeholder="２個目のステップを入力してください">

                <h4 id="stepDay3" class="small-label"></h4>
                <input id="step3" class="create-form-input display-none" type="text" name="step" placeholder="３個目のステップを入力してください">

                <h4 id="stepDay4" class="small-label"></h4>
                <input id="step4" class="create-form-input display-none" type="text" name="step" placeholder="４個目のステップを入力してください">

                <h4 id="stepDay5" class="small-label"></h4>
                <input id="step5" class="create-form-input display-none" type="text" name="step" placeholder="５個目のステップを入力してください">

                <h4 id="stepDay6" class="small-label"></h4>
                <input id="step6" class="create-form-input display-none" type="text" name="step" placeholder="６個目のステップを入力してください">
                
                <h4 id="stepDay7" class="small-label"></h4>
                <input id="step7" class="create-form-input display-none" type="text" name="step" placeholder="７個目のステップを入力してください">
                
                <h4 id="stepDay8" class="small-label"></h4>
                <input id="step8" class="create-form-input display-none" type="text" name="step" placeholder="８個目のステップを入力してください">
                
                <h4 id="stepDay9" class="small-label"></h4>
                <input id="step9" class="create-form-input display-none" type="text" name="step" placeholder="９個目のステップを入力してください">
                
                <h4 id="stepDay10" class="small-label"></h4>
                <input id="step10" class="create-form-input display-none" type="text" name="step" placeholder="１０個目のステップを入力してください">
            
            </div>

            <div class="btn-bar">
                <button type="button" class="small-btn" id="prevBtn5">◁prev</button>
                <button type="button" class="small-btn" id="nextBtn5">next▷</button>
            </div>
        </div>
    </form>

</div>

@endsection