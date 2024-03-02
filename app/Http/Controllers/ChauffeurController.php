<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Vehicule;
use App\Models\Chauffeur;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ChauffeurController extends Controller
{
    public function index()
    {
        return view("chauffeurs.chauffeur");
    }


    public function liste()
    {
        $client = Client::all();
        $vehicule = Vehicule::all();
        $totalChauffeurs = $this->nombreChauffeurs();
        $totalVehicules = $this->nombreVehicules();
        $totalClients = $this->nombreClients();
        $chauffeur = Chauffeur::all();
      return view("chauffeurs.liste-chauffeur", compact('chauffeur', 'client','vehicule', 'totalChauffeurs', 'totalClients', 'totalVehicules'));
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
        // Messages d'erreur personnalisés
        $messages = [
            'permis.unique' => 'Le numero de permis existe déjà.',
        ];

        // Validation des données du formulaire
        $request->validate([
            'nom' => 'required',
            'permis' => [
                'required',
                Rule::unique('chauffeurs')->where(function ($query) use ($request) {
                    return $query->where('permis', $request->permis);
                }),
            ],
            'experience' => 'required',
            'validite' => 'required|date',
            'expiration' => 'required|date',
        ], $messages);

        $chauffeur = new Chauffeur();
        $chauffeur->id = $request->id;
        $chauffeur->nom = $request->nom;
        $chauffeur->permis = $request->permis;
        $chauffeur->experience = $request->experience;
        $chauffeur->validite = $request->validite;
        $chauffeur->expiration = $request->expiration;
        $chauffeur->save();

return redirect()->route('liste1')->with('success', 'chauffeur ajouté avec succès');
}


public function updatechauffeur($id)
    {
        $chauffeur = Chauffeur::find($id);
        return view("chauffeurs.update", compact('chauffeur'));
    }


    public function updatestorechauffeur(Request $request)
{
    $chauffeur = Chauffeur::find($request->id);
    $chauffeur->nom = $request->nom;
    $chauffeur->permis = $request->permis;
    $chauffeur->experience = $request->experience;
    $chauffeur->validite = $request->validite;
    $chauffeur->expiration = $request->expiration;
    $chauffeur->save(); // Utilisez la méthode save() pour sauvegarder les modifications
    return redirect('/liste-chauffeur')->with('success', 'chauffeur modifié avec succès');
}



    public function deletechauffeur($id)
    {
        $chauffeur = Chauffeur::find($id);
        $chauffeur->delete();
        return redirect('/liste-chauffeur')->with('success', 'chauffeur supprimé avec succès');
    }
}
