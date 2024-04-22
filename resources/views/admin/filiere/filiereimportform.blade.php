<!-- filiereimportform.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Importation Excel</title>
</head>
<body>
    <h2>Importer un fichier Excel</h2>
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div style="color: red;">{{ session('error') }}</div>
    @endif
    <form action="{{ route('importfiliereaction') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="file">Sélectionnez un fichier Excel à importer :</label>
        <input type="file" name="file" id="file">
        @error('file')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <button type="submit">Importer</button>
    </form>
</body>
</html>
