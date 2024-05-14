@extends('layouts.email.app')


@section('email_title')
    <span style="text-align: center;">New Coach Request</span>
@endsection


@section('content')
<!-- Start Content -->
<div>
    Hello {{ $admin->name }},
    <br>
    A new <a href="{{ route('administration.coach.request.show', ['coach' => $data]) }}"><strong>Coach Request</strong></a> has been arrived on <a href="{{ config('app.url') }}"><strong>{{ config('app.name') }}</strong></a>. Please review the request.
    <br>
    <br>
    Thank You.
</div>
<!-- End Content -->
@endsection


