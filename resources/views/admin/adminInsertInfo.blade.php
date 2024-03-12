<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Your Website</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#anneeFormation">Ajout Année de Formation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#ajoutSemestre">Ajout Semestre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#ajoutFiliere">Ajout Filière</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Forms -->
    <div class="container mt-5">
        <!-- Formulaire ajout d'une année de formation -->
        <div id="anneeFormation">
            @include('frontend.forms.anneForm')
        </div>

        <!-- Formulaire ajout d'un semestre -->
        <div id="ajoutSemestre">
            @include('frontend.forms.ajoutSemester')
        </div>

        <!-- Formulaire ajout d'une filière -->
        <div id="ajoutFiliere">
            @include('frontend.forms.ajoutFilieres')
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
