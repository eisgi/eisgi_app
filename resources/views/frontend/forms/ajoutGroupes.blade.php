 <form method="POST" action="{{route('admin.ajoutGroupes')}}">
        @csrf
        <label>libelleGroupe</label>
        <input type="text" name="libelleGroupe"/>
        <label>filiereGroupe</label>
        <input type="text" name="filiereGroupe"/>
    </form>