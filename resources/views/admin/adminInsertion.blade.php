<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insertion</title>
</head>
<body>
        {{-- formulaire ajout d'un semestre --}}
        <form method="POST" action="{{route('ajoutSemestres')}}">
            @csrf
            <label>idSemestre</label>
            <input type="text" name="idSemestre"/>
            <label>dateDebutSemestre</label>
            <input type="date" name="dateDebutSemestre"/>
            <label>dateFinSemestre</label>
            <input type="date" name="dateFinSemestre"/>
        </form>




    {{-- formulaire ajout d'une filière --}}
    <form method="POST" action="{{route('ajoutFilieres')}}">
        @csrf
        <label>codeFiliere</label>
        <input type="text" name="codeFiliere"/>
        <label>libelle</label>
        <input type="text" name="libelle"/>
    </form>

    {{-- formulaire ajout des formateurs --}}
    <form method="POST" action="{{route('ajoutFormateurs')}}">
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
    <form method="POST" action="{{route('ajoutModules')}}">
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
    <form method="POST" action="{{route('ajoutGroupes')}}">
        @csrf
        <label>libelleGroupe</label>
        <input type="text" name="libelleGroupe"/>
        <label>filiereGroupe</label>
        <input type="text" name="filiereGroupe"/>
    </form>

</body>
</html>
