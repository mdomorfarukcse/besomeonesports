@extends('layouts.email.app')


@section('email_title')
    <span style="text-align: center;">New Players On {{ $data->name }}</span>
@endsection


@section('content')
<!-- Start Content -->
<div>
    Hello {{ $data->coach->user->name }},
    <br>
    There is new Player(s) has been assigned to Your Team (<a href="{{ route('administration.team.show', ['team' => $data]) }}"><strong>{{ $data->name }}</strong></a>) for the League: <a href="{{ route('administration.league.show', ['league' => $data->league]) }}"><strong>{{ $data->league->name }}</strong></a>. The Player(s) Information has been given below.
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
        <tr>
            <td style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight: 500; color: rgba(0, 0, 0, 0.64);">
                Players:
            </td>
            <td style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                <ol>
                    @foreach ($players as $playerID)
                        @php
                            $player = \App\Models\Player\Player::findOrfail($playerID);
                        @endphp
                        <li>
                            <a href="{{ route('administration.player.show', ['player' => $player]) }}">
                                <strong>{{ $player->user->name }}</strong>
                            </a>
                        </li>
                    @endforeach
                </ol>
            </td>
        </tr>
    </tbody>
</table>
<!-- End Content -->
@endsection


