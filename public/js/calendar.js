document.addEventListener("DOMContentLoaded", function () {
    var monthCalendarEl = document.getElementById("month-calendar");
    var dayListEl = document.getElementById("day-list");
    var eventsJsonPath = '/storage/calendar.json'; // Path ke file JSON dengan data acara

    fetch(eventsJsonPath)
        .then(response => response.json())
        .then(data => {
            // Menghitung jumlah acara untuk setiap tanggal
            var eventCounts = {};
            data.forEach(event => {
                var date = event.start.slice(0, 10); // Mengambil bagian tanggal dari tanggal acara
                eventCounts[date] = (eventCounts[date] || 0) + 1; // Menambahkan jumlah acara untuk tanggal tersebut
            });

            // Inisialisasi kalender bulan
            var calendar = new FullCalendar.Calendar(monthCalendarEl, {
                initialView: 'dayGridMonth',
                events: data,
                dayCellContent: function (arg) {
                    var date = arg.date.toISOString().slice(0, 10); // Mengambil bagian tanggal dari tanggal acara
                    var eventCount = eventCounts[date] || 0; // Mendapatkan jumlah acara untuk tanggal tersebut
                    var dayNumber = arg.date.getDate(); // Mendapatkan tanggal
                    var content = '<span class="fc-daygrid-day-number">' + dayNumber + '</span>';
                    if (eventCount > 0) {
                        content += '<span>' + eventCount + ' agenda</span>';
                    }
                    return { html: content };
                },
                eventClick: function (info) {
                    var selectedDate = info.event.start;
                    dayListCalendar.gotoDate(selectedDate); // Perbarui tampilan daftar agenda harian
                    dayListCalendar.changeView('listDay'); // Ubah tampilan ke assorted day list view
                },
                eventDisplay: 'none' // Menghilangkan deskripsi acara dari tampilan kalender bulan
            });
            calendar.render();

            // Inisialisasi FullCalendar untuk tampilan daftar agenda harian dengan berbagai jenis tampilan
            var dayListCalendar = new FullCalendar.Calendar(dayListEl, {
                initialView: 'listDay',
                events: data,
                headerToolbar: false,
            });
            dayListCalendar.render();

            // Menambahkan event click handler untuk tanggal pada kalender bulan
            calendar.on('dateClick', function (info) {
                var selectedDate = info.date;
                dayListCalendar.gotoDate(selectedDate); // Perbarui tampilan daftar agenda harian
                dayListCalendar.changeView('listDay'); // Ubah tampilan ke assorted day list view
            });
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
});
