<?php

namespace App\Http\Controllers;

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
        $chauffeur = Chauffeur::all();
      return view("chauffeurs.liste-chauffeur", compact('chauffeur'));
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
