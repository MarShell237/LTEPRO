@extends('layouts.app')
@section('content')
<div class="container">
<h1>Statistiques du joueur</h1>
@if($stats && isset($stats['response'][0]))
    @php $player = $stats['response'][0]['player']; $statistics = $stats['response'][0]['statistics'][0] ?? []; @endphp
    <div class="bg-white rounded shadow p-4">
        <div class="font-semibold">{{ $player['name'] ?? '' }}</div>
        <div>Position : {{ $player['position'] ?? '' }}</div>
        <div>Matchs joués : {{ $statistics['games']['appearences'] ?? '' }}</div>
        <div>Buts : {{ $statistics['goals']['total'] ?? '' }}</div>
        <div>Passes décisives : {{ $statistics['goals']['assists'] ?? '' }}</div>
    </div>
@else
    <p>Aucune statistique disponible.</p>
@endif
@endsection
