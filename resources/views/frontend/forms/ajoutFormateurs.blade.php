<form method="POST" action="{{route('admin.ajoutFormateurs')}}">
        @csrf
        <label>Nom</label>
        <input type="text" name="nom"/>
        <label>Prénom</label>
        <input type="text" name="prenom"/>
        <label>Date de Naissance</label>
        <input type="date" name="dateNaissance"/>
        <label>Date de Rejoint</label>
        <input type="date" name="dateRejoint"/>

    </form>