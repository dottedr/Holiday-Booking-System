@extends('layouts.app')

@section('content')
<div >
    <side-menu></side-menu>

    <div class="container">
        <employee-edit id="{{$userid}}"></employee-edit>
    </div>
</div>

@endsection
