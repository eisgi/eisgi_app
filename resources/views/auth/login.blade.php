<!-- login.blade.php -->

<form method="POST" action="{{ route('loginVerify') }}">
    @csrf

    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first('error') }}
        </div>
    @endif

    @if($errors->has('user'))
        <div class="alert alert-info">
            User Information:
            <ul>
                <li>Matricule: {{ $errors->first('user.matricule') }}</li>
                <li>Password: {{ $errors->first('user.password') }}</li>
                <!-- Add more user attributes as needed -->
            </ul>
        </div>
    @endif

    <label for="matricule">Matricule</label>
    <input type="text" name="matricule" required>

    <label for="password">Password</label>
    <input type="password" name="password" required>

    <button type="submit">Login</button>
</form>
