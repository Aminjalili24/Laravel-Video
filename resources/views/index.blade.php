@extends('layout')


@section('content')

<h1 class="new-video-title"><i class="fa fa-bolt"></i> آخرین ویدیو‌ها</h1>
<div class="row">

    <!-- video-item -->

    @foreach($videos as $video)

        <div class="col-lg-2 col-md-4 col-sm-6">
            <div class="video-item">
                <div class="thumb">
                    <div class="hover-efect"></div>
                    <small class="time">{{ $video->lengthInHuman }}</small>
                    <a href="{{ route('videos.show',$video->slug)  }}"><img
                                src="{{ $video->thumbnail }}"
                                alt=""></a>
                </div>
                <div class="video-info">
                    <a href="{{ route('videos.show',$video->slug)  }}" class="title">{{ $video->name }} </a>
                    <a href="{{ route('videos.edit',$video->slug) }}">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                    <a class="channel-name" href="#">{{ $video->owner_name }}<span>
                                    <i class="fa fa-check-circle"></i></span></a>
                    <span class="views"><i class="fa fa-eye"></i>2.8M بازدید </span>
                    <a href="{{ route('categories.videos.index',$video->category->slug) }} " ><span class=""><i class="fa fa-tag "></i>{{ $video->category->name }}</span></a>
                    <span class="date"><i class="fa fa-clock-o"></i>{{ $video->created_at}}</span>

                </div>
            </div>
        </div>
    @endforeach

</div>

        <h1 class="new-video-title"><i class="fa fa-bolt"></i> پربازدیدترین ویدیوها</h1>
        <div class="row">
            @foreach($mostPopularVideos as  $mostPopularVideo)
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="video-item">
                        <div class="thumb">
                            <div class="hover-efect"></div>
                            <small class="time">{{ $mostPopularVideo->lengthInHuman}}</small>
                            <a href="{{ route('videos.show',$mostPopularVideo->slug)  }}"><img
                                        src="https://loremflickr.com/446/240/world?random={{ random_int(1,20) }}"
                                        alt=""></a>
                        </div>
                        <div class="video-info">
                            <a href="{{ route('videos.show',$mostPopularVideo->slug)  }}" class="title">{{ $mostPopularVideo->description }} </a>
                            <a href="{{ route('videos.edit',$mostPopularVideo->slug) }}">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                            <a class="channel-name" href="#">{{ $mostPopularVideo->owner_name }}<span>
                                    <i class="fa fa-check-circle"></i></span></a>
                            <span class="views"><i class="fa fa-eye"></i>2.8M بازدید </span>
                            <a href="{{ route('categories.videos.index',$mostPopularVideo->category->slug) }}"><span class=""><i class="fa fa-tag "></i>{{ $mostPopularVideo->category->name }}</span></a>

                            <span class="date"><i class="fa fa-clock-o"></i>{{ $mostPopularVideo->created_at}}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <h1 class="new-video-title"><i class="fa fa-bolt"></i> محبوب‌ترین‌ها</h1>
        <div class="row">
            @foreach($mostViewedVideos as  $mostViewedVideo)
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="video-item">
                        <div class="thumb">
                            <div class="hover-efect"></div>
                            <small class="time">{{ $mostViewedVideo->lengthInHuman }}</small>
                            <a href="{{ route('videos.show',$mostViewedVideo->slug)  }}"><img
                                        src="https://loremflickr.com/446/240/world?random={{ random_int(1,20) }}"
                                        alt=""></a>
                        </div>
                        <div class="video-info">
                            <a href="{{route('videos.show',$mostViewedVideo->slug) }}" class="title">{{ $mostViewedVideo->description }} </a>
                            <a href="{{ route('videos.edit',$mostViewedVideo->slug) }}">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                            <a class="channel-name" href="#">{{ $mostPopularVideo->owner_name }}<span>
                                    <i class="fa fa-check-circle"></i></span></a>
                            <span class="views"><i class="fa fa-eye"></i>2.8M بازدید </span>
                            <a href="{{ route('categories.videos.index',$mostViewedVideo->category->slug) }}"><span class=""><i class="fa fa-tag "></i>{{ $mostViewedVideo->category->name }}</span></a>

                            <span class="date"><i class="fa fa-clock-o"></i>{{ $mostViewedVideo->created_at}}</span>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>


@endsection