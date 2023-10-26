<?php

namespace App\Http\Controllers;

use App\Models\Logement;
use App\Models\Sejour;
use App\Models\Voyageur;
use Illuminate\Http\Request;

class SejourController extends Controller
{
    //
    public function index(){
        $logements = Logement::all();
        $voyageurs = Voyageur::all();

        return view('formSejour', compact('logements','voyageurs'));
    }

    public function store(Request $request){

        $input = $request->all();

        Sejour::create([
            'debut' => $input['debut'],
            'fin' => $input['fin'],
            'voyageur_id' => $input['voyageur_id'],
            'logement_id' => $input['logement_id'],
        ]);

        return redirect('/sejour/list');
    }

    public function listSejour(){
        $sejours = Sejour::paginate(5);

        return view('listSejour', compact('sejours'));
    }


    public function delete(int $sejourId)
    { 
        $sejour = Sejour::find($sejourId);
        if ($sejour) {
            # code...
            $sejour->delete();

            return redirect('/sejour/list');  
        }
    }

    public function editToModification(int $id)
    {
        $logements = Logement::all();
        $voyageurs = Voyageur::all();
        $sejour = Sejour::find($id);

        if (!$sejour) {

            return redirect('/sejour/list')->with('error', "Ce sejour n'existe pas.");
        }

        return view('editSejour', compact('sejour','logements','voyageurs'));
    }

    public function update(Request $request, $id)
    {

        $sejour = Sejour::find($id);
        $input = $request->all();

        if (!$sejour) {

            return redirect('/sejour/list')->with('error', "Le sejour n'a pas pu être retrouvée.");
        }

        $sejour->debut = $input['debut'];
        $sejour->fin = $input['fin'];
        $sejour->voyageur_id = $input['voyageur_id'];
        $sejour->logement_id = $input['logement_id'];

        $sejour->save();

        return redirect('/sejour/list')->with('success', "Le séjour a été mise à jour avec succès.");
    }
}
