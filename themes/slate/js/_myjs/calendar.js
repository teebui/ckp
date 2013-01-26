
jQuery( ".date" ).datepicker({
                dateFormat: "dd-mm-yy",
                showStatus: true,
                showWeeks: true,
                highlightWeek: true,
                numberOfMonths: 1,
                selectOtherMonths: true,
                changeMonth: true,
                changeYear: true,
                monthNamesShort: ['Tháng 1','Tháng 2','Tháng 3','Tháng 4','Tháng 5','Tháng 6','Tháng 7','Tháng 8','Tháng 9','Tháng 10','Tháng 11','Tháng 12',],
                prevText: "Tháng trước",
                nextText: "Tháng tiếp"


            });

jQuery(function () {
	
    jQuery('#datepicker-inline').datepicker ();
    jQuery('.datepicker').datepicker ({
                dateFormat: "dd-mm-yy",
                showStatus: true,
                showWeeks: true,
                highlightWeek: true,
                numberOfMonths: 1,
                selectOtherMonths: true,
                changeMonth: true,
                changeYear: true,
                monthNamesShort: ['Tháng 1','Tháng 2','Tháng 3','Tháng 4','Tháng 5','Tháng 6','Tháng 7','Tháng 8','Tháng 9','Tháng 10','Tháng 11','Tháng 12',],
                prevText: "Tháng trước",
                nextText: "Tháng tiếp",
                yearRange: "c-30:c+30"


            });

    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    jQuery('#calendar-holder').fullCalendar({
            header: {
                    left: 'prev, next',
                    center: 'title',
                    right: 'month,basicWeek,basicDay,'
            },
            events: [
                    {
                            title: 'Long Event',
                            start: new Date(y, m, d-5),
                            end: new Date(y, m, d-2),
                            color: Slate.chartColors[1]
                    },
                    {
                            id: 999,
                            title: 'Repeating Event',
                            start: new Date(y, m, 19, 16, 0),
                            end: new Date (y, m, 22, 16, 0),
                            allDay: false,
                            color: Slate.chartColors[1]
                    },
                    {
                            id: 999,
                            title: 'Repeating Event',
                            start: new Date(y, m, d+4, 16, 0),
                            end: new Date(y, m, d+6, 16, 0),
                            allDay: false,
                            color: Slate.chartColors[0]
                    },
                    {
                            title: 'Meeting',
                            start: new Date(y, m, d, 10, 30),
                            allDay: false,
                            color: Slate.chartColors[1]
                    },
                    {
                            title: 'Lunch',
                            start: new Date(y, m, d, 12, 0),
                            end: new Date(y, m, d, 14, 0),
                            allDay: false,
                            color: Slate.chartColors[0]
                    },
                    {
                            title: 'Birthday Party',
                            start: new Date(y, m, d+1, 19, 0),
                            end: new Date(y, m, d+1, 22, 30),
                            allDay: false,
                            color: Slate.chartColors[0]
                    },
                    {
                            title: 'Click for Google',
                            start: new Date(y, m, 28),
                            end: new Date(y, m, 29),
                            url: '../../../google.com/default.htm',
                            color: Slate.chartColors[0]
                    }
            ]
    });

});