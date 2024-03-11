<!-- login.blade.php -->

<form method="POST" action="{{ route('login') }}">
    @csrf

    <label for="matricule">Matricule</label>
    <input type="text" name="matricule" required>

    <label for="password">Password</label>
    <input type="password" name="password" required>

    <button type="submit">Login</button>
</form>
