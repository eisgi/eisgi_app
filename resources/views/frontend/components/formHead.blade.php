<div class="container mt-5">
        <h1>Welcome, {{ $user->nom }}</h1>
        <p>Your role: {{ $user->role }}</p>
        
        <div class="alert alert-primary" role="alert">
            This is an example of an alert.
        </div>
       
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
