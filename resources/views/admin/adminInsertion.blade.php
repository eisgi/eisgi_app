<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insertion</title>
</head>
<body>
       

    {{-- formulaire ajout des formateurs --}}
    <form method="POST" action="{{route('admin.ajoutFormateurs')}}">
        @csrf
        <label>Nom</label>
        <input type="text" name="nom"/>
        <label>Prénom</label>
        <input type="text" name="prenom"/>
        <label>Date de Naissance</label>
        <input type="date" name="dateNaissance"/>
        <label>Date de Rejoint</label>
        <input type="date" name="dateRejoint"/>

    </form>

    {{-- formulaire ajout des modules --}}
    <form method="POST" action="{{route('admin.ajoutModules')}}">
        @csrf
        <label>codeModule</label>
        <input type="text" name="codeModule"/>
        <label>libelleModule</label>
        <input type="text" name="libelleModule"/>
        <label>ordreModule</label>
        <input type="number" min="0" name="ordreModule"/>
        <label>filiereModule</label>
        <input type="text" name="filiereModule"/>
        <label>semestreModule</label>
        <input type="text" name="semestreModule"/>

    </form>

    {{-- formulaire ajout des groupes --}}
    <form method="POST" action="{{route('admin.ajoutGroupes')}}">
        @csrf
        <label>libelleGroupe</label>
        <input type="text" name="libelleGroupe"/>
        <label>filiereGroupe</label>
        <input type="text" name="filiereGroupe"/>
    </form>

</body>
</html>
