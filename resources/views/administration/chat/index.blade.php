@extends('layouts.administration.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Messaging'))

@section('css_links')
    {{--  External CSS  --}}
    <link href="{{ asset('frontend/css/jquery.fancybox.min.css') }}" type="text/css" rel="stylesheet"/>
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
            background-color: #e5ffea;
        }
        .chat-user-list{
            height: calc(80vh - 50px);
            overflow-y: scroll;
        }
        .chat-body {
            height: calc(65vh - 60px);
            overflow-y: scroll;
            scroll-behavior: smooth;
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
    
        /* Image Upload */
        .avatar-upload {
            position: relative;
            max-width: 205px;
            margin: 50px auto;
        }
        .avatar-upload .avatar-edit {
            position: absolute;
            right: 12px;
            z-index: 1;
            top: 10px;
        }
        .avatar-upload .avatar-edit input {
            display: none;
        }
        .avatar-upload .avatar-edit input + label {
            display: inline-block;
            width: 34px;
            height: 34px;
            background: #ffffff;
            border: 1px solid;
            border-color: #a1a1a1;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            font-weight: normal;
            transition: all 0.2s ease-in-out;
        }
        .avatar-upload .avatar-edit input + label:hover {
            background: #d8d8d8;
            border-color: #a1a1a1;
        }
        .avatar-upload .avatar-edit input + label:after {
            content: "\f040";
            font-family: "FontAwesome";
            color: #757575;
            position: absolute;
            top: 5px;
            left: 0;
            right: 0;
            text-align: center;
            margin: auto;
        }
        .avatar-upload .avatar-preview {
            width: 192px;
            height: 192px;
            position: relative;
            border-radius: 100%;
            border: 6px solid #f8f8f8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }
        .avatar-upload .avatar-preview > div {
            width: 100%;
            height: 100%;
            border-radius: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .chat-user-list {
            position: relative !important;
        }

        .alert-primary.chat-width-teams {
            position: sticky;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1;
            margin-bottom: 0px;
            background-color: rgb(214 235 255);
            border-color: rgb(214 235 255);
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
                <h5 class="alert alert-primary chat-width-teams">Chat with Teams</h5>
                <ul class="list-unstyled mb-0">
                    @foreach ($teams as $team) 
                        <li class="media chat_team chat{{ $team->id }}" data-team_id="{{ $team->id }}" data-team_name="{{ $team->name }}" data-team_img="{{ show_image($team->logo) }}" >
                            <img class="align-self-center rounded-circle" src="{{ show_image($team->logo) }}" alt="Generic placeholder image" />
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
            <div class="chat-body" id="chatBody">
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
                                <button class="btn btn-secondary-rgba" type="button" id="chat_file"><i class="feather icon-link"></i></button>
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

<!-- Modal -->
<div class="modal fade" id="fileModal" tabindex="-1" aria-labelledby="fileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fileModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form autocomplete="off" id="fileForm" method="POST" action="{{ route('administration.chat.imageupload') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type="file" id="chatAvatar" name="avatar" accept=".png, .jpg, .jpeg" />
                                    <label for="chatAvatar"></label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview" style="background-image: url(https://fakeimg.pl/500x500);"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="team_id" value="" id="chat_file_team_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection


@section('script_links')
    {{--  External Javascript Links --}}   
    <script src="{{ asset('frontend/js/jquery.fancybox.min.js') }}"></script>
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Function to scroll to the bottom of the chat body
        function scrollToBottom() {
            const chatBody = $('.chat-body');
            chatBody.scrollTop(chatBody.prop('scrollHeight'));
        }
    
        // Function to load messages for a team
        function loadMessages(teamId) {
            $.ajax({
                type: "GET",
                url: `/administration/chat/show/${teamId}`,
                dataType: "html",
                success: function (data) {
                    $('.chat-body').html(data);
                    scrollToBottom(); // Scroll to the bottom after loading messages
                },
            });
        }
    
        // Chat Team 
        $(".chat-bottom").hide();
        $(".chat_team").click(function (event) {
            event.preventDefault();
            $this = $(this);
            $(".chat-user-list li").removeClass("active");
            $(".chat-bottom").show();
            var user_id = $('#user_id').val();
            var team_id = $this.data("team_id");
            var team_name = $this.data("team_name");
            var team_img = $this.data("team_img");
            var img_tag = `<img class="team-logo align-self-center mr-3 rounded-circle" id="team_avatar" src="${team_img}" alt="Generic placeholder image" />`;
    
            $('#team_avatar').html(img_tag);
            $('#team_title').html(team_name);
            $('#chat_team_id').val(team_id);
            $('#chat_team_name').val(team_name);
            $(".chat" + team_id).addClass("active");
    
            loadMessages(team_id); // Load messages for the selected team
        });
    
        $("#chat_file").click(function (event) {
            event.preventDefault();
            $this = $(this);
            $('#fileModal').modal('show');
            $('#fileModalLabel').html($('#chat_team_name').val());
            $('#chat_file_team_id').val($('#chat_team_id').val());
        });
    </script>
    


    <script>
        // File Uploder
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#chatAvatar").change(function() {
            readURL(this);
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
            $('#fileForm').on('submit', function(e) {
                e.preventDefault(); // Prevent the form from submitting

                $this = $(this);
                
                $.ajax({
                    //create an ajax request to display.php
                    type: "POST",
                    url: $this.attr('action'),
                    data: new FormData(this),
                    dataType: "html",
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function (data) {
                        $('.chat-body').html(data);
                        $this.trigger('reset');
                        $('#fileModal').modal('hide');
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
