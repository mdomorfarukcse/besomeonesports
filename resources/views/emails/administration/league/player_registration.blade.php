@extends('layouts.email.app')


@section('email_title')
    <span style="text-align: center;">League Registration Confirmation</span>
@endsection


@section('content')
<!-- Start Content -->
<div>
    Hello <strong>{{ $player->user->name }}</strong>,
    <br>
    You have successfully registered for <a href="{{ route('administration.league.show', ['league' => $league]) }}"><strong>{{ $league->name }}</strong></a> on <a href="{{ config('app.url') }}"><strong>{{ config('app.name') }}</strong></a>.
    <br>
    Download your <a href="{{ route('administration.league.invoice.download', ['invoice_number' => $invoice_number]) }}"><strong>Invoice</strong></a>.
    <br>
    <br>
    Thank You.
</div>
<!-- End Content -->
@endsection


