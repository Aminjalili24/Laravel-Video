@extends('layout')


@section('content')

<h1 class="new-video-title"><i class="fa fa-bolt"></i> {{ $category->name }}</h1>
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
                    <a href="{{ route('categories.videos.index',$video->category->slug) }}"><span class=""><i class="fa fa-tag "></i>{{ $video->category->name }}</span></a>

                    <span class="date"><i class="fa fa-clock-o"></i>{{ $video->created_at}}</span>

                </div>
            </div>
        </div>
    @endforeach

</div>


<div class="text-center" dir="ltr">
    {{ $videos->links() }}

</div>

@endsection