@inject('provider', 'App\Services\UserPerformance')

@extends('layouts.main')
<!-- {{--<style>--}}
{{--    .nav-logout {--}}
{{--        color: #21262b !important;--}}
{{--    }--}}
{{--    .nav-logout {--}}
{{--        background-color: #53cea0;--}}
{{--        color: white !important;--}}
{{--    }--}}
{{--</style>--}} -->

@section('styles-files')
 	<!-- <link href="{{ asset ('theme/css/contact/style.css') }}" rel="stylesheet">
 	<link href="{{ asset ('theme/common/css/style.css') }}" rel="stylesheet">
 	 -->
    <link href="{{ asset ('theme/common/default.css') }}" rel="stylesheet">
 	<link href="{{ asset ('theme/topics/css/responsive-web-design.css') }}" rel="stylesheet">
 @endsection

@section('content')

<section>
    <div class="hero pb-5">
        <div class="container-mask">
            <div class="row">
                <div class="col-12">
                    <div class="top-img">
                        <img src="{{ asset('theme/images/h-top.png') }}" alt="top-img">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="single-bg">
        <div class="container-mask">
            <div class="row">
                <div class="col-lg-6 col-sm-8 col-9">
                    <div class="title py-4">
                        <div class="title-img float-start">
                            @if($course->image)
                                <img src="{{ asset('images/'.$course->image) }}" alt="responsive-web-design">
                            @else
                                <img src="{{ asset ('theme/topics/images/web-design/html5.png') }}" alt="responsive-web-design">
                            @endif
                        </div>
                        <div class="title-info overflow-hidden">
                            <h2>{{$course->course_title}} </h2>
                            <a href="{{ route('courses') }}">Course Menu</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-4 col-3">
                    <div class="profile">
                        <img class="p-img" src="{{ asset ('theme/topics/images/web-design/empty.png') }}" alt="user">
                        <span>&nbsp;</span>
                        <div class="after">
                            <img src="{{ asset ('theme/topics/images/web-design/after.png') }}" alt="after">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="overview pt-2 pb-4">
                        <span> <img src="{{ asset ('theme/topics/images/web-design/box.png') }}" alt="square-box"> Overview</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    @foreach ($topics as $topic)
                    <div class="wrapper mb-4">
                        <div class="course bg-white py-4 px-3 mb-1">
                            <div class="course-heading mb-4">
                                <h3>{{$topic->topic_title}}</h3>
                            </div>
                            <div class="course-description">
                                <p>{{$topic->topic_intro}}</p>
                            </div>
                        </div>
                        <div class="course-content bg-white">
                            <div class="course-collapse d-flex justify-content-between p-3 topic-collapse-{{ $topic->id }}" data-id="{{ $topic->id }}">
                                <div class="left-item">
                                    <p class="open expand-{{ $topic->id }}"><i class="fas fa-caret-right"></i> Expand Course</p>
                                    <p class="close collapse-{{ $topic->id }}"><i class="fas fa-caret-down"></i> Collapse Course</p>
                                </div>
                                <div class="right-item">
                                    <p><i class="far fa-dot-circle"></i>{{ $provider::getUserPerformance($topic->id) }}/{{$topic->subTopics->count()}}</p>
                                </div>
                            </div>
                            <div class="course-item subtopics-{{ $topic->id }}">
                                <ul>
                                    @foreach ($topic->subTopics as $subTopic)
                                    <li id="subtopics-model" data-id="{{$subTopic->id}}" data-title="{{$subTopic->sub_topic_title}}">
                                            <!-- <a href="{{ route('practice', $subTopic->id) }}" data-target="#practiceModal" class="text-black">
                                                <i class="far fa-dot-circle"></i>{{$subTopic->sub_topic_title}}
                                            </a> -->

                                            @if(App\Services\UserPerformance::getPerformance($subTopic->id))
                                                <!-- <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked> -->
                                                <i class="fa fa-check"></i>
                                                {{$subTopic->sub_topic_title}}

                                            @else
                                                <!-- <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"> -->
                                                <i class="far fa-dot-circle"></i>
                                                {{$subTopic->sub_topic_title}}

                                            @endif
                                            <!-- <i class="far fa-dot-circle"></i> -->
                                            <!-- {{$subTopic->sub_topic_title}} -->
                                        </li>

                                        <!-- Modal -->
                                        <div class="modal fade practiceModal" id="practiceModal-{{$subTopic->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-fullscreen">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">{{$subTopic->sub_topic_title}}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <iframe frameborder="0" id="practice-iframe-{{$subTopic->id}}" width="100%" height="100%" style="min-height: 1014px;display: flex; justify-content: center; align-items: center;"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-4">
                    <div class="side-bar bg-white p-sm-4 p-3">
                        <div class="cf-img mb-3">
                            @if($course->image)
                                <img src="{{ asset('images/'.$course->image) }}" alt="responsive-web-design">
                            @else
                                <img src="{{ asset ('theme/topics/images/web-design/html5.png') }}" alt="cf">
                            @endif
                        </div>
                        <div class="side-content mb-3">
                            <h4>Ready to practice?</h4>
                        </div>
                        <div class="side-btn">
                            <!-- <div class="btn-1 text-center mb-3">
                                <a href="#"> Click here to practice</a>
                            </div> -->
                            <div class="btn-2 text-center">
                                <a href="{{ route('courses') }}">See all courses</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Modal -->
<div class="modal fade practiceModal" id="practiceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="practiceModalLabel">{{$subTopic->sub_topic_title}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <iframe frameborder="0" id="practice-iframe" width="100%" height="100%" style="min-height: 1014px;display: flex; justify-content: center; align-items: center;"></iframe>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script-files')
    <script src="{{ asset ('theme/topics/js/custom.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('[id^=subtopics]').click(function(e) {
                var id= $(this).attr("data-id");
                var title= $(this).attr("data-title");

                $('#practiceModal').modal('show');
                $(".modal-header h5").text(title);

                e.preventDefault();
                $.ajax({
                    type: "GET",
                    url: '{{ url("practice") }}/'+id,
                    success: function (response) {
                        if (response.status == "success") {
                            var url = response.url;
                            // console.log('url----',url);
                            $('#practice-iframe').attr('src', url);
                        }
                    },
                    error: function () {
                        alert('Something went wrong, Please try again.');
                    }
                });
            });


            var eventMethod = window.addEventListener ? "addEventListener" : "attachEvent";
            var eventer = window[eventMethod];
            var messageEvent = eventMethod == "attachEvent" ? "onmessage" : "message";

            eventer(messageEvent,function(e) {
                if (e.data.hasOwnProperty("message")) {
                    $('.practiceModal').modal('hide');
                    location.reload();
                }
            },false);

        });
    </script>
@endsection
