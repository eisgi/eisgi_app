<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="{{ asset('style/login/assets/css/styles.css') }}">
 
    <!-- ===== BOX ICONS ===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <title>Login</title>
</head>

<body>
    <div class="l-form">
        <div class="shape1"></div>
        <div class="shape2"></div>
        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first('error') }}
            </div>
        @endif

        @if ($errors->has('user'))
            <div class="alert alert-info">
                User Information:
                <ul>
                    <li>Matricule: {{ $errors->first('user.matricule') }}</li>
                    <li>Password: {{ $errors->first('user.password') }}</li>
                    <!-- Add more user attributes as needed -->
                </ul>
            </div>
        @endif

        <div class="form">
            <img src="{{ asset('style/login/assets/img/authentication.svg') }}" alt="" class="form__img">

            <form method="POST" action="{{ route('loginVerify') }}" class="form__content">
                @csrf
                <h1 class="form__title">Welcome</h1>

                <div class="form__div form__div-one">
                    <div class="form__icon">
                        <i class='bx bx-user-circle'></i>
                    </div>

                    <div class="form__div-input">

                        <label for="matricule" class="form__label">Matricule</label>
                        <input type="text" name="matricule" class="form__input" required>
                    </div>
                </div>

                <div class="form__div">
                    <div class="form__icon">
                        <i class='bx bx-lock'></i>
                    </div>

                    <div class="form__div-input">

                        <label for="matricule" class="form__label">Password</label>
                        <input type="password" name="password" class="form__input" required>
                    </div>
                </div>
                <a href="#" class="form__forgot">Forgot Password?</a>

                <input type="submit" class="form__button" value="Login">


            </form>
        </div>

    </div>

    <!-- ===== MAIN JS ===== -->
    <script src="{{ asset('style/login/assets/js/main.js') }}"></script>
</body>

</html>
