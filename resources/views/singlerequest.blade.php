@extends('layouts.app')

@section('content')
<div >
    <side-menu></side-menu>

    <div class="container">
        <single-request id="{{$hrequestid}}"></single-request>

        <calendar></calendar>
        </div>
    </div>
</div>
@endsection
