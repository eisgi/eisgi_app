<!doctype html>
<html lang="fr" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style/emploi/css/reset.css') }}"> <!-- Réinitialisation CSS -->
    <link rel="stylesheet" href="{{ asset('style/emploi/css/style.css') }}"> <!-- Style des ressources -->

    <title>Modèle d'emploi du temps</title>
</head>

<body>
    <div class="cd-schedule loading">
        <div class="timeline">
            <ul>
                <li><span>8:30</span></li>
                <li><span>9:00</span></li>
                <li><span>9:30</span></li>
                <li><span>10:00</span></li>
                <li><span>10:30</span></li>
                <li><span>11:00</span></li>
                <li><span>11:30</span></li>
                <li><span>12:00</span></li>
                <li><span>12:30</span></li>
                <li><span>13:00</span></li>
                <li><span>13:30</span></li>
                <li><span>14:00</span></li>
                <li><span>14:30</span></li>
                <li><span>15:00</span></li>
                <li><span>15:30</span></li>
                <li><span>16:00</span></li>
                <li><span>16:30</span></li>
                <li><span>17:00</span></li>
                <li><span>17:30</span></li>
                <li><span>18:00</span></li>
                <li><span>18:30</span></li>
            </ul>
        </div> <!-- .timeline -->

        <div class="events">
            <ul>
                <li class="events-group">
                    <div class="top-info"><span>Lundi</span></div>

                    <ul>
                        <li class="single-event" data-start="8:30" data-end="13:00" data-content="event-constitucion"
                            data-event="event-1">
                            <a href="#0">
                                <em class="event-name">Anglais technique</em>
                            </a>
                        </li>
                        <li class="single-event" data-start="17:00" data-end="19:00" data-content="event-intro-educa"
                            data-event="event-3">
                            <a href="#0">
                                <em class="event-name">Approche agile</em>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="events-group">
                    <div class="top-info"><span>Mardi</span></div>

                    <ul>
                        <li class="single-event" data-start="11:00" data-end="13:00" data-content="event-mates"
                            data-event="event-1">
                            <a href="#0">
                                <em class="event-name">Création d'une application Cloud native</em>
                            </a>
                        </li>
                        <li class="single-event" data-start="17:00" data-end="18:00" data-content="event-gestion"
                            data-event="event-4">
                            <a href="#0">
                                <em class="event-name">Culture entrepreneuriale</em>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="events-group">
                    <div class="top-info"><span>Mercredi</span></div>

                    <ul>
                        <li class="single-event" data-start="13:00" data-end="15:00" data-content="event-constitucion"
                            data-event="event-2">
                            <a href="#0">
                                <em class="event-name">Développement back-end</em>
                            </a>
                        </li>
                        <li class="single-event" data-start="17:00" data-end="19:00" data-content="event-intro-educa"
                            data-event="event-3">
                            <a href="#0">
                                <em class="event-name">Développement front-end</em>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="events-group">
                    <div class="top-info"><span>Jeudi</span></div>

                    <ul>
                        <li class="single-event" data-start="11:00" data-end="13:00" data-content="event-mates"
                            data-event="event-1">
                            <a href="#0">
                                <em class="event-name">Préparation d'un projet web</em>
                            </a>
                        </li>
                        <li class="single-event" data-start="17:00" data-end="18:00" data-content="event-gestion"
                            data-event="event-4">
                            <a href="#0">
                                <em class="event-name">Projet de synthèse</em>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="events-group">
                    <div class="top-info"><span>Vendredi</span></div>

                    <ul>
                        <li class="single-event" data-start="10:00" data-end="11:00" data-content="event-mates"
                            data-event="event-1">
                            <a href="#0">
                                <em class="event-name">Français</em>
                            </a>
                        </li>
                        <li class="single-event" data-start="13:00" data-end="14:00" data-content="event-intro-educa"
                            data-event="event-3">
                            <a href="#0">
                                <em class="event-name">Projet de synthèse</em>
                            </a>
                        </li>
                        <li class="single-event" data-start="18:00" data-end="18:30" data-content="event-gestion"
                            data-event="event-4">
                            <a href="#0">
                                <em class="event-name">Culture entrepreneuriale</em>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="events-group">
                    <div class="top-info"><span>Samedi</span></div>

                    <ul>
                        <li class="single-event" data-start="8:30" data-end="13:00" data-content="event-constitucion"
                            data-event="event-1">
                            <a href="#0">
                                <em class="event-name">Culture et techniques avancées du numérique</em>
                            </a>
                        </li>
                        <li class="single-event" data-start="17:00" data-end="19:00" data-content="event-intro-educa"
                            data-event="event-3">
                            <a href="#0">
                                <em class="event-name">Angular</em>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>

        <div class="event-modal">
            <header class="header">
                <div class="content">
                    <span class="event-date">underwater</span>
                    <h3 class="event-name">underwater</h3>
                </div>

                <div class="header-bg"></div>
            </header>

            <div class="body">
                <div class="event-info"></div>
                <div class="body-bg"></div>
            </div>

            <a href="#0" class="close">Close</a>
        </div>

        <div class="cover-layer"></div>
    </div> <!-- .cd-schedule -->
    <script src="{{ asset('style/emploi/js/modernizr.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script>
        var jqueryUrl = "{{ asset('style/emploi/js/main.js') }}";
        if (!window.jQuery) document.write('<script src="' + jqueryUrl + '"><\/script>');
    </script>

    <script src="{{ asset('style/emploi/js/main.js') }}"></script>
</body>

</html>
