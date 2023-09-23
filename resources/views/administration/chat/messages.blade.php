@forelse ($messages as $message)
    @php
        if($message->user->id === auth()->user()->id){
            $position = "right";
        } else {
            $position = "left";
        }
    @endphp
    <div class="chat-message chat-message-{{ $position }}">
        <div class="chat-message-text">
            <span>{{ $message->message }}</span>
        </div>
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