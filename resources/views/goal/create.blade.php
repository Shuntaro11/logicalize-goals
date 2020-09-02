@extends('layouts/app')

@section('title', 'Lozicalize Goals/ 目標登録')

@section('script')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="{{ asset('/js/display-each-form.js') }}" defer></script>
    <script src="{{ asset('/js/display-form-details.js') }}" defer></script>
    
@endsection

@section('content')

@include("header")
<div class="create-container">

    <div class="number-vav-bar">
        <p class="mark-number mark-number__first" id="markNumber1">1</p>
        <p class="mark-number" id="markNumber2">2</p>
        <p class="mark-number" id="markNumber3">3</p>
        <p class="mark-number" id="markNumber4">4</p>
        <p class="mark-number" id="markNumber5">5</p>
        <p class="mark-number" id="markNumber6">6</p>
    </div>
    
    <form class="goal-form" action="/goals" method="post" enctype="multipart/form-data">
        @csrf


        <div id="whatForm" class="goal-form-each goal-form-each__first">
            <div class="main-text">What is your goal ?</div>
            <p class="main-text-sub">達成したい目標はなんですか？</p>
            <div>
                <input id="inputWhat" class="create-form-input input-what" type="text" name="what" value="{{ old('what') }}" required autofocus placeholder="目標を入力してください">
            
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
            <div class="create-form-index">
                <div>
                    @error('why')
                        <span role="alert">
                            <p class="form-error">{{ $message }}</p>
                        </span>
                    @enderror
                </div>
                <h5 class="small-label">なぜ達成したいですか？</h5>
                <textarea id="inputWhy1" class="create-form-input" name="why1" rows="2" placeholder="理由を入力してください"></textarea>
                <h5 class="small-label">その他に理由はありますか？</h5>
                <textarea id="inputWhy2" class="create-form-input" name="why2" rows="2" placeholder="ある場合は入力してください"></textarea>
                <h5 class="small-label">その他に理由はありますか？</h5>
                <textarea id="inputWhy3" class="create-form-input" name="why3" rows="2" placeholder="ある場合は入力してください"></textarea>
                <h5 class="small-label">その他に理由はありますか？</h5>
                <textarea id="inputWhy4" class="create-form-input" name="why4" rows="2" placeholder="ある場合は入力してください"></textarea>
                <h5 class="small-label">その他に理由はありますか？</h5>
                <textarea id="inputWhy5" class="create-form-input" name="why5" rows="2" placeholder="ある場合は入力してください"></textarea>
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
                <input id="inputWhen" class="input-group input-when" type="date" name="when" min={{ $today }} value="{{ old('when') }}" required>
            
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


        <div id="stepForm" class="goal-form-each goal-form-each__why">
            <div class="main-text">Lets subdivide the goal !</div>
            <p class="main-text-sub">小目標を立て細分化しましょう！</p>

            <h4 id="howManyDays" class="mgt-2 how-many-days"></h4>
            
            <h5 class="mgt-2">目標までいくつのステップを設定しますか？</h5>
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

            <div class="create-form-index">

                <h5 class="mgt-2">※未入力のステップは反映されません</h5>
                <h5 id="stepDay1" class="small-label"></h5>
                <textarea id="inputStep1" class="create-form-input" name="step1" rows="3" placeholder="１個目のステップを入力してください"></textarea>

                <h5 id="stepDay2" class="small-label"></h5>
                <textarea id="inputStep2" class="create-form-input display-none" name="step2" rows="3" placeholder="２個目のステップを入力してください"></textarea>

                <h5 id="stepDay3" class="small-label"></h5>
                <textarea id="inputStep3" class="create-form-input display-none" name="step3" rows="3" placeholder="３個目のステップを入力してください"></textarea>

                <h5 id="stepDay4" class="small-label"></h5>
                <textarea id="inputStep4" class="create-form-input display-none" name="step4" rows="3" placeholder="４個目のステップを入力してください"></textarea>

                <h5 id="stepDay5" class="small-label"></h5>
                <textarea id="inputStep5" class="create-form-input display-none" name="step5" rows="3" placeholder="５個目のステップを入力してください"></textarea>

                <h5 id="stepDay6" class="small-label"></h5>
                <textarea id="inputStep6" class="create-form-input display-none" name="step6" rows="3" placeholder="６個目のステップを入力してください"></textarea>
                
                <h5 id="stepDay7" class="small-label"></h5>
                <textarea id="inputStep7" class="create-form-input display-none" name="step7" rows="3" placeholder="７個目のステップを入力してください"></textarea>
                
                <h5 id="stepDay8" class="small-label"></h5>
                <textarea id="inputStep8" class="create-form-input display-none" name="step8" rows="3" placeholder="８個目のステップを入力してください"></textarea>
                
                <h5 id="stepDay9" class="small-label"></h5>
                <textarea id="inputStep9" class="create-form-input display-none" name="step9" rows="3" placeholder="９個目のステップを入力してください"></textarea>
                
                <h5 id="stepDay10" class="small-label"></h5>
                <textarea id="inputStep10" class="create-form-input display-none" name="step10" rows="3" placeholder="１０個目のステップを入力してください"></textarea>
            
            </div>

            <div class="btn-bar">
                <button type="button" class="small-btn" id="prevBtn4">◁prev</button>
                <button type="button" class="small-btn" id="nextBtn4">next▷</button>
            </div>
        </div>


        <div id="howMuchForm" class="goal-form-each goal-form-each__how-much">
            <div class="main-text">How important ? How urgent ?</div>
            <p class="main-text-sub">その重要度は？また緊急度は？</p>

                <h5 class="mgt-2">重要度</h5>
                <h6>※1~10の数値を選択してください</h6>
                <select id="selectImportant" name="how_important" >
                    <option value="1">1 あまり重要でない</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10 とても重要</option>
                </select>
                <div>
                    @error('how_important')
                        <span role="alert">
                            <p class="form-error">{{ $message }}</p>
                        </span>
                    @enderror
                </div>

                <h5 class="mgt-2">緊急度</h5>
                <h6>※1~10の数値を選択してください</h6>
                <select id="selectUrgent" name="how_urgent" >
                    <option value="1">1 緊急でない</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10 とても緊急</option>
                </select>
                <div>
                    @error('how_urgent')
                        <span role="alert">
                            <p class="form-error">{{ $message }}</p>
                        </span>
                    @enderror
                </div>

            <div class="btn-bar">
                <button type="button" class="small-btn" id="prevBtn5">◁prev</button>
                <button type="button" class="small-btn" id="nextBtn5">next▷</button>
            </div>
        </div>

        
        <div id="confirmForm" class="goal-form-each goal-form-each__why">

            <div class="main-text">Confirm your goal</div>

            <div class="create-form-index create-form-index__confirm">

                <div class="errors-index">
                    <h5 id="errorWhat" class="each-error">※目標が未入力です</h5>
                    <h5 id="errorWhy" class="each-error">※理由が未入力です</h5>
                    <h5 id="errorWhen" class="each-error">※期日が選択されていません</h5>
                    <h5 id="errorStep" class="each-error">※ステップ１が未入力です</h5>
                </div>

                <h4>＜目標＞</h4>
                <h4 id="confirmWhat"></h4>
                <br>

                <h4>＜理由＞</h4>
                <h4 id="confirmWhy1"></h4>
                <h4 id="confirmWhy2"></h4>
                <h4 id="confirmWhy3"></h4>
                <h4 id="confirmWhy4"></h4>
                <h4 id="confirmWhy5"></h4>
                <br>

                <h4>＜期日＞</h4>
                <h4 id="confirmWhen"></h4>
                <br>

                <h4>＜ステップ＞</h4>
                <h4 id="confirmStep1"></h4>
                <h4 id="confirmStep2"></h4>
                <h4 id="confirmStep3"></h4>
                <h4 id="confirmStep4"></h4>
                <h4 id="confirmStep5"></h4>
                <h4 id="confirmStep6"></h4>
                <h4 id="confirmStep7"></h4>
                <h4 id="confirmStep8"></h4>
                <h4 id="confirmStep9"></h4>
                <h4 id="confirmStep10"></h4>
                <br>

                <h4>＜重要度＞</h4>
                <h4 id="confirmImportant">１</h4>
                <br>

                <h4>＜緊急度＞</h4>
                <h4 id="confirmUrgent">１</h4>

                <h5 class="mgt-2 submit-message">入力が完了したら右下の送信ボタンを押して登録を完了してください。</h5>
            
            </div>

            <div class="btn-bar">
                <button type="button" class="small-btn" id="prevBtn6">◁prev</button>
                <button type="submit" class="small-btn small-btn__submit">Submit</button>
            </div>

        </div>
    </form>

</div>

@endsection