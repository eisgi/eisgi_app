<form method="POST" action="{{ route('admin.ajoutSemestres') }}">
    @csrf
    <div class="form-group">
        <label for="idSemestre">ID Semestre</label>
        <input type="text" class="form-control" id="idSemestre" name="idSemestre" placeholder="Enter ID Semestre">
    </div>
    <div class="form-group">
        <label for="dateDebutSemestre">Date de Début du Semestre</label>
        <input type="date" class="form-control" id="dateDebutSemestre" name="dateDebutSemestre">
    </div>
    <div class="form-group">
        <label for="dateFinSemestre">Date de Fin du Semestre</label>
        <input type="date" class="form-control" id="dateFinSemestre" name="dateFinSemestre">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
