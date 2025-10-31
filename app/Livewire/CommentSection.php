<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentSection extends Component
{
  public $product;
    public $newComment = '';
    public $replyComment = '';
    public $replyTo = null;
    public $showComments = false;

    protected $rules = [
        'newComment' => 'required|string|max:500',
        'replyComment' => 'nullable|string|max:500',
    ];

    public function addComment()
    {

$this->validate(['newComment' => 'required']);

       if (!Auth::check()) {
        session()->flash('error', 'You must be logged in to comment.');
        return;
    }
        Comment::create([
            'product_id' => $this->product->id,
             'user_id' => Auth::id(),
            'content' => $this->newComment,
        ]);


        $this->newComment = '';
    }

    public function setReply($commentId)
    {
        $this->replyTo = $commentId;
    }

    public function toggleComments()
{
    $this->showComments = !$this->showComments;
}


    public function addReply()
    {
        $this->validate(['replyComment' => 'required']);

        Comment::create([
            'product_id' => $this->product->id,
             'user_id' => Auth::id(),
            'parent_id' => $this->replyTo,
            'content' => $this->replyComment,
        ]);

        $this->replyComment = '';
        $this->replyTo = null;
    }


    public function render()
    {

 $comments = $this->product->comments()->latest()->get();
        return view('livewire.comment-section', compact('comments'));
    }
}
