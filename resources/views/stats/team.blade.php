@extends('layouts.app')
@section('content')
<div class="container">
<h1>Statistiques de l'équipe</h1>
@if($stats)
    <div class="bg-white rounded shadow p-4">
        <div class="font-semibold">{{ $stats['team']['name'] ?? '' }}</div>
        <div class="mt-2">Matchs joués : {{ $stats['fixtures']['played']['total'] ?? '' }}</div>
        <div>Victoires : {{ $stats['fixtures']['wins']['total'] ?? '' }}</div>
        <div>Défaites : {{ $stats['fixtures']['loses']['total'] ?? '' }}</div>
        <div>Buts marqués : {{ $stats['goals']['for']['total'] ?? '' }}</div>
        <div>Buts encaissés : {{ $stats['goals']['against']['total'] ?? '' }}</div>
    </div>
@else
    <p>Aucune statistique disponible.</p>
@endif
@endsection
