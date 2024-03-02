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

    @extends('auth.dashboard')
    @section('content')
<div class="container">
    <h2> liste-chauffeur</h2>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Numero Permis</th>
                <th scope="col">Experience</th>
                <th scope="col">Date de validité</th>
                <th scope="col">Date d'expiration</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($chauffeur as $c)
                <tr>
                    <td> {{$c->nom }}</td>
                    <td> {{$c->permis }}</td>
                    <td>{{ $c->experience }}</td>
                    <td>{{ $c->validite }}</td>
                    <td>{{ $c->expiration }}</td>


                    <td>
                        <a href="/update-chauffeur/{{ $c->id }}" class="btn btn-info btn-sm">Modifier</a>
                        <a href="/delete-chauffeur/{{ $c->id }}" class="btn btn-danger btn-sm">Supprimer</a>
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
