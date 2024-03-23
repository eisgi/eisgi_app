<div class="container mt-5">
    <h1>Bienvenue, {{ $user->nom }}</h1>
    
    <div class="alert alert-info mt-3" role="alert">
        Bienvenue, cher formateur ! Vous avez maintenant accès à toutes les fonctionnalités de l'interface d'administration.
    </div>

    <a href="{{ route('emploi.fourmateur') }}" class="btn btn-primary mt-3">Consulter l'emploi du temps</a>

    <form method="POST" action="{{ route('logout') }}" class="mt-3">
        @csrf
        <button type="submit" class="btn btn-danger">Déconnexion</button>
    </form>
</div>
