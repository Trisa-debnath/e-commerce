<div>
    <div class="mt-4">

        {{-- Flash messages --}}
        @if (session()->has('message'))
            <div class="alert alert-success mt-2">{{ session('message') }}</div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-warning mt-2">{{ session('error') }}</div>
        @endif

        {{-- Comments header --}}
        <h5>
            💬 Comments 
            <button wire:click="toggleComments" class="btn btn-link p-0 ms-2">
                @if($showComments)
                    Hide
                @else
                    Show
                @endif
            </button>
        </h5>

        {{-- Add new comment --}}
        @auth
            @if($this->hasPurchased())
                <div class="mb-3">
                    <textarea wire:model="newComment" class="form-control" rows="1" placeholder="Write a comment..."></textarea>
                    <button wire:click="addComment" class="btn btn-primary btn-sm mt-2">Post</button>
                </div>
            @else
                <p class="text-warning">You can only comment after purchasing this product.</p>
            @endif
        @else
            <p><a href="{{ route('login') }}">Login</a> to comment.</p>
        @endauth

        {{-- Display comments --}}
        @if ($showComments)
            @foreach ($comments as $comment)
                <div class="border rounded p-2 mb-2">
                    <strong>{{ $comment->user->name ?? 'Anonymous' }}</strong>:
                    <p>{{ $comment->content }}</p>

                    {{-- Reply button for purchased users --}}
                    @auth
                        @if($this->hasPurchased())
                            <button class="btn btn-link p-0 text-primary" wire:click="setReply({{ $comment->id }})">Reply</button>
                        @endif
                    @endauth

                    {{-- Delete button --}}
                    @if(auth()->id() === $comment->user_id)
                        <button class="btn btn-link text-danger p-0 ms-2" wire:click="deleteComment({{ $comment->id }})">🗑</button>
                    @endif

                    {{-- Replies --}}
                    @foreach ($comment->replies as $reply)
                        <div class="ms-4 border-start ps-2 mt-2">
                            <strong>{{ $reply->user->name ?? 'Anonymous' }}</strong>:
                            <p>{{ $reply->content }}</p>

                            @if(auth()->id() === $reply->user_id)
                                <button class="btn btn-link text-danger p-0 ms-2" wire:click="deleteComment({{ $reply->id }})">🗑</button>
                            @endif
                        </div>
                    @endforeach

                    {{-- Reply textarea --}}
                    @if ($replyTo === $comment->id && $this->hasPurchased())
                        <div class="ms-3 mt-2">
                            <textarea wire:model="replyComment" class="form-control form-control-sm" rows="1" placeholder="Write a reply..."></textarea>
                            <button wire:click="addReply" class="btn btn-success btn-sm mt-1">Send Reply</button>
                        </div>
                    @endif

                </div>
            @endforeach
        @endif

    </div>
</div>
