<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Post;

class LastPost extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $post_new = Post::where([['status', '=', '1'],['type', '=', 'post']])
        ->orderBy('created_at', 'desc') // mới nhất
        ->limit(4) // giới hạn
        ->get();
        return view('components.last-post',compact('post_new'));
    }
}
