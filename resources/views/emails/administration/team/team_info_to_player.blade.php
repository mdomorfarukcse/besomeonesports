@extends('layouts.email.app')


@section('email_title')
    <span style="text-align: center;">Team Information</span>
@endsection


@section('content')
<!-- Start Content -->
<div>
    Hello {{ $player->user->name }},
    <br>
    You have been assigned in a New Team called <a href="{{ route('administration.team.show', ['team' => $data]) }}"><strong>{{ $data->name }}</strong></a> for the League: <a href="{{ route('administration.league.show', ['league' => $data->league]) }}"><strong>{{ $data->league->name }}</strong></a>. Your team Information has been given below.
</div>
<br>
<table cellpadding="0" cellspacing="0" style="width: 100%; border: 1px solid #ededed;">
    <tbody>
        <tr>
            <td style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight: 500; color: rgba(0, 0, 0, 0.64);">
                Team Name:
            </td>
            <td style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                <a href="{{ route('administration.team.show', ['team' => $data]) }}">
                    <strong>{{ $data->name }}</strong>
                </a>
            </td>
        </tr>
        <tr>
            <td style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight: 500; color: rgba(0, 0, 0, 0.64);">
                League:
            </td>
            <td style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                <a href="{{ route('administration.league.show', ['league' => $data->league]) }}">
                    <strong>{{ $data->league->name }}</strong>
                </a>
            </td>
        </tr>
    </tbody>
</table>
<!-- End Content -->
@endsection


