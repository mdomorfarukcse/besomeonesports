@forelse ($messages as $message)
    @php
        if($message->user->id === auth()->user()->id){
            $position = "right";
        } else {
            $position = "left";
        }
    @endphp
    <div class="chat-message chat-message-{{ $position }}">
        @if($message->type === 'image')
            <a data-fancybox="wk" href="{{ show_avatar($message->message) }}" class="comon-links-divb05">
                <figure>
                    <img src="{{ show_avatar($message->message) }}" alt="{{ $message->message }}" class="img-fluid " width="100"/>
                </figure>
            </a>
        @else
            <div class="chat-message-text">
                <span>{{ $message->message }}</span>
            </div>
        @endif
        <div class="chat-message-meta">
            @if ($message->user->id != auth()->user()->id) 
                <span><i class="feather icon-user mr-2"></i>{{ $message->user->name }}</span>
            @endif
            <span><i class="feather icon-clock mr-2"></i>{{ date_time_ago($message->created_at) }}</span>
        </div>
    </div>
@empty
    <h4 class="text-muted">No Message Found</h4>
@endforelse