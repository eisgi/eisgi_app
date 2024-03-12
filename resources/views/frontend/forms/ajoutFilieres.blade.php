<form method="POST" action="{{ route('admin.ajoutFilieres') }}">
        @csrf
        <label>codeFiliere</label>
        <input type="text" name="codeFiliere" />
        <label>libelle</label>
        <input type="text" name="libelle" />
    </form>