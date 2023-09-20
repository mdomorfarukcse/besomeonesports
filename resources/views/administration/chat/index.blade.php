@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Messaging'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    .chat-list .chat-user-list li:hover{
        cursor: pointer;
        background-color: #ddd;
    }
    .chat-list .chat-user-list li.media.active {
        background-color: #ddd;
    }
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Messaging') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item text-capitalize active">{{ __('Messaging') }}</li>
@endsection



@section('content')

<!-- Start row -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-5 col-xl-4">
        <div class="chat-list">
            <div class="chat-search">
                <form>
                    <div class="input-group">
                        <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon3" />
                        <div class="input-group-append">
                            <button class="btn" type="submit" id="button-addon3"><i class="feather icon-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="chat-user-list">
                <ul class="list-unstyled mb-0">
                    @foreach ($teams as $team) 
                        <li class="media chat_team chat{{ $team->id }}" data-team_id = "{{ $team->id }}" data-team_name = "{{ $team->name }}" data-team_img = "{{ $team->logo }}" >
                            <img class="align-self-center rounded-circle" src="{{ show_avatar($team->logo) }}" alt="Generic placeholder image" />
                            <div class="media-body">
                                <h5>{{ $team->name }}<span class="badge badge-success ml-2">1</span> <span class="timing">Jan 22</span></h5>
                                <p>{{ $team->event->name }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <!-- End col -->
    <!-- Start col -->
    <div class="col-lg-7 col-xl-8">
        <div class="chat-detail">
            <div class="chat-head">
                <ul class="list-unstyled mb-0">
                    <li class="media">
                        <div id="team_avatar">

                        </div>
                        
                        <div class="media-body">
                            <h5 class="font-18" id="team_title"></h5>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="chat-body">
                <div class="chat-day text-center mb-3">
                    <span class="badge badge-secondary">Today</span>
                </div>
                <div class="chat-message chat-message-right">
                    <div class="chat-message-text">
                        <span>Hello! please, let me know the status about project after school.</span>
                    </div>
                    <div class="chat-message-meta">
                        <span>4:18 pm<i class="feather icon-check ml-2"></i></span>
                    </div>
                </div>
                <div class="chat-message chat-message-left">
                    <div class="chat-message-text">
                        <span>I have completed 4 stages 5 stages remaining.</span>
                    </div>
                    <div class="chat-message-meta">
                        <span>4:20 pm<i class="feather icon-check ml-2"></i></span>
                    </div>
                </div>
                <div class="chat-message chat-message-right">
                    <div class="chat-message-text">
                        <span>I request you to schedule demo at 3 pm after 2 days for the better progress.</span>
                    </div>
                    <div class="chat-message-meta">
                        <span>4:25 pm<i class="feather icon-check ml-2"></i></span>
                    </div>
                </div>
                <div class="chat-message chat-message-left">
                    <div class="chat-message-text">
                        <span>Sure, I will prepare for the same.</span>
                    </div>
                    <div class="chat-message-meta">
                        <span>4:27 pm<i class="feather icon-check ml-2"></i></span>
                    </div>
                </div>
                <div class="chat-message chat-message-right">
                    <div class="chat-message-text">
                        <span>Great. Thanks</span>
                    </div>
                    <div class="chat-message-meta">
                        <span>4:30 pm<i class="feather icon-clock ml-2"></i></span>
                    </div>
                </div>
            </div>
            <div class="chat-bottom">
                <div class="chat-messagebar">
                    <form>
                        <input type="hidden" name="team_id" value="" id="chat_team_id">
                        <input type="hidden" name="user_id" value="" id="chat_user_id">
                        <input type="hidden" name="team_name" value="" id="chat_team_name">
                        <input type="hidden" name="message_type" value="text" id="message_type">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="btn btn-secondary-rgba" type="button" id="button-addonmic"><i class="feather icon-mic"></i></button>
                            </div>
                            <input type="text" class="form-control" placeholder="Type a message..." aria-label="Text" name="message" id="message" />
                            <div class="input-group-append">
                                <button class="btn btn-secondary-rgba" type="submit" id="button-addonlink"><i class="feather icon-link"></i></button>
                                <button class="btn btn-primary-rgba" type="button" id="button-addonsend"><i class="feather icon-send"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End col -->
</div>

<!-- End row -->

@endsection


@section('script_links')
    {{--  External Javascript Links --}}   
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
        // Chat Team 
        $(".chat_team").click(function (event) {
            event.preventDefault();
            $this = $(this);

            $team_id = $this.data("team_id");
            $team_name = $this.data("team_name");
            $team_img = $this.data("team_img");
            $img_tag = '<img class="align-self-center mr-3 rounded-circle" id="team_avatar" src="{{ show_avatar('+$team_img+') }}" alt="Generic placeholder image" />';
            console.log($team_name);
            console.log($img_tag);
            console.log($team_img);
            $('#team_avatar').html($img_tag);
            $('#team_title').html($team_name);
            
            
            
            $.ajax({
                //create an ajax request to display.php
                type: "POST",
                url: "get_messages.php",
                data: { team_id: $team_id },
                dataType: "html",
                success: function (data) {
                    $modal = $("#historyModal");
                    $sat = data.change_status;
                    $content = "";
                    if (data.length == 0) {
                        $content = "<h2 class='alert alert-danger'>No record found</h2>";
                    }
                    for ($i = 0; $i < data.length; $i++) {
                        $content += "<div class='col-md-4'>";

                        $content += "<li>Date  - " + data[$i][0] + "</li>";
                        $content += "<li>Quantity: " + data[$i][1] + " Pcs</li>";

                        $content += "</div>";
                        // $content += "<li>"+ data[$i][$i]+"</li>";
                    }

                    $modal.find(".history").html($content);
                    $modal.find(".modal_header").html($itemname + " ( " + $model + ")");
                    $modal.modal("show");
                },
            });
        });

        $(".send_message").click(function (event) {
            event.preventDefault();
            $this = $(this);

            $team_id = $this.data("team_id");
            $team_name = $this.data("team_name");
            $team_img = $this.data("team_img");
            $img_tag = '<img class="align-self-center mr-3 rounded-circle" id="team_avatar" src="{{ show_avatar('+$team_img+') }}" alt="Generic placeholder image" />';
            console.log($team_name);
            console.log($img_tag);
            console.log($team_img);
            $('#team_avatar').html($img_tag);
            $('#team_title').html($team_name);
            
            
            
            $.ajax({
                //create an ajax request to display.php
                type: "POST",
                url: "get_messages.php",
                data: { team_id: $team_id },
                dataType: "html",
                success: function (data) {
                    $modal = $("#historyModal");
                    $sat = data.change_status;
                    $content = "";
                    if (data.length == 0) {
                        $content = "<h2 class='alert alert-danger'>No record found</h2>";
                    }
                    for ($i = 0; $i < data.length; $i++) {
                        $content += "<div class='col-md-4'>";

                        $content += "<li>Date  - " + data[$i][0] + "</li>";
                        $content += "<li>Quantity: " + data[$i][1] + " Pcs</li>";

                        $content += "</div>";
                        // $content += "<li>"+ data[$i][$i]+"</li>";
                    }

                    $modal.find(".history").html($content);
                    $modal.find(".modal_header").html($itemname + " ( " + $model + ")");
                    $modal.modal("show");
                },
            });
        });

    </script>
@endsection
