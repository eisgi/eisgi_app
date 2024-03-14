<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="{{ route('genererSemaines') }}" method="POST">
        @csrf
        <label for="anneFormation">Anne Formation</label>
        <input type="text" id="anneFormation" name="anneFormation">
        <label for="dateDebut">Date de début :</label>
        <input type="date" id="dateDebut" name="dateDebut">
        <label for="dateFin">Date de fin :</label>
        <input type="date" id="dateFin" name="dateFin">
        <button type="submit" id="submitBtn">Générer</button>
    </form>
    
    <div id="resultContainer">
        @isset($weeks)
            @foreach($weeks as $week)
                <div>{{ $week['codeSemaine'] }}: {{ $week['dateDebutSemaine'] }} - {{ $week['dateFinSemaine'] }}</div>
            @endforeach
        @endisset
    </div>

 
</body>
</html>
