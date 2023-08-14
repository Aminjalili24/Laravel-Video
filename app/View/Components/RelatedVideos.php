<?php

namespace App\View\Components;

use App\Models\Video;
use Illuminate\View\Component;

class RelatedVideos extends Component
{
    public $videos;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($video)
    {

        $video = Video::query()->findOrFail($video);

        $this->videos = $video->RelatedVideos(9)->load('user');

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.related-videos');
    }
}
