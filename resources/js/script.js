document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('calendar');

    let dates = [
        {
            title: 'java',
            start: '2023-11-09T10:45',
            end: '2023-11-09T12:45',
            color: 'red',
        },
        {
            title: 'project',
            start: '2023-11-09T13:15',
            end: '2023-11-09T15:15'
        },
        {
            title:'Weekend',
            allDay: true,
            start: '2023-11-11',
            end: '2023-11-13'
        }
    ];

    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        editable: true,
        events: dates,
        eventClick: function(info) {
            alert('Dit is de les van vandaag: ' + info.event.title);
        },
        eventDrop: function(info){
            alert('Dit is de les van vandaag: ' + info.event.title);
        }
    });

    calendar.render();
});
