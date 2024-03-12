<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script>
        function semainesCreation(dd, df) {
    let dateDebut = new Date(dd);
    let dateFin = new Date(df);

    let incr = 0;
    const semainesTab = [];

    while (dateDebut <= dateFin) {
        let jourDD = dateDebut.getDay();

        switch (jourDD) {
            case 1:
                semainesTab.push({
                    semaine: 'S' + String(incr + 1),
                    dateDebut: dateDebut,
                    dateFin: dateFin.setDate(dateDebut.getDate() + 5),
                });
                dateDebut.setDate(dateFin + 2);
                break;
            case 2:
                semainesTab.push({
                    semaine: 'S' + String(incr + 1),
                    dateDebut: dateDebut,
                    dateFin: dateFin.setDate(dateDebut.getDate() + 4),
                });
                dateDebut.setDate(dateFin + 2);
                break;
            case 3:
                semainesTab.push({
                    semaine: 'S' + String(incr + 1),
                    dateDebut: dateDebut,
                    dateFin: dateFin.setDate(dateDebut.getDate() + 3),
                });
                dateDebut.setDate(dateFin + 2);
                break;
            case 4:
                semainesTab.push({
                    semaine: 'S' + String(incr + 1),
                    dateDebut: dateDebut,
                    dateFin: dateFin.setDate(dateDebut.getDate() + 2),
                });
                dateDebut.setDate(dateFin + 2);
                break;
            case 5:
                semainesTab.push({
                    semaine: 'S' + String(incr + 1),
                    dateDebut: dateDebut,
                    dateFin: dateFin.setDate(dateDebut.getDate() + 1),
                });
                dateDebut.setDate(dateFin + 2);
                break;
            case 6:
                semainesTab.push({
                    semaine: 'S' + String(incr + 1),
                    dateDebut: dateDebut,
                    dateFin: dateFin.setDate(dateDebut.getDate()),
                });
                dateDebut.setDate(dateFin + 2);
                break;
            default:
                semainesTab.push({
                    semaine: 'S' + String(incr + 1),
                    dateDebut: dateDebut,
                    dateFin: dateFin.setDate(dateDebut.getDate() + 1),
                });
                dateDebut.setDate(dateFin + 2);
                break;
        }
    }
}

    </script>
</head>

<body>
     <form method="POST" action="{{ route('admin.ajoutFormation') }}">
        @csrf
        <label>annee de Formation</label>
        <input type="text" name="anneeFormation" />
        <label>date Debut Annee Formation</label>
        <input type="date" name="DDAF" />
        <label>date Fin Annee Formation</label>
        <input type="date" name="DFAF" />
    </form>

    {{-- formulaire ajout d'un semestre --}}
    <form method="POST" action="{{ route('admin.ajoutSemestres') }}">
        @csrf
        <label>idSemestre</label>
        <input type="text" name="idSemestre" />
        <label>dateDebutSemestre</label>
        <input type="date" name="dateDebutSemestre" />
        <label>dateFinSemestre</label>
        <input type="date" name="dateFinSemestre" />
    </form>




    {{-- formulaire ajout d'une filière --}}
    <form method="POST" action="{{ route('admin.ajoutFilieres') }}">
        @csrf
        <label>codeFiliere</label>
        <input type="text" name="codeFiliere" />
        <label>libelle</label>
        <input type="text" name="libelle" />
    </form>
</body>

</html>
