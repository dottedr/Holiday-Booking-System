@extends('layouts.app')

@section('content')
<div >
    <side-menu></side-menu>

    <div class="container">
        <view-requests id="{{$hrequestid}}"></view-requests>

        <calendar></calendar>
        </div>
    </div>
</div>
@endsection
