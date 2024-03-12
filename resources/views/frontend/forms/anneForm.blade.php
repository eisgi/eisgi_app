<form method="POST" action="{{ route('admin.ajoutFormation') }}">
        @csrf
        <label>annee de Formation</label>
        <input type="text" name="anneeFormation" />
        <label>date Debut Annee Formation</label>
        <input type="date" name="DDAF" />
        <label>date Fin Annee Formation</label>
        <input type="date" name="DFAF" />
    </form>