

<form action="{{ route('gestionemploi.selection_annee') }}" method="post">
    @csrf
    <label for="annee">Choisir une année :</label>
    <select name="annee_id" id="annee">
        @foreach($annees as $annee)
            <option value="{{ $annee->anneeFormation }}">{{ $annee->anneeFormation }}</option>
        @endforeach
    </select>
    <button type="submit">Choisir</button>
</form>
