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
    .chat-user-list{
        height: calc(80vh - 50px);
        overflow-y: scroll;
    }
    .chat-body {
        height: calc(65vh - 60px);
        overflow-y: scroll;
    }
    .chat-user-list::-webkit-scrollbar,.chat-body::-webkit-scrollbar {
        width: 5px;
    }

    .chat-user-list::-webkit-scrollbar-track, .chat-body::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    .chat-user-list::-webkit-scrollbar-thumb, .chat-body::-webkit-scrollbar-thumb {
        background: #007bff;
    }

    .chat-user-list::-webkit-scrollbar-thumb:hover, .chat-body::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    .chat-user-list::-webkit-scrollbar-button,.chat-body::-webkit-scrollbar-button {
        display: none;
    }
    .team-logo{
        width: 30px;
        height: 30px;
    }
    .chat-list .chat-user-list li img {
        height: 35px;
    }
    .breadcrumbbar, .footerbar {
        display: none;
    }
    .contentbar{
        margin-top: 60px; 
    }
    </style>
@endsection



@section('content')

<!-- Start row -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-5 col-xl-4">
        <div class="chat-list">
            <div class="chat-user-list">
                <h5 class="alert alert-primary">Teams</h5>
                <ul class="list-unstyled mb-0">
                    @foreach ($teams as $team) 
                        <li class="media chat_team chat{{ $team->id }}" data-team_id="{{ $team->id }}" data-team_name="{{ $team->name }}" data-team_img="{{ show_avatar($team->logo) }}" >
                            <img class="align-self-center rounded-circle" src="{{ show_avatar($team->logo) }}" alt="Generic placeholder image" />
                            <div class="media-body">
                                <h5>{{ $team->name }}</h5>
                                <p>{{ $team->league->name }}</p>
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
                <h4>No Message</h4>
            </div>
            <div class="chat-bottom">
                <div class="chat-messagebar">
                    <form autocomplete="off" id="messageForm" method="POST" action="{{ route('administration.chat.store') }}">
                        @csrf
                        <input type="hidden" name="team_id" value="" id="chat_team_id">
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}" id="chat_user_id" >
                        <input type="hidden" name="team_name" value="" id="chat_team_name">
                        <input type="hidden" name="message_type" value="text" id="message_type">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Type a message..." aria-label="Text" name="message" id="message" />
                            <div class="input-group-append">
                                <button class="btn btn-secondary-rgba" type="button" id="button-addonlink"><i class="feather icon-link"></i></button>
                                <button class="btn btn-primary-rgba" type="submit" id="msgsendbtn"><i class="feather icon-send"></i></button>
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
        $(".chat-bottom").hide();
        $(".chat_team").click(function (event) {
            event.preventDefault();
            $this = $(this);
            $(".chat-user-list li").removeClass("active");
            $(".chat-bottom").show();
            var user_id = $('#user_id').val();;
            var team_id = $this.data("team_id");
            var team_name = $this.data("team_name");
            var team_img = $this.data("team_img");
            var img_tag = `<img class="team-logo align-self-center mr-3 rounded-circle" id="team_avatar" src="${team_img}" alt="Generic placeholder image" />`;

            $('#team_avatar').html(img_tag);
            $('#team_title').html(team_name);
            $('#chat_team_id').val(team_id);
            $('#chat_team_name').val(team_name);
            $(".chat"+team_id).addClass("active");
            
            
            $.ajax({
                //create an ajax request to display.php
                type: "GET",
                url: `/administration/chat/show/${team_id}`,
                dataType: "html",
                success: function (data) {
                    $('.chat-body').html(data);
                },
            });
        });


    </script>
    <script>
        $(document).ready(function() {
            $('#messageForm').on('submit', function(e) {
                e.preventDefault(); // Prevent the form from submitting

                $this = $(this);
            
                $.ajax({
                    //create an ajax request to display.php
                    type: "POST",
                    url: $this.attr('action'),
                    data: $this.serialize(),
                    dataType: "html",
                    success: function (data) {
                        $('.chat-body').html(data);
                        $this.trigger('reset');
                    },
                });
            });

            // Listen for the Enter key press and prevent form submission
            // $('#messageForm').on('keydown', function(e) {
            //     if (e.key === 'Enter') {
            //         e.preventDefault();
            //     }
            // });
        });
    </script>
    <script>
        // Function to scroll to the bottom of a scrollable element using jQuery
        function scrollToBottom(elementSelector) {
            var $element = $("." + elementClass);
            $element.scrollTop($element.prop("scrollHeight"));
        }

        $(document).ready(function () {
            // Initially scroll to the bottom
            scrollToBottom("chat-body");
        });
    </script>
    <script>
        // Auto Refresh messages
        function refreshMessages() {
            // Replace this with your actual function code
            var team_id = $('#chat_team_id').val();
            if(team_id !== ''){
                $.ajax({
                    //create an ajax request to display.php
                    type: "GET",
                    url: `/administration/chat/show/${team_id}`,
                    dataType: "html",
                    success: function (data) {
                        $('.chat-body').html(data);
                    },
                });
            }
        }

        // Run the function every three seconds
        var intervalId = setInterval(refreshMessages, 10000);

        // To stop the interval after a certain number of iterations (e.g., 5 times), you can use a counter:
        var counter = 0;
        var maxIterations = 5;

        var intervalId2 = setInterval(function() {
        if (counter < maxIterations) {
            refreshMessages();
            counter++;
        } else {
            clearInterval(intervalId2);
            console.log("Interval stopped after " + maxIterations + " iterations.");
        }
        }, 10000);
    </script>
@endsection
