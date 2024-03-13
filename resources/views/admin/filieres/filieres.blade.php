<!-- resources/views/filieres/index.blade.php -->

    <h1>Liste des filières</h1>

    <ul>
        @foreach($filieres as $filiere)
            <li>{{ $filiere->codeFiliere }} - {{ $filiere->libelleFiliere }}</li>
        @endforeach
    </ul>
