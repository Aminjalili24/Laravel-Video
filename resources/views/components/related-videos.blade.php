<div id="related-posts">

    <!-- video item -->
    @foreach($videos as $video)
        <div class="related-video-item">
            <div class="thumb">
                <small class="time">{{ $video->lengthInHuman }}</small>
                <a href="{{route('videos.show',$video->slug) }}"><img src="{{ $video->thumbnail }}" alt=""></a>

            </div>
            <a href="{{ route('videos.show',$video->slug)  }}" class="title">{{ $video->name }}</a>
            <a href="{{ route('videos.edit',$video->slug) }}">
                <i class="fa fa-pencil" aria-hidden="true"></i>
            </a>
            <p><a href="{{ route('categories.videos.index',$video->category->slug) }}" ><span class=""><i class="fa fa-tag "></i>{{ $video->category->name }}</span></a></p>

            <a class="channel-name" href="#">{{ $video->owner_name }}<span>
                                    <i class="fa fa-check-circle"></i></span></a>

        </div>
        <!-- // video item -->
    @endforeach
</div>