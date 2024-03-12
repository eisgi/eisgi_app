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
    @include('frontend.forms.anneForm')
    {{-- formulaire ajout d'un semestre --}}
    @include('frontend.forms.ajoutSemester')
    {{-- formulaire ajout d'une filière --}}
    @include('frontend.forms.ajoutFilieres')
    
</body>

</html>
