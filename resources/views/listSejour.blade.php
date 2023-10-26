<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Liste sejour</title>
</head>
<body>
    <div class="flex justify-between mx-10 mt-5">
        <p class="text-3xl font-fam2 font-bold flex justify-center text-blue-700 mt-5">Liste des Séjours</p>
        <div class="flex justify-between gap-5">
            <a href="{{ route('home') }}" class="flex gap-3 button-annuler p-2 border-2 rounded-xl m-2 bg-gray-800/50 text-white supp">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><defs><path id="solarHomeBold0" fill-rule="evenodd" d="M10.75 9.5a1.25 1.25 0 1 1 2.5 0a1.25 1.25 0 0 1-2.5 0Z" clip-rule="evenodd"/></defs><g fill="currentColor"><path d="M18.5 3H16a.5.5 0 0 0-.5.5v.059l3.5 2.8V3.5a.5.5 0 0 0-.5-.5Z"/><use href="#solarHomeBold0" fill-rule="evenodd" clip-rule="evenodd"/><path fill-rule="evenodd" d="m20.75 10.96l.782.626a.75.75 0 0 0 .936-1.172l-8.125-6.5a3.75 3.75 0 0 0-4.686 0l-8.125 6.5a.75.75 0 0 0 .937 1.172l.781-.626v10.29H2a.75.75 0 0 0 0 1.5h20a.75.75 0 0 0 0-1.5h-1.25V10.96ZM9.25 9.5a2.75 2.75 0 1 1 5.5 0a2.75 2.75 0 0 1-5.5 0Zm2.8 3.75c.664 0 1.237 0 1.696.062c.492.066.963.215 1.345.597s.531.853.597 1.345c.058.43.062.96.062 1.573v4.423h-1.5V17c0-.728-.002-1.2-.048-1.546c-.044-.325-.114-.427-.172-.484c-.057-.057-.159-.128-.484-.172c-.347-.046-.818-.048-1.546-.048c-.728 0-1.2.002-1.546.048c-.325.044-.427.115-.484.172c-.057.057-.128.159-.172.484c-.046.347-.048.818-.048 1.546v4.25h-1.5v-4.3c0-.664 0-1.237.062-1.696c.066-.492.215-.963.597-1.345s.854-.531 1.345-.597c.459-.062 1.032-.062 1.697-.062h.098Z" clip-rule="evenodd"/><use href="#solarHomeBold0" fill-rule="evenodd" clip-rule="evenodd"/></g></svg>
                Home
            </a>
            <a href="{{ route('sejour') }}" class="p-2 border-2 rounded-xl m-2 font-fam1 bg-sky-600 text-white">+ New Stay</a>
        </div>
    </div>


    <main class="text-xl mt-6 font-medium">
        <table  class="rounded border mt-10 tableau mx-auto">
            <tr class="rounded border">
                <th class="rounded border-r-2 px-3 bg-gray-500/40">Nom du Logement</th>
                <th class="rounded border-r-2 px-3 bg-gray-500/40">Nom & Prenom du voyageur</th>
                <th class="rounded border-r-2 px-3 bg-gray-500/40">Début du séjour</th>
                <th class="rounded border-r-2 px-3 bg-gray-500/40">Fin du séjour</th>
                <th class="rounded border-r-2 px-3 bg-gray-500/40">Action</th>
            </tr>
            @foreach ($sejours as $sejour)
                <tr class="rounded border">
                    <td class="rounded border-r-2 px-3">{{ $sejour->logement->nom }}</td>  
                    <td class="rounded border-r-2 px-3">{{ $sejour->voyageur->prenom }} {{ $sejour->voyageur->nom }}</td>
                    <td class="rounded border-r-2 px-3">{{ $sejour->debut }}</td>
                    <td class="rounded border-r-2 px-3">{{ $sejour->fin }}</td>
                    <td class="rounded px-3 py-6 flex gap-2">
                        <a href="{{ route('sejour.edit', ['id' => $sejour->id]) }}" class="p-1 border-2 rounded-xl m-2 bg-teal-800 text-white">Modifier</a>
                        <form action="{{ route('sejour.delete', ['id' => $sejour->id]) }}" id="form" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="p-1 border-2 rounded-xl m-2 bg-orange-800 text-white supp">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            
        </table>

        {{ $sejours->links() }}
    </main>
</body>
<script>
const form = document.querySelector('#form')
form.addEventListener('submit', (e)=>{
    debugger
    e.preventDefault()
    const canDelete = confirm('Voulez vous vraiment supprimer ce séjour ?')
    if(canDelete){
        e.target.submit()
    }
})
</script>
</html>