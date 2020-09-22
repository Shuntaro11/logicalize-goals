@extends('layouts/app')

@section('title', 'Lozicalize Goals / 目標編集')

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
    <form action="{{ route('goals.update', ['goal' => $goal]) }}" class="goal-form" method="post" enctype="multipart/form-data">
      @method('PUT')
      @csrf

        <div id="whatForm" class="goal-form-each goal-form-each__first">
            <div class="main-text">Your goal</div>
            <p class="main-text-sub">達成したい目標</p>
            <div>
                <input id="inputWhat" class="create-form-input input-what" type="text" name="what" value="{{ $goal->what }}" required>
            
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
            <div class="main-text">Reason</div>
            <p class="main-text-sub">達成したい理由</p>
            <!-- <h5>※なぜを書き出し、目標を深掘りしてみましょう</h5> -->
            <div class="create-form-index">
                <div>
                    @error('why')
                        <span role="alert">
                            <p class="form-error">{{ $message }}</p>
                        </span>
                    @enderror
                </div>

                @for($i = 0; $i < 5; $i++)
                  <h5 class="small-label">理由{{ $i + 1 }}</h5>
                  @if(isset($reasons[$i]))
                    <textarea id="inputWhy{{ $i + 1 }}" class="create-form-input" name="why{{ $i + 1 }}" rows="2">{!! ($reasons[$i]->reason) !!}</textarea>
                  @else
                    <textarea id="inputWhy{{ $i + 1 }}" class="create-form-input" name="why{{ $i + 1 }}" rows="2"></textarea>
                  @endif
                @endfor

            </div>
            <div class="btn-bar">
                <button type="button" class="small-btn" id="prevBtn2">◁prev</button>
                <button type="button" class="small-btn" id="nextBtn2">next▷</button>
            </div>
        </div>


        <div id="whenForm" class="goal-form-each">
            <div class="main-text">Deadline</div>
            <p class="main-text-sub">達成日</p>
            <div>
                <input id="inputWhen" class="input-group input-when" type="date" name="when" min={{ $today }} value="{{ $goal->when->format('Y-m-d') }}" required>
            
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
            <div class="main-text">Step</div>
            <p class="main-text-sub">小目標</p>

            <h4 id="howManyDays" class="mgt-2 how-many-days"></h4>
            
            <h5 class="mgt-2">目標までの小目標の数を選択</h5>
            <select id="howManySteps">
                @if($howManySteps != 0)
                    <option value="{{ $howManySteps }}">{{ $howManySteps }}</option>
                @endif
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
                @for($i = 0; $i < 10; $i++)
                  <h5 id="stepDay{{ $i + 1 }}" class="small-label"></h5>
                  @if(isset($steps[$i]))
                    <textarea id="inputStep{{ $i + 1 }}" class="create-form-input" name="step{{ $i + 1 }}" rows="3">{!! ($steps[$i]->step) !!}</textarea>
                  @elseif($i === 0)
                    <textarea id="inputStep{{ $i + 1 }}" class="create-form-input" name="step{{ $i + 1 }}" rows="3"></textarea>
                  @else
                    <textarea id="inputStep{{ $i + 1 }}" class="create-form-input display-none" name="step{{ $i + 1 }}" rows="3" placeholder="{{ $i + 1 }}個目のステップを入力"></textarea>
                  @endif
                @endfor
            
            </div>

            <div class="btn-bar">
                <button type="button" class="small-btn" id="prevBtn4">◁prev</button>
                <button type="button" class="small-btn" id="nextBtn4">next▷</button>
            </div>
        </div>


        <div id="howMuchForm" class="goal-form-each goal-form-each__how-much">
            <div class="main-text">How important ・ How urgent</div>
            <p class="main-text-sub">重要度・緊急度</p>

                <h5 class="mgt-2">重要度</h5>
                <h6>※1~10の数値を選択</h6>
                <select id="selectImportant" name="how_important" >
                    <option value="{{ $goal->how_important }}">{{ $goal->how_important }}</option>
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
                <h6>※1~10の数値を選択</h6>
                <select id="selectUrgent" name="how_urgent">
                    <option value="{{ $goal->how_urgent }}">{{ $goal->how_urgent }}</option>
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
                    <h5 id="errorWhat" class="each-error"></h5>
                    <h5 id="errorWhy" class="each-error"></h5>
                    <h5 id="errorWhen" class="each-error"></h5>
                    <h5 id="errorStep" class="each-error"></h5>
                </div>

                <h4>＜目標＞</h4>
                <h4 id="confirmWhat">{{ $goal->what }}</h4>
                <br>

                <h4>＜理由＞</h4>
                @for($i = 0; $i < 5; $i++)
                  @if(isset($reasons[$i]))
                  <h4 id="confirmWhy{{ $i + 1 }}">{!! ($reasons[$i]->reason) !!}</h4>
                  @else
                  <h4 id="confirmWhy{{ $i + 1 }}"></h4>
                  @endif
                @endfor
                <br>

                <h4>＜期日＞</h4>
                <h4 id="confirmWhen">{{ $goal->when->format('Y / m / d') }}</h4>
                <br>

                <h4>＜ステップ＞</h4>
                @for($i = 0; $i < 10; $i++)
                  @if(isset($steps[$i]))
                    <h4 id="confirmStep{{ $i + 1 }}">{!! ($steps[$i]->step) !!}</h4>
                  @else
                    <h4 id="confirmStep{{ $i + 1 }}"></h4>
                  @endif
                @endfor
                <br>

                <h4>＜重要度＞</h4>
                <h4 id="confirmImportant">{{ $goal->how_important }}</h4>
                <br>

                <h4>＜緊急度＞</h4>
                <h4 id="confirmUrgent">{{ $goal->how_urgent }}</h4>

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