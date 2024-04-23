<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Espace Formateur</h1>
    <form id="logoutForm" action="{{ route('auth.logout') }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" onclick="event.preventDefault(); logout();" style="padding: 6px; background-color:red;color:white;border:none;border-radius:5px;cursor:pointer"> <i class="fa fa-power-off"></i>
            <i class='bx bx-log-out' id="log_out" style="width: 40px;"></i>
        </button>
    </form>
    <script>
        function logout() {
            document.getElementById('logoutForm').submit();
        }
    </script>
</body>
</html>