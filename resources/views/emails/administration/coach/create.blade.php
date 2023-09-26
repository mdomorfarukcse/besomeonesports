@extends('layouts.email.app')


@section('email_title')
    <span style="text-align: center;">Login Credential</span>
@endsection


@section('content')
<!-- Start Content -->
<div>
    Hello {{ $data->first_name }},
    <br>
    You have been assigned as a Coach in <a href="{{ config('app.url') }}"><strong>{{ config('app.name') }}</strong></a>. Your login credential has been given below.
</div>
<br>
<table cellpadding="0" cellspacing="0" style="width: 100%; border: 1px solid #ededed;">
    <tbody>
        <tr>
            <td style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight: 500; color: rgba(0, 0, 0, 0.64);">
                Login Email:
            </td>
            <td style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                <code>{{ $data->email }}</code>
            </td>
        </tr>
        <tr>
            <td style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight: 500; color: rgba(0, 0, 0, 0.64);">
                Password:
            </td>
            <td style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                <code>{{ $data->password }}</code>
            </td>
        </tr>
    </tbody>
</table>
<!-- End Content -->
@endsection


