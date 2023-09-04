@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Schedule'))

@section('css_links')
    {{--  External CSS  --}}
    <link href="{{ asset("assets/plugins/fullcalendar/css/fullcalendar.min.css") }}" rel="stylesheet" />
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Schedule') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize active">{{ __('Schedule') }}</li>
@endsection



@section('content')

<!-- Start row -->
<div class="row">
    <!-- Start col -->
    <div class="col-12">
        <div class="row">
            <div class="col-md-8 col-lg-9 col-xl-10">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-3 col-xl-2">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Created Events</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" id="add_event_form" class="m-t-5 m-b-20">
                            <input type="text" class="form-control new-event-form" placeholder="Add new event..." />
                        </form>

                        <div id="external-events">
                            <h4 class="m-b-15 font-16">Draggable Events</h4>
                            <div class="fc-event">Birthday</div>
                            <div class="fc-event">Sports</div>
                            <div class="fc-event">Holiday</div>
                            <div class="fc-event">Break Time</div>
                            <div class="fc-event">Lunch</div>
                        </div>

                        <!-- checkbox -->
                        <div class="custom-control custom-checkbox mt-3">
                            <input type="checkbox" class="custom-control-input" id="drop-remove" data-parsley-multiple="groups" data-parsley-mincheck="2" />
                            <label class="custom-control-label" for="drop-remove">Remove after drop</label>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
    <!-- End col -->
</div>

<!-- End row -->

<div class="modal fade" id="eventmodal" tabindex="-1" role="dialog" aria-labelledby="eventmodal">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row border1px">
                    <div class="col-md-12">
                        <h4 class="">Add New Schedule</h4>
                        
                        <form action="" method="POST" class="row">
                            <div class="form-group  col-md-4">
                                <label for="">Date</label>
                                <input type="date" class="form-control" value="" name="start_date" id="start_date" required />
                            </div>
                            <div class="form-group  col-md-4">
                                <label for="">Start Start</label>
                                <input type="time" class="form-control" value="" name="start_date" id="start_date" required />
                            </div>
                            <div class="form-group  col-md-4">
                                <label for="">End Time</label>
                                <input type="time" class="form-control" value="" name="end_date" id="end_date" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Choose A Event</label>
                                <select class="select2-single form-control" name="event_id" required>
                                    <option value="">Select Status</option>
                                    <option value="Active" selected>Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                            <div class="form-group  col-md-3">
                                <label for="">Team 1</label>
                                <select class="select2-single form-control" name="team_one" required>
                                    <option value="">Select Status</option>
                                    <option value="Active" selected>Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                            <div class="form-group  col-md-3">
                                <label for="">Team 2</label>
                                <select class="select2-single form-control" name="team_two" required>
                                    <option value="">Select Status</option>
                                    <option value="Active" selected>Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                            <div class="form-group  col-md-6">
                                <label for="">Venue</label>
                                <select class="select2-single form-control" name="venue_id" required>
                                    <option value="">Select Status</option>
                                    <option value="Active" selected>Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                            <div class="form-group  col-md-6">
                                <label for="">Court</label>
                                <select class="select2-single form-control" name="court_id" required>
                                    <option value="">Select Status</option>
                                    <option value="Active" selected>Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" id="eventbtn" name="eventbtn" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="actionmodal" tabindex="-1" role="dialog" aria-labelledby="actionmodal">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title myModalLabel">Event Plan Action</h4>
            </div>
            <div class="modal-body">
                <div class="row border1px">
                    <div class="col-md-12 text-center">
                        <h3 id="">Event Actions</h3>
                        <form action="" method="POST">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="form-group">
                                    <input type="hidden" value="" id="event_editid" name="event_editid" />
                                    <input type="text" class="form-control" name="event_name" value="" id="event_name" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="button" id="eventupdate_btn" name="eventupdate_btn" class="btn btn-success">Update</button>
                                <button type="button" id="eventdelete_btn" name="eventdelete_btn" class="btn btn-danger">Delete</button>
                                <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('script_links')
    {{--  External Javascript Links --}}   
     <!-- jQuery UI -->
     <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
     <script src="{{ asset('assets/plugins/moment/moment.js') }}"></script>   
    <!-- Events js -->
    <script src='{{  asset("assets/plugins/fullcalendar/js/fullcalendar.min.js") }}'></script>
    {{-- <script src="{{  asset("assets/js/custom/custom-calender.js") }}"></script> --}}
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
        $(document).ready(function () {
            var calendar = $("#calendar").fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay'
                },
                editable: true,
                eventLimit: true, /* -- allow "more" link when too many events -- */
                droppable: true, /* -- this allows things to be dropped onto the calendar !!! -- */
                drop: function(date, allDay) { /* -- this function is called when something is dropped -- */
                    /* -- retrieve the dropped element's stored Event Object -- */
                    var originalEventObject = $(this).data('eventObject');
                    /* -- we need to copy it, so that multiple events don't have a reference to the same object -- */
                    var copiedEventObject = $.extend({}, originalEventObject);
                    /* -- assign it the date that was reported -- */
                    copiedEventObject.start = date;
                    copiedEventObject.allDay = allDay;
                    /* -- render the event on the calendar -- */
                    /* -- the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/) -- */
                    $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
                    /* -- is the "remove after drop" checkbox checked? -- */
                    if ($('#drop-remove').is(':checked')) {
                        /* -- if so, remove the element from the "Draggable Events" list -- */
                        $(this).remove();
                    }
                },
                events: "calender_events.php",
                displayEventTime: false,
                eventRender: function (event, element, view) {
                    if (event.allDay === "true") {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                },
                selectable: true,
                selectHelper: true,
                select: function (start, end, allDay) {
                   
                    if (start !== "") {
                        $("#eventmodal").modal("show");
                        $("#start_date").val(start);
                        $("#end_date").val(end);
                    }
                    calendar.fullCalendar("unselect");
                },

                editable: true,
                eventDrop: function (event, delta) {
                    $.ajax({
                        url: "calender_events.php",
                        data: "title=" + event.title + "&start=" + start + "&end=" + end + "&id=" + event.id + "&type=edit",
                        type: "POST",
                        success: function (response) {
                            displayMessage("Updated Successfully");
                        },
                    });
                },
                eventClick: function (event) {
                    $("#actionmodal").modal("show");
                    $event_id = event.id;
                    $event_name = event.title;
                    $("#event_editid").val($event_id);
                    $("#event_name").val($event_name);
                },
            });
        });

    </script>
@endsection
