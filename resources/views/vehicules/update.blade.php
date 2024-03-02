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

        <h1 class="form-title">Modification du vehicule {{$vehicule->matricule}}</h1>

  <form id="awesomeForm" action="/updatestorevehicule"  enctype="multipart/form-data"  method="post">
    @csrf

    @if ($errors->has('matricule'))
    <div class="error-message">
        {{ $errors->first('matricule') }}
    </div>
@endif

@if ($errors->has('chauffeur_id'))
<div class="error-message">
    {{ $errors->first('chauffeur_id') }}
</div>
@endif

  <input type="text" name="id" style="display: none;" value="{{ $vehicule->id }}">

  <div class="main-user-info">
    <div class="user-input-box">
        <label for="marque">Marque</label>
        <input type="text" id="marque" name="marque" placeholder="Entrez la marque" value="{{ $vehicule->marque }}"required/>
      </div>
  <div class="user-input-box">
    <label for="photoVehicule">Photo Véhicule</label>
    <input type="file" id="photo" name="photo" accept="image/*" value="{{ $vehicule->photo }}"required>
  </div>
  <div class="user-input-box">
    <label for="date">Date d'achat</label>
    <input type="date" id="date" name="date" value="{{ $vehicule->date }}" required/>
  </div>
  <div class="user-input-box">
    <label for="kilometre">Kilométrage</label>
    <input type="text" id="kilometre" name="kilometre" placeholder="Entrez le kilométrage" value="{{ $vehicule->kilometre }}"required/>
  </div>
  <div class="user-input-box">
    <label for="matricule">Matricule</label>
    <input type="text" id="matricule" name="matricule" placeholder="Entrez le matricule" value="{{ $vehicule->matricule }}" required/>
  </div>
  <div class="user-input-box">
    <label for="chauffeur_id">Choisir le chauffeur de la voiture</label>
    <select type="text" id="chauffeur_id" name="chauffeur_id" required>
    <option value="">Sélectionnez un chauffeur</option>
    @foreach($chauffeurs as $chauffeur)
            <option value="{{ $chauffeur->id }}">{{ $chauffeur->nom }} </option>
        @endforeach
</select>
  </div>
  <div class="user-input-box">
    <label for="etat">État</label>
    <select id="etat" name="etat" value="{{ $vehicule->etat }}"required>
      <option value="disponible">Disponible</option>
      <option value="indisponible">Indisponible</option>
    </select>
  </div>

  <div class="user-input-box">
    <label for="prix">Prix de la location</label>
    <input type="text" id="prix" name="prix" placeholder="Entrez le prix" value="{{ $vehicule->prix }}" required/>
  </div>
  <div class="user-input-box">
    <label for="place">Nombre de place</label>
    <input type="text" id="place" name="place" placeholder="Entrez le nombre de place du vehicule" value="{{ $vehicule->place }}" required/>
  </div>
</div>
<div class="form-submit-btn">
  <input type="submit" value="modifier">
</div>
</form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection
</body>

</html>
