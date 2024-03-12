<form method="POST" action="{{route('admin.ajoutModules')}}">
        @csrf
        <label>codeModule</label>
        <input type="text" name="codeModule"/>
        <label>libelleModule</label>
        <input type="text" name="libelleModule"/>
        <label>ordreModule</label>
        <input type="number" min="0" name="ordreModule"/>
        <label>filiereModule</label>
        <input type="text" name="filiereModule"/>
        <label>semestreModule</label>
        <input type="text" name="semestreModule"/>

    </form>
