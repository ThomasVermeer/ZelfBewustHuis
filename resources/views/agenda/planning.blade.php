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
                        title: 'Java Programming',
                        start: '2024-03-01T10:00:00',
                        end: '2024-03-01T12:00:00',
                        color: '#3788d8'
                    },
                    {
                        title: 'Project Meeting',
                        start: '2024-03-03T14:00:00',
                        end: '2024-03-03T16:00:00',
                        color: '#29a44b'
                    },
                    {
                        title: 'Team Lunch',
                        start: '2024-03-07T12:00:00',
                        end: '2024-03-07T13:00:00',
                        color: '#d66323'
                    },
                    {
                        title: 'Conference',
                        start: '2024-03-10T10:00:00',
                        end: '2024-03-12T18:00:00',
                        color: '#af4bd6'
                    },
                    {
                        title: 'Presentation',
                        start: '2024-03-15T13:00:00',
                        end: '2024-03-15T15:00:00',
                        color: '#4b7cd6'
                    },
                    {
                        title: 'Training Workshop',
                        start: '2024-03-18T09:00:00',
                        end: '2024-03-18T17:00:00',
                        color: '#d6764b'
                    },
                    {
                        title: 'Team Building',
                        start: '2024-03-22T14:00:00',
                        end: '2024-03-22T16:00:00',
                        color: '#2389d6'
                    },
                    {
                        title: 'Deadline',
                        start: '2024-03-25',
                        end: '2024-03-25',
                        color: '#d64b82'
                    },
                    {
                        title: 'Holiday',
                        start: '2024-03-28',
                        end: '2024-03-29',
                        color: '#82d64b'
                    }
                    // Voeg hier extra evenementen toe met bijbehorende kleuren
                ]
            });
            calendar.render();
        });
    </script>
</body>
</html>
