@extends('layouts.email.app')


@section('email_title')
    <span style="text-align: center;">New Order</span>
@endsection


@section('content')
<!-- Start Content -->
<div>
    Hello {{ $admin->name }},
    <br>
    A new <a href="{{ route('administration.shop.order.show', ['order' => $data]) }}"><strong>Order</strong></a> has been arrived on <a href="{{ config('app.url') }}"><strong>{{ config('app.name') }}</strong></a>. Please process the order.
    <br>
    <br>
    Thank You.
</div>
<br>
<table cellpadding="0" cellspacing="0" style="width: 100%; border: 1px solid #ededed;">
    <tbody>
        <tr>
            <td style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight: 500; color: rgba(0, 0, 0, 0.64);">
                Order Details:
            </td>
            <td style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                <a href="{{ route('administration.shop.order.show', ['order' => $data]) }}">
                    <code>{{ route('administration.shop.order.show', ['order' => $data]) }}</code>
                </a>
            </td>
        </tr>
        <tr>
            <td style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight: 500; color: rgba(0, 0, 0, 0.64);">
                Order ID:
            </td>
            <td style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                <code>{{ $data->order_id }}</code>
            </td>
        </tr>
        <tr>
            <td style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight: 500; color: rgba(0, 0, 0, 0.64);">
                Transaction ID:
            </td>
            <td style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                <code>{{ $data->transaction_id }}</code>
            </td>
        </tr>
        <tr>
            <td style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight: 500; color: rgba(0, 0, 0, 0.64);">
                Invoice No:
            </td>
            <td style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                <code>{{ $data->invoice_number }}</code>
            </td>
        </tr>
        <tr>
            <td style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight: 500; color: rgba(0, 0, 0, 0.64);">
                Total Price:
            </td>
            <td style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                {{ $data->total_price }}
            </td>
        </tr>
    </tbody>
</table>
<!-- End Content -->
@endsection


