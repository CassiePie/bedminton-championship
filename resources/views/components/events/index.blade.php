<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    <div class="p-6 bg-white border-b border-gray-200">
        <h1 class="mt-8 text-2xl font-medium text-gray-900">
            {{ __('Events') }}
        </h1>
    </div>

    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    </head>

<div class="bg-gray-200 bg-opacity-25 lg:gap-8 p-6 lg:p-8">

    <body>

        <div class="container">
            <div id='calendar'></div>
        </div>

        <div class="my-4">
            <p>
                <ul>
                    <li>
                        By default, the calendar displays events for the current month. Use the navigation buttons at the top of the calendar to switch between months.
                    </li>
                    <li>
                        Click on a day or select multiple days to add an event. 
                    </li>
                    <li>
                        Click on the event to delete.
                    </li>
                    <li>
                        Drag and drop to change day.
                    </li>
                </ul>
            </p>
        </div>
        <script>
            $(document).ready(function () {
                var SITEURL = "{{ url('/') }}";

                $.ajaxSetup({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                });

                var calendar = $('#calendar').fullCalendar({
                    editable: true,
                    events: SITEURL + "/fullcalender",
                    displayEventTime: false,
                    editable: true,

                    eventRender: function (event, element, view) {
                        if (event.allDay === 'true') {
                                event.allDay = true;
                        } else {
                                event.allDay = false;
                        }
                    },

                    selectable: true,
                    selectHelper: true,

                    select: function (start, end, allDay) {
                        var title = prompt('Event Title:');
                        if (title) {
                            var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                            var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
                            $.ajax({
                                url: SITEURL + "/fullcalenderAjax",
                                data: {
                                    title: title,
                                    start: start,
                                    end: end,
                                    type: 'add'
                                },

                                type: "POST",
                                success: function (data) {
                                    displayMessage("Event Created Successfully");
                                    calendar.fullCalendar('renderEvent',
                                        {
                                            id: data.id,
                                            title: title,
                                            start: start,
                                            end: end,
                                            allDay: allDay
                                        },
                                        true
                                    );

                                    calendar.fullCalendar('unselect');
                                }
                            });
                        }
                    },

                    eventDrop: function (event, delta) {
                        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
                        $.ajax({
                            url: SITEURL + '/fullcalenderAjax',
                            data: {
                                title: event.title,
                                start: start,
                                end: end,
                                id: event.id,
                                type: 'update'
                            },

                            type: "POST",
                            success: function (response) {
                                displayMessage("Event Updated Successfully");
                            }
                        });
                    },

                    eventClick: function (event) {
                        var deleteMsg = confirm("Do you really want to delete?");
                        if (deleteMsg) {
                            $.ajax({
                                type: "POST",
                                url: SITEURL + '/fullcalenderAjax',
                                data: {
                                        id: event.id,
                                        type: 'delete'
                                },

                                success: function (response) {
                                    calendar.fullCalendar('removeEvents', event.id);
                                    displayMessage("Event Deleted Successfully");
                                }
                            });
                        }
                    }
                });
            });

            function displayMessage(message) {
                toastr.success(message, 'Event');
            } 

        </script>
    </body>
</div>


        
        

        