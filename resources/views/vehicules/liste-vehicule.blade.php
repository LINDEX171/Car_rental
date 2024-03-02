<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des véhicules</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #141515; /* Couleur de fond */
        }

        .container {
            margin-top: 50px;
        }

        h2 {
            color: #181b19; /* Couleur du texte */
            text-align: center;
            font-size: 2.5em;
            margin-bottom: 20px;
            text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.5); /* Ombre du texte */
        }

        .table {
            background-color: #3d3a3a; /* Couleur de fond de la table */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Ombre de la table */
            border-radius: 10px;
        }

        .table th, .table td {
            text-align: center;
            color: #101111;
            background-color: #f7f2f3;
        }

        .table tbody tr {
            background-color: white; /* Couleur de fond des lignes */
        }

        .btn {
            transition: transform 0.3s ease-in-out; /* Animation de déplacement */
        }

        .btn:hover {
            transform: scale(1.1); /* Agrandissement au survol */
        }

        .thead-dark {
            background-color: #f7f9fb; /* Couleur de fond de l'en-tête */
            color: #fff; /* Couleur du texte de l'en-tête */
        }
    </style>
</head>
<body>

@extends('layouts.auth')

@section('content')
<div class="container">
    <h2>Liste des véhicules</h2>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Marque</th>
                <th scope="col">Photo Véhicule</th>
                <th scope="col">Date</th>
                <th scope="col">Kilométrage</th>
                <th scope="col">Matricule</th>
                <th scope="col">Chauffeur</th>
                <th scope="col">État</th>
                <th scope="col">Prix location</th>
                <th scope="col">Nombre de place</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vehicule as $v)
            <tr>
                <td>{{ $v->marque }}</td>
                <td><img src="{{ asset('uploads/vehicules/' . $v->photo) }}" alt="Photo du véhicule" height="100" width="100"></td>
                <td>{{ $v->date }}</td>
                <td>{{ $v->kilometre }}</td>
                <td>{{ $v->matricule }}</td>
                <td>{{ $v->chauffeur->nom }}</td>
                <td>{{ $v->etat }}</td>
                <td>{{ $v->prix }}</td>
                <td>{{ $v->place }}</td>
                <td>
                    <a href="/update-vehicule/{{ $v->id }}" class="btn btn-info btn-sm">Modifier</a>
                    <a href="/delete-vehicule/{{ $v->id }}" class="btn btn-danger btn-sm">Supprimer</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
</body>
</html>
