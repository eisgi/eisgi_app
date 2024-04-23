<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Admin</title>
</head>
<body>
    <h1>Espace Admin</h1>
    <p>Welcome, Admin!</p>
    
    <!-- Display token information -->
    <p>Access Token: {{ session('access_token') }}</p>
    
    <form id="logoutForm" action="{{ route('auth.logout') }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="token" value="{{session('access_token')}}">

        <button type="submit" onclick="event.preventDefault(); logout();" style="padding: 6px; background-color:red;color:white;border:none;border-radius:5px;cursor:pointer"> <i class="fa fa-power-off"></i>
            Logout
        </button>
    </form>
    
    <script>
        function logout() {
            document.getElementById('logoutForm').submit();
        }
    </script>
</body>
</html>
