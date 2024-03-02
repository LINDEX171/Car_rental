<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Vehicule</title>
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
      <h1 class="form-title">Chauffeur</h1>
      <form action="{{ Route('enregistrerChauffeur') }}" enctype="multipart/form-data" method="post">
        @csrf

        @if ($errors->has('permis'))
    <div class="error-message">
        {{ $errors->first('permis') }}
    </div>
@endif


        <div class="main-user-info">
            <div class="user-input-box">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" placeholder="Entrez le nom" required/>
              </div>
              <div class="user-input-box">
                <label for="permis">Numéro du Permis</label>
                <input type="text" id="permis" name="permis" placeholder="Entrez le numéro du permis" required/>
              </div>

          <div class="user-input-box">
            <label for="experience">Expérience</label>
            <input type="text" id="experience" name="experience" required/>
          </div>
          <div class="user-input-box">
            <label for="validite">Date de validité</label>
            <input type="date" id="validite" name="validite" placeholder="Entrez la date de validité" required/>
          </div>
          <div class="user-input-box">
            <label for="expiration">Date d'expiration</label>
            <input type="date" id="expiration" name="expiration" placeholder="Entrez la date d'expiration" required/>
          </div>


        </div>
        <div class="form-submit-btn">
          <input type="submit" value="enregistrer">
        </div>
      </form>
    </div>
    @endsection
  </body>
</html>
