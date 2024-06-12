@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Lista di giocatori</h1>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Nome e cognome</th>
          <th scope="col">Genere</th>
          <th scope="col">Data di nascita</th>
          <th scope="col">Piede</th>
          <th scope="col">Punteggio</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($players as $player)
          <tr>
            <th scope="row">{{ $player->id }}</th>
            <td>{{ $player->name }}</td>
            <td>{{ $player->gender }}</td>
            <td>{{ $player->birthDate }}</td>
            <td>{{ $player->foot }}</td>
            <td>{{ $player->rating }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
