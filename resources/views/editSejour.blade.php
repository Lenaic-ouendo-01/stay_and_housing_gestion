<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/css/app.js')
    <title>Edit séjour</title>
</head>
<body class="bg-blue-300/50">

    <div class="">
        <header class="text-3xl font-fam2 font-bold flex justify-center text-blue-700 mt-5">Modification du Séjour</header>
        
        <main class="text-xl mt-6 font-fam1 font-medium flex justify-center">
            <form action="{{ route('sejour.update', ['id' => $sejour->id]) }}" method="POST">
                @csrf
                @method('put')

                <div class="flex mt-4 justify-between">
                    <label for="">Logement:</label>
                    <select class="w-1/2 ml-5 lg:text-base text-xs text-black/80 border-2 border-blue-900 rounded-xl p-1" name="logement_id" id="">
                        @foreach ($logements as $logement)
                            <option value="{{$logement->id}}" {{ $sejour->logement_id == $logement->id ? 'selected' : '' }}>{{ $logement->nom }}</option>
                        @endforeach
                    </select>
                    <!-- <input class="lg:text-base text-xs text-black/80 border-2 border-blue-900 rounded-xl p-1" type="text" name="logement_id" id=""> -->
                </div>

                <div class="flex mt-4 justify-between">
                    <label for="">Voyageur : </label>
                    <select class="w-1/2 ml-5 lg:text-base text-xs text-black/80 border-2 border-blue-900 rounded-xl p-1" name="voyageur_id" id="">
                        @foreach ($voyageurs as $voyageur)
                            <option value="{{$voyageur->id}}" {{ $sejour->voyageur_id == $voyageur->id ? 'selected' : '' }}>{{ $voyageur->prenom }} {{ $voyageur->nom }}</option>
                        @endforeach
                    </select>
                    <!-- <input class="lg:text-base text-xs text-black/80 border-2 border-blue-900 rounded-xl p-1" type="text" name="voyageur_id" id=""> -->
                </div>

                <div class="flex mt-4 justify-between">
                    <label for="">Début : </label>
                    <input class="w-1/2 ml-5 lg:text-base text-xs text-black/80 border-2 border-blue-900 rounded-xl p-1" type="date" name="debut" id="" value="{{$sejour->debut}}">
                </div>

                <div class="flex mt-4 justify-between">
                    <label for="">Fin : </label>
                    <input class="w-1/2 ml-5 lg:text-base text-xs text-black/80 border-2 border-blue-900 rounded-xl p-1" type="date" name="fin" id="" value="{{$sejour->fin}}">
                </div>

                <div class="flex justify-center gap-4 mt-4">
                    <button type="submit" class="p-2 border-2 rounded-xl m-2 bg-teal-800 text-white">Enregistrer</button>
                    <a href="{{ route('sejour.liste') }}" class="button-annuler p-2 border-2 rounded-xl m-2 bg-orange-800 text-white supp">Annuler</a>
                </div>
            </form>
        </main>
    </div>
</body>
</html>

