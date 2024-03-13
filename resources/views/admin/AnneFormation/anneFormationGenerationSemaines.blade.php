<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="{{ asset('style/login/assets/js/GenererSemaines.js')}}"></script>
</head>
<body>
    <form method="POST" onsubmit="return false;">
        <label>annee de Formation</label>
        <input type="text" name="anneeFormation" />
        <label>date Debut Annee Formation</label>
        <input type="date" id="dateDebut" name="DDAF" />
        <label>date Fin Annee Formation</label>
        <input type="date" id="dateFin" name="DFAF" />
        <button id="submitBtn">Submit</button>
    </form>
    <div id="resultContainer"></div>

 
</body>
</html>
