@extends('layouts.app')
@section('content')
<style>
body.football-bg {
  background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%);
  min-height: 100vh;
  position: relative;
  overflow: hidden;
}
.football-ball {
  position: absolute;
  width: 60px;
  height: 60px;
  background: url('https://upload.wikimedia.org/wikipedia/commons/6/6e/Football_iu_1996.jpg') no-repeat center/cover;
  border-radius: 50%;
  animation: ball-move 8s linear infinite;
  opacity: 0.15;
}
@keyframes ball-move {
  0% { left: -80px; top: 10vh; }
  25% { left: 30vw; top: 30vh; }
  50% { left: 60vw; top: 60vh; }
  75% { left: 90vw; top: 20vh; }
  100% { left: -80px; top: 10vh; }
}
.standings-table {
  background: rgba(255,255,255,0.95);
  border-radius: 1rem;
  box-shadow: 0 4px 24px rgba(30,58,138,0.12);
  margin-top: 2rem;
  overflow: hidden;
}
.standings-table th {
  background: #2563eb;
  color: #fff;
  font-weight: bold;
  padding: 1rem;
}
.standings-table td {
  padding: 0.75rem;
  border-bottom: 1px solid #e5e7eb;
}
.standings-table tr:last-child td {
  border-bottom: none;
}
.team-logo {
  width: 32px;
  height: 32px;
  margin-right: 8px;
  vertical-align: middle;
}
</style>
<script>
document.body.classList.add('football-bg');
</script>
<div class="football-ball"></div>
<div class="container">
<h1 style="color:#fff;text-shadow:2px 2px 8px #2563eb;font-size:2.5rem;font-weight:bold;margin-bottom:1.5rem;">Classement</h1>
@if($standings && isset($standings['standings'][0]['table']))
    <div class="overflow-x-auto standings-table">
        <table class="min-w-full">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Équipe</th>
                    <th>MJ</th>
                    <th>G</th>
                    <th>N</th>
                    <th>P</th>
                    <th>Pts</th>
                </tr>
            </thead>
            <tbody>
                @foreach($standings['standings'][0]['table'] as $row)
                    <tr>
                        <td>{{ $row['position'] }}</td>
                        <td>
                            @if(isset($row['team']['crest']))
                                <img src="{{ $row['team']['crest'] }}" class="team-logo">
                            @endif
                            {{ $row['team']['name'] }}
                        </td>
                        <td>{{ $row['playedGames'] }}</td>
                        <td>{{ $row['won'] }}</td>
                        <td>{{ $row['draw'] }}</td>
                        <td>{{ $row['lost'] }}</td>
                        <td style="font-weight:bold;color:#2563eb;">{{ $row['points'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <p style="color:#fff;font-size:1.2rem;">Aucun classement disponible.</p>
@endif
@endsection
