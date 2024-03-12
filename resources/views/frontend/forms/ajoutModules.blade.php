<form method="POST" action="{{ route('admin.ajoutModules') }}">
    @csrf
    <div class="form-group">
        <label for="codeModule">Code Module</label>
        <input type="text" class="form-control" id="codeModule" name="codeModule" placeholder="Enter Code Module">
    </div>
    <div class="form-group">
        <label for="libelleModule">Libellé Module</label>
        <input type="text" class="form-control" id="libelleModule" name="libelleModule" placeholder="Enter Libellé Module">
    </div>
    <div class="form-group">
        <label for="ordreModule">Ordre Module</label>
        <input type="number" class="form-control" id="ordreModule" name="ordreModule" min="0" placeholder="Enter Ordre Module">
    </div>
    <div class="form-group">
        <label for="filiereModule">Filière du Module</label>
        <input type="text" class="form-control" id="filiereModule" name="filiereModule" placeholder="Enter Filière du Module">
    </div>
    <div class="form-group">
        <label for="semestreModule">Semestre du Module</label>
        <input type="text" class="form-control" id="semestreModule" name="semestreModule" placeholder="Enter Semestre du Module">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
