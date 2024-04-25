<!doctype html>
<html lang="fr" class="no-js">

<head>

    @php
        // we need to ensure that the variable passed to the component is not null
        $group = isset($schedule['Group']) ? $schedule['Group'] : null;
    @endphp

    @include('components.timeTableHeader', ['gr' => $group])
    
</head>

<body>
   <div>
        <a href="{{ route('export.pdf') }}" class="btn btn-primary">Export Time Table</a>
    </div>
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
         function exportToPdf() {
            // Create a new jsPDF instance
            var doc = new jsPDF();

            // Add content to the PDF
            doc.text(20, 20, 'This is a sample PDF generated using jsPDF.');

            // Save the PDF
            doc.save('time_table.pdf');
        }
    </script>
    @include('components.timeTableScript')
</body>

</html>
