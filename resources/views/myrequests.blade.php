@extends('layouts.app')

@section('content')
<div >
    <side-menu></side-menu>

    <div class="container">
        <my-requests id="{{$hrequestid}}"></my-requests>

        <calendar></calendar>
        </div>
    </div>
</div>
@endsection
