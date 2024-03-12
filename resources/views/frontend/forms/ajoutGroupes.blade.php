<form method="POST" action="{{ route('admin.ajoutGroupes') }}">
    @csrf
    <div class="form-group">
        <label for="libelleGroupe">Libellé Groupe</label>
        <input type="text" class="form-control" id="libelleGroupe" name="libelleGroupe" placeholder="Enter Libellé Groupe">
    </div>
    <div class="form-group">
        <label for="filiereGroupe">Filière du Groupe</label>
        <input type="text" class="form-control" id="filiereGroupe" name="filiereGroupe" placeholder="Enter Filière du Groupe">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
