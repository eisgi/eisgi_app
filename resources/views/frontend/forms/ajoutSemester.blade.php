<form method="POST" action="{{ route('admin.ajoutSemestres') }}">
        @csrf
        <label>id Semestre</label>
        <input type="text" name="idSemestre" />
        <label>date Debut Semestre</label>
        <input type="date" name="dateDebutSemestre" />
        <label>dateFinSemestre</label>
        <input type="date" name="dateFinSemestre" />
    </form>