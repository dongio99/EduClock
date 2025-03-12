<div wire:ignore>
    <div id="calendar"></div>
</div>

@push('styles')
    <style>
        .fc-toolbar-title {
            font-family: 'Instrument Sans', sans-serif !important;
            font-size: x-large !important;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: @json($calendarEvents),
                datesSet: function (info) {
                    Livewire.dispatch('updateCalendar', {
                        startDate: info.startStr,
                        endDate: info.endStr
                    });
                }
            });
            calendar.render();

            Livewire.on('calendarUpdated', function (events) {

                if (Array.isArray(events) && Array.isArray(events[0])) {
                    events = events[0];
                }
                if (events.length > 0) {
                    calendar.removeAllEvents();
                    calendar.addEventSource(events);
                }
            });

        });
    </script>
@endpush

