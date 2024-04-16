@extends('layouts.invoice.app')


@section('invoice_title')
    <span style="text-align: center;">League Registration Invoice</span>
@endsection


@section('content')
<!-- Start Content -->
<div>
    Hello <strong>{{ $player->user->first_name }}</strong>,
    <br>
    You have successfully registered on <a href="{{ route('administration.league.show', ['league' => $league]) }}"><strong>{{ $league->name }}</strong></a>. We are glad to know you that, you are now a part of this league. 
    <br>
    Your payment Information has been given below.
</div>
<br>
<table cellpadding="0" cellspacing="0" style="width: 100%; border: 1px solid #ededed;">
    <tbody>
        <tr>
            <td style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight: 500; color: rgba(0, 0, 0, 0.64);">
                Payment For:
            </td>
            <td style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                <strong>{{ $player->user->name }}</strong>
            </td>
        </tr>
        <tr>
            <td style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight: 500; color: rgba(0, 0, 0, 0.64);">
                League Name:
            </td>
            <td style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                <span>{{ $league->name }}</span>
            </td>
        </tr>
        <tr>
            <td style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight: 500; color: rgba(0, 0, 0, 0.64);">
                Total Paid:
            </td>
            <td style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                <strong class="text-info">${{ $payment->total_paid }}</strong>
            </td>
        </tr>
        <tr>
            <td style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight: 500; color: rgba(0, 0, 0, 0.64);">
                Transaction ID:
            </td>
            <td style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                <code>{{ $payment->transaction_id }}</code>
            </td>
        </tr>
        <tr>
            <td style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight: 500; color: rgba(0, 0, 0, 0.64);">
                Invoice No:
            </td>
            <td style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                <code>{{ $payment->invoice_number }}</code>
            </td>
        </tr>
        <tr>
            <td style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight: 500; color: rgba(0, 0, 0, 0.64);">
                Paid At:
            </td>
            <td style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                <span>{{ show_date_time($payment->created_at) }}</span>
            </td>
        </tr>
    </tbody>
</table>
<br>
<div>
    [<strong>Note: </strong> Please visit here for league details: <strong><a href="{{ route('administration.league.show', ['league' => $league]) }}" target="_blank">{{ $league->name }}</a></strong> ]
</div>
<!-- End Content -->
@endsection


