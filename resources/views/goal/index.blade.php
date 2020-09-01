@extends('layouts/app')

@section('title', 'Lozicalize Goals/トップページ')

@section('content')

<div class="top-container">

  @include("header")
  <a href="/goals/create">
    <button class="btn add-goal-btn" type="button">Add new goal</button>
  </a>

  <h4 >List of your goals</h4>

  <div class="goal-index">

    @foreach($goals as $goal)
      <a href="/goals/create/{{ $goal->id }}" class="goal-link">{{ $goal->what }}</a>
    @endforeach
    
  </div>

</div>
@endsection