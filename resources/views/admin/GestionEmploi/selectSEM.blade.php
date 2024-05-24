
<form action="{{ route('gestionemploi.selection_semaine') }}" method="post">
    @csrf
    @method('POST')

    <label for="semaine">Choisir une semaine :</label>
    <select name="semaine_id" id="semaine">
        @foreach($semaines as $semaine)
            <option value="{{ $semaine->id }}">{{ $semaine->codeSemaine }} - {{ $semaine->dateDebutSemaine }} - {{ $semaine->dateFinSemaine }}</option>
        @endforeach
    </select>
    <button type="submit">Choisir</button>
</form>
