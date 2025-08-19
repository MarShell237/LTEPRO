@extends('layouts.app')
@section('content')
<style>
body.football-bg {
  background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%);
  min-height: 100vh;
  position: relative;
}

/* Ball animation */
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

/* Table */
.standings-table {
  background: rgba(17, 17, 17, 0.95);
  border-radius: 1rem;
  box-shadow: 0 4px 24px rgba(30,58,138,0.12);
  margin: 2rem auto;
  overflow-x: auto;
  width: 90%;
  max-width: 1000px;
}

.standings-table table {
  width: 100%;
  border-collapse: collapse;
}

.standings-table th {
  background: #2563eb;
  color: #fff;
  font-weight: bold;
  padding: 0.75rem;
  text-align: left;
  font-size: 1rem;
}

.standings-table td {
  padding: 0.5rem 0.75rem;
  border-bottom: 1px solid #e5e7eb;
  color: #fbfcfdff;
  font-size: 0.95rem;
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

/* Responsive */
@media(max-width: 1024px) {
  h1 {
    font-size: 2rem;
    margin-left: 0;
    text-align: center;
  }
  .team-logo {
    width: 28px;
    height: 28px;
  }
  .standings-table th, .standings-table td {
    font-size: 0.9rem;
    padding: 0.5rem;
  }
}

@media(max-width: 768px) {
  .standings-table {
    width: 95%;
  }
  .team-logo {
    width: 24px;
    height: 24px;
  }
  .standings-table th, .standings-table td {
    font-size: 0.85rem;
    padding: 0.4rem;
  }
}

@media(max-width: 480px) {
  h1 {
    font-size: 1.5rem;
  }
  .standings-table th, .standings-table td {
    font-size: 0.8rem;
    padding: 0.3rem 0.4rem;
  }
  .team-logo {
    width: 20px;
    height: 20px;
  }
}
</style>

<script>
document.body.classList.add('football-bg');
</script>

<div class="football-ball"></div>

<div class="container">
  <h1 style="color:#fff;text-shadow:2px 2px 8px #2563eb;font-weight:bold;margin-bottom:1.5rem;">Classement</h1>
  
  @if($standings && isset($standings['standings'][0]['table']))
    <div class="standings-table">
      <table>
        <thead>
          <tr>
            <th>N°</th>
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
    <p style="color:#fff;font-size:1.2rem;text-align:center;">Aucun classement disponible.</p>
  @endif
</div>
@endsection
