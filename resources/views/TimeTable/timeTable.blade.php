<!doctype html>
<html lang="fr" class="no-js">

<head>

    @php
        // we need to ensure that the variable passed to the component is not null
        $group = isset($schedule['Group']) ? $schedule['Group'] : null;
    @endphp

    @include('components.timeTableHeader', ['gr' => $group])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>

</head>

<body>
   <button onclick="downloadPDF()" class="cool-button">Télécharge l'emploi du temps.</button>


    <div class="cd-schedule loading">

        <div class="timeline">
            @include('components.timeline')
        </div> <!-- .timeline -->

        <div class="events">
            <ul>
                @foreach ($schedule['days'] as $day)
                    <li class="events-group">
                        <div class="top-info"><span>{{ $day['name'] }}</span></div>

                        <ul>
                            @foreach ($day['events'] as $event)
                                <li class="single-event" data-start="{{ $event['start'] }}" data-end="{{ $event['end'] }}"
                                    data-content="{{ $event['content'] }}" data-event="{{ $event['eventId'] }}">
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
    <script>
        function downloadPDF() {
            // Get the HTML content of the entire page
            var htmlContent = document.documentElement.outerHTML;
            // Concatenate the value of $group with the filename
            var filename = 'Group ' + '{{ $group }}' + '.pdf';

            // Convert HTML content to PDF and save with the dynamic filename
            html2pdf().from(htmlContent).save(filename);
        }
    </script>

    @include('components.timeTableScript')
</body>

</html>
