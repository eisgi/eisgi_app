<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insertion</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        /* Add custom styles here */
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">E isgi</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#formateurs">Ajout Formateurs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#modules">Ajout Modules</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#groupes">Ajout Groupes</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Formulaires -->
    <div class="container mt-5">
        <!-- Formulaire ajout des formateurs -->
        <div id="formateurs">
            @include('frontend.forms.ajoutFormateurs')
        </div>

        <!-- Formulaire ajout des modules -->
        <div id="modules">
            @include('frontend.forms.ajoutModules')
        </div>

        <!-- Formulaire ajout des groupes -->
        <div id="groupes">
            @include('frontend.forms.ajoutGroupes')
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
