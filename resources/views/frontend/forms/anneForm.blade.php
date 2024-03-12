<form method="POST" action="{{ route('admin.ajoutFormation') }}">
    @csrf
    <div class="form-group">
        <label for="anneeFormation">Année de Formation</label>
        <input type="text" class="form-control" id="anneeFormation" name="anneeFormation" placeholder="Enter Année de Formation">
    </div>
    <div class="form-group">
        <label for="DDAF">Date de Début de l'Année de Formation</label>
        <input type="date" class="form-control" id="DDAF" name="DDAF">
    </div>
    <div class="form-group">
        <label for="DFAF">Date de Fin de l'Année de Formation</label>
        <input type="date" class="form-control" id="DFAF" name="DFAF">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
