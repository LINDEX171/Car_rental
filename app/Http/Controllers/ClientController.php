<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Vehicule;
use App\Models\Chauffeur;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
    public function index()
    {
        $vehicules = Vehicule::all();
        return view("clients.client", compact('vehicules'));
    }

    public function index2()
    {
        $vehicule = Vehicule::all();
        $client = Client::all();
        return view("clients.payement", compact('client', 'vehicules'));
    }


    public function liste()
    {
        $client = Client::all();
        $vehicule = Vehicule::all();
        $totalChauffeurs = $this->nombreChauffeurs();
        $totalVehicules = $this->nombreVehicules();
        $totalClients = $this->nombreClients();
        $chauffeur = Chauffeur::all();
      return view("clients.liste-client",  compact('chauffeur', 'client','vehicule', 'totalChauffeurs', 'totalClients', 'totalVehicules'));
    }

    public function nombreChauffeurs()
    {
        $totalChauffeurs = Chauffeur::count();
        return $totalChauffeurs;
    }

    public function nombreVehicules()
    {
        $totalVehicules = Vehicule::count();
        return $totalVehicules;
    }

    public function nombreClients()
    {
        $totalClients = Client::count();
        return $totalClients;
    }

    public function auth()
    {
        $client = Client::all();
        $vehicule = Vehicule::all();
        $chauffeurs = Chauffeur::all();
        $totalChauffeurs = $this->nombreChauffeurs();
        $totalVehicules = $this->nombreVehicules();
        $totalClients = $this->nombreClients();
        return view("auth.dashboard", compact('chauffeurs', 'client','vehicule', 'totalChauffeurs', 'totalClients', 'totalVehicules'));
    }


    public function store(Request $request)
    {
        $vehicules = Vehicule::all();
        $client = Client::all();
        // Messages d'erreur personnalisés
        $messages = [
            'numero.unique' => 'Le numero de telephone existe déjà.',
            'email.unique' => 'email existe déjà.',
            'vehicule_id.unique' => ' voiture non disponible.',
        ];

        // Validation des données du formulaire
        $request->validate([
            'nom' => 'required',
            'numero' => [
                'required',
                Rule::unique('clients')->where(function ($query) use ($request) {
                    return $query->where('numero', $request->numero);
                }),
            ],
            'email' => [
                'required',
                Rule::unique('clients')->where(function ($query) use ($request) {
                    return $query->where('email', $request->email);
                }),
            ],
            'vehicule_id' => [
                'required',
                Rule::unique('clients')->where(function ($query) use ($request) {
                    return $query->where('vehicule_id', $request->vehicule_id);
                }),
            ],
            'heure' => 'required',
            'date' => 'required|date',
        ], $messages);

        $client = new Client();
        $client->id = $request->id;
        $client->nom = $request->nom;
        $client->numero = $request->numero;
        $client->email = $request->email;
        $client->vehicule_id = $request->vehicule_id;
        $client->heure = $request->heure;
        $client->date = $request->date;
        $client->save();
        $vehicule  = Vehicule::find($request->vehicule_id);
return   view('clients.payement', compact('client', 'vehicules'));
}


public function updateclient($id)
    {
        $vehicules = Vehicule::all();
        $client = Client::find($id);
        return view("clients.update", compact('client','vehicules'));
    }


    public function updatestoreclient(Request $request)
{
    // Messages d'erreur personnalisés
    $messages = [
        'numero.unique' => 'Le numero de telephone existe déjà.',
        'email.unique' => 'email existe déjà.',
    ];

    // Validation des données du formulaire
    $request->validate([
        'nom' => 'required',
        'numero' => [
            'required',
            Rule::unique('clients')->where(function ($query) use ($request) {
                return $query->where('numero', $request->numero);
            }),
        ],
        'email' => [
            'required',
            Rule::unique('clients')->where(function ($query) use ($request) {
                return $query->where('email', $request->email);
            }),
        ],
        'vehicule_id' => [
            'required',
            Rule::unique('clients')->where(function ($query) use ($request) {
                return $query->where('vehicule_id', $request->vehicule_id);
            }),
        ],
        'heure' => 'required',
        'date' => 'required|date',
    ], $messages);

    $client = Client::find($request->id);
    $client->nom = $request->nom;
        $client->numero = $request->numero;
        $client->email = $request->email;
        $client->vehicule_id = $request->vehicule_id;
        $client->heure = $request->heure;
        $client->date = $request->date;
        $client->save();

    return redirect('/liste-client')->with('success', 'location modifié avec succès');
}



    public function deleteclient($id)
    {

        $client = Client::find($id);
        $client->delete();
        return redirect('/liste-client')->with('success', 'client supprimé avec succès');


    }

}
