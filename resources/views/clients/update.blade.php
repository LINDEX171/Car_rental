<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Modification Vehicule</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <style>
    /* Ajoutez vos styles CSS ici */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f7f6;
    }

    .container {
        max-width: 960px;
        margin: 0 auto;
        padding: 20px;
    }

    .form-title {
        text-align: center;
        margin-bottom: 20px;
    }

    .user-input-box {
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="date"],
    select,
    input[type="file"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image: url('data:image/svg+xml;utf8,<svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>');
        background-repeat: no-repeat;
        background-position-x: 95%;
        background-position-y: center;
    }

    .form-submit-btn {
        text-align: center;
    }

    .error-message {
        color: red;
        margin-bottom: 10px;
    }
  </style>
</head>
<body>
  @extends('layouts.auth')

  @section('content')
    <div class="container">

        <h1 class="form-title">Modification du client {{$client->nom}}</h1>

  <form id="awesomeForm" action="/updatestoreclient"  enctype="multipart/form-data"  method="post">
    @csrf

    @if ($errors->has('numero'))
    <div class="error-message">
        {{ $errors->first('numero') }}
    </div>
@endif

@if ($errors->has('email'))
<div class="error-message">
    {{ $errors->first('email') }}
</div>
@endif

@if ($errors->has('vehicule_id'))
<div class="error-message">
    {{ $errors->first('vehicule_id') }}
</div>
@endif

  <input type="text" name="id" style="display: none;" value="{{ $client->id }}">

  <div class="main-user-info">
    <div class="user-input-box">
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" placeholder="Entrez le Nom" value="{{ $client->nom }}"required/>
      </div>

      <div class="user-input-box">
        <label for="numero">Numéro de tel</label>
        <input type="text" id="numero" name="numero" placeholder="Entrez le numero" value="{{ $client->numero }}"required/>
      </div>


      <div class="user-input-box">
        <label for="email">E-mail</label>
        <input type="text" id="email" name="email" placeholder="Entrez l'email'" value="{{ $client->email }}"required/>
      </div>

      <div class="user-input-box">
        <label for="vehicule_id">modifier  la voiture</label>
        <select type="text" id="vehicule_id" name="vehicule_id" required>
        <option value="">Sélectionnez une voiture</option>
        @foreach($vehicules as $vehicule)
                <option value="{{ $vehicule->id }}">{{ $vehicule->matricule }} </option>
            @endforeach
    </select>
      </div>


      <div class="user-input-box">
        <label for="heure">modifier le Nombre d'heure pour la location:</label>
        <select type="text" id="heure" value="{{ $client->heure }}" name="heure" required>
            <option value="">Sélectionnez </option>
            <option value="5">5 heures</option>
            <option value="10">10 heures</option>
            <option value="15">15 heures</option>
            <option value="20">20 heures</option>
            <option value="24">24 heures</option>
        </select>
    </div>

    <div class="user-input-box">
        <label for="date">Rendez-vous</label>
        <input type="date" id="date" name="date" value="{{ $vehicule->date }}" required/>
      </div>

</div>
<div class="form-submit-btn">
  <input type="submit" value="enregistrer">
</div>
</form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection
</body>

</html>
