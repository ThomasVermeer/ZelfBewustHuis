<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.css' rel='stylesheet' />
    <style>
        /* Event kleuren */
        .fc-event {
            background-color: #3788d8;
            color: #fff;
        }
    </style>
</head>
<body>
    <div id='calendar'></div>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: [
                    {
                        title: 'Java',
                        start: '2024-03-01T10:00:00',
                        end: '2024-03-01T12:00:00'
                    },
                    {
                        title: 'Project',
                        start: '2024-03-03T14:00:00',
                        end: '2024-03-03T16:00:00'
                    }
                ]
            });
            calendar.render();
        });
    </script>
</body>
</html>
