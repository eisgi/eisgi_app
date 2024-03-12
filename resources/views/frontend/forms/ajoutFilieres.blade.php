<form method="POST" action="{{ route('admin.ajoutFilieres') }}">
    @csrf
    <div class="form-group">
        <label for="codeFiliere">Code Filiere</label>
        <input type="text" class="form-control" id="codeFiliere" name="codeFiliere" placeholder="Enter code">
    </div>
    <div class="form-group">
        <label for="libelle">Libelle</label>
        <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Enter libelle">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
