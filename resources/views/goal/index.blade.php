@extends('layouts/app')

@section('title', 'Lozicalize Goals/トップページ')

@section('content')

@include("header")
<div class="main-container">

  <a href="/goals/create">
    <button class="btn add-goal-btn" type="button">Add new goal</button>
  </a>

  <h4 >List of your goals</h4>

  <ul class="dropdwn">
      <li>並び替え <i class="fas fa-sort-down"></i>
          <ul class="dropdwn_menu">
              <li><a href="{{ route('goals.index', ['name' => 'inportance']) }}">重要度順</a></li>
              <li><a href="{{ route('goals.index', ['name' => 'urgent']) }}">緊急度順</a></li>
              <li><a href="{{ route('goals.index', ['name' => 'when']) }}">達成日順</a></li>
          </ul>
      </li>
  </ul>

  <div class="goal-index">

    @foreach($goals as $goal)
      <a href="{{ route('goals.show', $goal->id) }}" class="goal-link">{{ $goal->what }}</a>
    @endforeach
    
  </div>

</div>
@endsection