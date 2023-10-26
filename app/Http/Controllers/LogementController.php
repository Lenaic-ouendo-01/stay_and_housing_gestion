<?php

namespace App\Http\Controllers;

use App\Models\Logement;
use Illuminate\Http\Request;

class LogementController extends Controller
{
    // 

    public function enregistrement(Request $request){

        $input = $request->all();
        
        //Vérifier avec la méthode hasfile() si la requête HTTP('$request') contient un fichier avec un champ ('photo')
        if($request->hasfile('photo')){

            //Si un fichier avec le nom de champ "photo" est présent dans la requête, cette ligne récupère ce fichier
            // à l'aide de la méthode file(). Le fichier est stocké dans la variable $file pour être traité ultérieurement.
            $file = $request->file('photo');

            //On stock dans la variable $extension l'extension du fichier qu'on traitre. La méthode getClientOriginalExtension() permet
            // d'obtenir l'extension d'un fichier
            $extention = $file->getClientOriginalExtension();

            //un nom de fichier unique est généré en combinant le timestamp actuel (obtenu à l'aide de la fonction time()) avec l'extension
            // du fichier précédemment extraite. Cela garantit que chaque fichier téléchargé aura un nom unique.
            $filename = time().'.'.$extention;

            //Déplacement du fichier téléchargé vers l'emplacement spécifié. Le premier argument de la méthode move() est le chemin où l'on
            // souhaite déplacer le fichier bon ici moi j'ai créer un dossier Logements qui est contenu dans un dossier Uploards et surtout 
            // ne pas oublier que ce dossier dans le dossier public du projet, et le deuxième argument est le nouveau nom de fichier (dans 
            //ce cas, le nom généré à l'étape précédente).
            $file->move('uploads/logements/', $filename);

            //Stockage du nom final dans la propriété du model
            $input['photo'] = $filename;
        };

        Logement::create([
            'code' => $input['code'],
            'nom' => $input['nom'],
            'capacite' => $input['capacite'],
            'type' => $input['type'],
            'lieu' => $input['lieu'],
            'photo' => $input['photo'],
            'disponible' => $input['disponible'],
        ]);
        return redirect('/logement/list');
    }

    public function listLogement(){
        $logements = Logement::paginate(5);
        // $logements = Logement::all();
        return view('listLogement', compact('logements'));
    }


    public function delete(int $logementId)
    { 
        $logement = Logement::find($logementId);
        if ($logement) {
            # code...
            $logement->delete();
            return redirect('/logement/list');  
        }
    }

    public function editToModification(int $id)
    {
        $logement = Logement::find($id);

        if (!$logement) {
            return redirect('/logement/list')->with('error', "Ce logement n'existe pas.");
        }

        return view('editLogement', compact('logement'));
    }

    public function update(Request $request, $id)
    {

        $logement = Logement::find($id);
        $input = $request->all();

        if (!$logement) {
            return redirect('/logement/list')->with('error', "Le logement n'a pas pu être retrouvée.");
        }

        $logement->code = $input['code'];
        $logement->nom = $input['nom'];
        $logement->capacite = $input['capacite'];
        $logement->type = $input['type'];
        $logement->lieu = $input['lieu'];

        //Vérifier avec la méthode hasfile() si la requête HTTP('$request') contient un fichier avec un champ ('photo')
        if($request->hasfile('photo')){

            //Si un fichier avec le nom de champ "photo" est présent dans la requête, cette ligne récupère ce fichier
            // à l'aide de la méthode file(). Le fichier est stocké dans la variable $file pour être traité ultérieurement.
            $file = $request->file('photo');

            //On stock dans la variable $extension l'extension du fichier qu'on traitre. La méthode getClientOriginalExtension() permet
            // d'obtenir l'extension d'un fichier
            $extention = $file->getClientOriginalExtension();

            //un nom de fichier unique est généré en combinant le timestamp actuel (obtenu à l'aide de la fonction time()) avec l'extension
            // du fichier précédemment extraite. Cela garantit que chaque fichier téléchargé aura un nom unique.
            $filename = time().'.'.$extention;

            //Déplacement du fichier téléchargé vers l'emplacement spécifié. Le premier argument de la méthode move() est le chemin où l'on
            // souhaite déplacer le fichier bon ici moi j'ai créer un dossier Logements qui est contenu dans un dossier Uploards et surtout 
            // ne pas oublier que ce dossier dans le dossier public du projet, et le deuxième argument est le nouveau nom de fichier (dans 
            //ce cas, le nom généré à l'étape précédente).
            $file->move('uploads/logements/', $filename);

            //Stockage du nom final dans la propriété du model
            $input['photo'] = $filename;
        };
        $logement->photo = $input['photo'];
        $logement->disponible = $input['disponible'];

        $logement->save();

        return redirect('/logement/list')->with('success', "Le projet a été mise à jour avec succès.");
    }
}
