<div class="message-body" wire:poll.10000ms>
    @foreach ($message as $item)
        @if (Auth::user()->id === $item->sender_id)
            <div class="message-body-sender equare">{{ $item->message }} {{ Auth::user()->id }}</div>
        @else
            <div class="message-body-receiver equare">{{ $item->message }} {{ $postUserId }}</div>
        @endif
    @endforeach
</div>
