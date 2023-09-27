@extends('layouts.email.app')


@section('email_title')
    <span style="text-align: center;">Coach Request Rejected</span>
@endsection


@section('content')
<!-- Start Content -->
<div>
    Hello {{ $data->first_name }},
    <br>
    You have requested to become a Coach on <a href="{{ config('app.url') }}"><strong>{{ config('app.name') }}</strong></a>. We are very sorry to inform you that, your request has been rejected.
    <br>
    You can request again for further decision.
    <br>
    <br>
    Thank You.
</div>
<!-- End Content -->
@endsection


