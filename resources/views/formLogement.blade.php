<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/css/app.js')
    <title>Form of logement</title>
</head>
<body class="bg-blue-300/50">

    <header class="text-3xl font-fam2 font-bold flex justify-center text-blue-700 mt-5">Nouveau Logement</header>
    
    <main class="text-xl mt-6 font-fam1 font-medium flex justify-center">
        <form action="{{ route('logement.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="flex mt-4 justify-between">
                <label for="">Code du logement :</label>
                <input class="lg:text-base text-xs text-black/80 border-2 border-blue-900 rounded-xl p-1" type="text" name="code" id="">
            </div>

            <div class="flex mt-4 justify-between">
                <label for="">Nom du logement : </label>
                <input class="lg:text-base text-xs text-black/80 border-2 border-blue-900 rounded-xl p-1" type="text" name="nom" id="">
            </div>

            <div class="flex mt-4 justify-between">
                <label for="">Capacité du logement : </label>
                <input class="lg:text-base text-xs text-black/80 border-2 border-blue-900 rounded-xl p-1" type="text" name="capacite" id="">
            </div>

            <div class="flex mt-4 justify-between">
                <label for="">Type du logement : </label>
                <input class="lg:text-base text-xs text-black/80 border-2 border-blue-900 rounded-xl p-1" type="text" name="type" id="">
            </div>

            <div class="flex mt-4 justify-between">
                <label for="">Lieu du logement : </label>
                <input class="lg:text-base text-xs text-black/80 border-2 border-blue-900 rounded-xl p-1" type="text" name="lieu" id="">
            </div>

            <div class="flex mt-4 justify-between">
                <label for="">Photo du logement : </label>
                <input class="block ml-4 text-sm text-white border border-none p-2 border-gray-300 rounded-lg cursor-pointer bg-stone-600" name="photo" type="file">
            </div>

            <div class="flex justify-between mt-4">
                <label for="">Disponibilité du logement : </label>
                <div>
                    <input class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300" name="disponible" type="radio" value="Oui"> <label for="">Oui</label>
                    <input class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300" name="disponible" type="radio" value="Non"> <label for="">Non</label>
                </div>
            </div>

            <div class="flex justify-center gap-4 mt-4">
                <button type="submit" class="p-2 border-2 rounded-xl m-2 bg-teal-800 text-white">Enregistrer</button>
                <a href="{{ route('logement.liste') }}" class="button-annuler p-2 border-2 rounded-xl m-2 bg-orange-800 text-white supp">Annuler</a>
            </div>
        </form>
    </main>
</body>
</html>