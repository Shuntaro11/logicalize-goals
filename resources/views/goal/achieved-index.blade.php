@extends('layouts/app')

@section('title', 'Lozicalize Goals / 達成済み')

@section('content')

@include("header")
<div class="main-container">

  <a href="/goals/create">
    <button class="btn add-goal-btn" type="button">Add new goal</button>
  </a>

  <h1>Achieved goals</h1>

  <div class="goal-index">

    @if(count($goals) === 0)
      <p>まだ達成した目標はありません</p>
    @endif
    @foreach($goals as $goal)
      <a href="{{ route('goals.show', $goal->id) }}" class="goal-link">{{ $goal->what }}</a>
    @endforeach
    
  </div>

</div>
@endsection