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
        <h1>{{$schedule['Group']}}</h1>
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
                @foreach($schedule['days'] as $day)
                <li class="events-group">
                    <div class="top-info"><span>{{ $day['name'] }}</span></div>

                    <ul>
                        @foreach($day['events'] as $event)
                        <li class="single-event" data-start="{{ $event['start'] }}" data-end="{{ $event['end'] }}" data-content="{{ $event['content'] }}" data-event="{{ $event['eventId'] }}">
                            <a href="#0">
                                <em class="event-name">{{ $event['name'] }}</em>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endforeach
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
