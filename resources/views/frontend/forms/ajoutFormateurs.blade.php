<form method="POST" action="{{ route('admin.ajoutFormateurs') }}">
    @csrf
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom" placeholder="Enter Nom">
    </div>
    <div class="form-group">
        <label for="prenom">Prénom</label>
        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Enter Prénom">
    </div>
    <div class="form-group">
        <label for="dateNaissance">Date de Naissance</label>
        <input type="date" class="form-control" id="dateNaissance" name="dateNaissance">
    </div>
    <div class="form-group">
        <label for="dateRejoint">Date de Rejoint</label>
        <input type="date" class="form-control" id="dateRejoint" name="dateRejoint">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
