<div class="card">
    <div class="card-body table-responsive p-0">
        <div class="card card-primary">
            <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>



<script>
    var site = "<?php echo base_url() ?>";
    $(function () {
        function ini_events(ele) {
            ele.each(function () {
                var eventObject = {
                    title: $.trim($(this).text())
                }
                $(this).data('eventObject', eventObject)
                $(this).draggable({
                    zIndex        : 1070,
                    revert        : true, 
                    revertDuration: 0
                })

            })
        }

        var date = new Date();
        var d    = date.getDate();
        m    = date.getMonth();
        y    = date.getFullYear();

        var Calendar = FullCalendar.Calendar;
        var Draggable = FullCalendarInteraction.Draggable;
        var checkbox = document.getElementById('drop-remove');
        var calendarEl = document.getElementById('calendar');

        var calendar = new Calendar(calendarEl, {
            plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
            header    : {
                left  : 'prev,next today',
                center: 'title',
                right : 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: site+"internal/kalender_kegiatan/getKegiatan",
            editable  : true,
            droppable : true, 
            selectable: true,
            selectHelper: true,
            eventClick: function(info) {
                alert('Kegiatan: ' + info.event.title);
                // alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
                // alert('View: ' + info.view.type);

                // change the border color just for fun
                // info.el.style.borderColor = 'red';
            },
            drop      : function(info) {
                if (checkbox.checked) {
                    info.draggedEl.parentNode.removeChild(info.draggedEl);
                }
            }
        });


        calendar.render();
        var currColor = '#3c8dbc'
        var colorChooser = $('#color-chooser-btn')
        $('#color-chooser > li > a').click(function (e) {
            e.preventDefault()
            currColor = $(this).css('color')
            $('#add-new-event').css({
                'background-color': currColor,
                'border-color'    : currColor
            })
        })
    })
</script>