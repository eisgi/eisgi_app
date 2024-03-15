<div class="container mt-5">
    <h1>Welcome, {{ $user->nom }}</h1>
    <p>Your role: {{ $user->role }}</p>

    <div class="alert alert-info" role="alert">
        Bienvenue, cher formateur ! Vous avez maintenant accès à toutes les fonctionnalités de l'interface
        d'administration.
    </div>


    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</div>
