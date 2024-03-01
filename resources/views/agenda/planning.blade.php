<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.css' rel='stylesheet' />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            color: #333;
        }

        #calendar {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .fc-toolbar-title {
            font-size: 20px;
            font-weight: bold;
            color: #3788d8;
            margin-bottom: 20px;
        }

        .fc-button {
            background-color: #3788d8;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .fc-button:hover {
            background-color: #2c6cb8;
        }

        .fc-event {
            background-color: #3788d8;
            color: #fff;
            border: none;
        }

        .fc-daygrid-event {
            margin-bottom: 10px;
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
                    // Voeg hier extra evenementen toe
                ]
            });
            calendar.render();
        });
    </script>
</body>
</html>
