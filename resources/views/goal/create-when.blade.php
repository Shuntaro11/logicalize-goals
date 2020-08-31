@extends('layouts/app')

@section('title', 'Lozicalize Goals/What is your goal')

@section('content')

<div class="top-container">

    @include("header")
    
    <form class="goal-form" method="POST" action="{{ route('login') }}">
        @csrf
        
    </form>

</div>
@endsection