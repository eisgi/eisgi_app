<!doctype html>
<html lang="fr" class="no-js">

<head>

    @php
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
            var htmlContent = document.documentElement.outerHTML;
            var filename = 'Group ' + '{{ $group }}' + '.pdf';
             htmlContent = removeUnwantedElements(htmlContent);
            html2pdf().from(htmlContent).save(filename);
        }

        function removeUnwantedElements(htmlContent) {
            var tempElement = document.createElement('div');
            tempElement.innerHTML = htmlContent;

            var eventModal = tempElement.querySelector('.event-modal');
            if (eventModal) {
                eventModal.parentNode.removeChild(eventModal);
            }

            var coverLayer = tempElement.querySelector('.cover-layer');
            if (coverLayer) {
                coverLayer.parentNode.removeChild(coverLayer);
            }

            var coolButton = tempElement.querySelector('.cool-button');
            if (coolButton) {
                coolButton.parentNode.removeChild(coolButton);
            }

            return tempElement.innerHTML;
        }
    </script>

    @include('components.timeTableScript')
</body>

</html>
