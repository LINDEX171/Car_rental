<?php

namespace App\Http\Controllers;

use App\Models\Chauffeur;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VehiculeController extends Controller
{
    public function index()
    {
        $chauffeurs = Chauffeur::all();
        return view("vehicules.vehicule", compact('chauffeurs'));
    }


    public function liste()
    {
        $chauffeurs = Chauffeur::all();
        $vehicule = Vehicule::all();
      return view("vehicules.liste-vehicule", compact('vehicule', 'chauffeurs'));
    }


    public function store(Request $request)
    {

        // Messages d'erreur personnalisés
        $messages = [
            'matricule.unique' => 'Le matricule existe déjà.',
            'chauffeur_id.unique' => 'Le chauffeur est déjà assigné à un véhicule.',
        ];



        // Validation des données du formulaire
        $request->validate([
            'marque' => 'required',
            'photo' => 'required|image',
            'date' => 'required|date',
            'kilometre' => 'required|integer',
            'matricule' => [
                'required',
                Rule::unique('vehicules')->where(function ($query) use ($request) {
                    return $query->where('matricule', $request->matricule);
                }),
            ],

            'chauffeur_id' => [
                'required',
                Rule::unique('vehicules')->where(function ($query) use ($request) {
                    return $query->where('chauffeur_id', $request->chauffeur_id);
                }),
            ],
            'etat' => 'required',
            'prix' => 'required',
            'place' => 'required',
        ], $messages);

        $vehicule = new Vehicule();
        $vehicule->id = $request->id;
        $vehicule->marque = $request->marque;
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/vehicules/', $filename);
            $vehicule->photo = $filename;

        $vehicule->date = $request->date;
        $vehicule->kilometre = $request->kilometre;
        $vehicule->matricule = $request->matricule;
        $vehicule->chauffeur_id = $request->chauffeur_id;
        $vehicule->etat = $request->etat;
        $vehicule->prix = $request->prix;
        $vehicule->place = $request->place;

}
         $vehicule->save();
         $chauffeur  = Chauffeur::find($request->chauffeur_id);
return redirect()->route('liste')->with('success', 'Vehicule ajouté avec succès');
}


public function updatevehicule($id)
    {
        $chauffeurs = Chauffeur::all();
        $vehicule = Vehicule::find($id);
        return view("vehicules.update", compact('vehicule','chauffeurs'));
    }


    public function updatestorevehicule(Request $request)
{
    // Messages d'erreur personnalisés
    $messages = [
        'matricule.unique' => 'Le matricule existe déjà.',
        'chauffeur_id.unique' => 'Le chauffeur est déjà assigné à un véhicule.',
    ];

    // Validation des données du formulaire
    $request->validate([
        'marque' => 'required',
        'photo' => 'nullable|image',
        'date' => 'required|date',
        'kilometre' => 'required|integer',
        'matricule' => [
            'required',
            Rule::unique('vehicules')->ignore($request->id)->where(function ($query) use ($request) {
                return $query->where('matricule', $request->matricule);
            }),
        ],
        'chauffeur_id' => [
            'required',
            Rule::unique('vehicules')->ignore($request->id)->where(function ($query) use ($request) {
                return $query->where('chauffeur_id', $request->chauffeur_id);
            }),
        ],
        'etat' => 'required',
        'prix' => 'required',
        'place' => 'required',
    ], $messages);

    $vehicule = Vehicule::find($request->id);
    $vehicule->marque = $request->marque;

    if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
        $file = $request->file('photo');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('uploads/vehicules/', $filename);
        $vehicule->photo = $filename;
    }

    $vehicule->date = $request->date;
    $vehicule->kilometre = $request->kilometre;
    $vehicule->matricule = $request->matricule;
    $vehicule->chauffeur_id = $request->chauffeur_id;
    $vehicule->etat = $request->etat;
    $vehicule->prix = $request->prix;
    $vehicule->place = $request->place;

    $vehicule->save();

    return redirect('/liste-vehicule')->with('success', 'Véhicule modifié avec succès');
}


public function showVehicule()
{
    $chauffeurs = Chauffeur::all();
    $vehicules = Vehicule::all();
    return view('welcome', compact('vehicules'));
}


    public function deletevehicule($id)
    {

        $vehicule = Vehicule::find($id);
        $vehicule->delete();
        return redirect('/liste-vehicule')->with('success', 'vehicule supprimé avec succès');


    }



}
