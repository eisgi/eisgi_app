<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@if($errors->any())
            <div class=" mt-2 alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
<form method="POST" action="{{route('auth.login')}}" class="slides-form" >
             @csrf
       
            <input type="text" class="input-9 ae-4 fromCenter" name="matricule" placeholder="Matricule" required val=""/>
            <input type="password" class="input-9 ae-5 fromCenter" name="password" placeholder="Password" val=""/>
            <button type="submit" class="button blue gradient ae-7 fromCenter" name="button">Login</button>
          </form>
        </div>
</body>
</html>