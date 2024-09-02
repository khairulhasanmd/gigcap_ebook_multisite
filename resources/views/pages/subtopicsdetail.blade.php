@extends('layouts.main')
<style>
    .nav-logout {
        color: #21262b !important;
    }
    .nav-logout {
        background-color: #53cea0;
        color: white !important;
    }
</style>

@section('styles-files')
     <link href="{{ asset ('theme/common/default.css') }}" rel="stylesheet">
 	<link href="{{ asset ('theme/subtopics/css/html-element.css') }}" rel="stylesheet">
 @endsection

@section('content')

<!-- <section>
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

<section class="hero hero__ifreme"></section>
<section class="course-bckground">
    <div class="single-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-8">
                    <div class="title py-4">
                        <div class="title-img float-start">
                            @if($subtopics->image)
                                <img src="{{ asset('images/'.$subtopics->image) }}" alt="responsive-web-design">
                            @else
                                <img src="{{ asset ('theme/subtopics/images/html5.png') }}" alt="responsive-web-design">
                            @endif
                        </div>
                        <div class="title-info overflow-hidden">
                            <h2>{{ $subtopics->sub_topic_title}}</h2>
                            <a href="{{route('courses')}}">Course Menu</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-4">
                    <div class="profile">
                        <img class="p-img" src="{{ asset('theme/subtopics/images/empty.png') }}" alt="user">
                        <span>&nbsp;</span>
                        <div class="after">
                            <img src="{{ asset('theme/subtopics/images/after.png') }}" alt="after">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="overview pt-2 pb-4">
                        <span> <img src="{{ asset('theme/subtopics/images/box.png') }}" alt="square-box"> Overview</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="fst-row p-4 mb-4">
                        <p>Welcome to sitename's HTML coding challenges. These will walk you through web development step-by-step.</p>
                        <p>{{ $subtopics->intro2 ? $subtopics->intro2 : ''}}</p>
                    </div>
                    <div class="snd-row p-4 mb-lg-0 mb-4">
                        <div class="fn-content">
                            <h3>Instructions</h3>
                            <p>First, you'll start by building a simple web page using HTML. You can edit code in your code editor, which is embedded into this web page.</p>
                            <p>Do you see the code in your code editor that says <span class="highlight">&lt;h1&gt;Hello&lt;/h1&gt;</span>? That's an HTML element.</p>
                            <p>Most HTML elements have an opening tag and a closing tag.</p>
                            <p>Opening tags look like this:</p>
                            <p><span>&lt;h1&gt;</p>
                            <p>Closing tags look like this:</p>
                            <p><span>&lt;/h1&gt;</p>
                            <p>The only difference between opening and closing tags is the forward slash after the opening bracket of a closing tag.</p>
                            <p>Each challenge has tests you can run at any time by clicking the "Run tests" button. When you pass all tests, you'll be prompted to submit your solution and go to the next coding challenge.</p>
                        </div>
                        {!! $subtopics->intro1 !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="side-bar p-4">
                        <div class="cf-img mb-3">
                            <img src="{{ asset('theme/subtopics/images/html5-small.png') }}" alt="cf">
                        </div>
                        <div class="side-content mb-3">
                            <h4>Ready to practice?</h4>
                        </div>

                        <div class="side-btn">
                            <div class="btn-1 text-center mb-3">
                                <a href="{{ route('practice', $subtopics->id) }}" target="_blank"> Click here to practice</a>
                            </div>
                            <div class="btn-2 text-center">
                                <a href="#">See all courses</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

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
                <div class="col-sm-7 col-10">
                    <div class="title py-4">
                        <div class="title-img float-start">
                            @if($subtopics->image)
                                <img src="{{ asset('images/'.$subtopics->image) }}" alt="responsive-web-design">
                            @else
                                <img src="{{ asset ('theme/topics/images/web-design/html5.png') }}" alt="responsive-web-design">
                            @endif
                        </div>
                        <div class="title-info overflow-hidden">
                            <h2>{{ $subtopics->sub_topic_title}}</h2>
                            <a href="{{route('courses')}}">Course Menu</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5 col-2">
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
                    <div class="snd-row p-3 p-sm-4 mb-lg-0 mb-4">
                        <!-- <div class="fn-content">
                            <h3>Instructions</h3>
                            <p>First, you'll start by building a simple web page using HTML. You can edit code in your code editor, which is embedded into this web page.</p>
                            <p>Do you see the code in your code editor that says <span class="highlight">&lt;h1&gt;Hello&lt;/h1&gt;</span>? That's an HTML element.</p>
                            <p>Most HTML elements have an opening tag and a closing tag.</p>
                            <p>Opening tags look like this:</p>
                            <p><span>&lt;h1&gt;</span></p>
                            <p>Closing tags look like this:</p>
                            <p><span>&lt;/h1&gt;</span></p>
                            <p>The only difference between opening and closing tags is the forward slash after the opening bracket of a closing tag.</p>
                            <p>Each challenge has tests you can run at any time by clicking the "Run tests" button. When you pass all tests, you'll be prompted to submit your solution and go to the next coding challenge.</p>
                        </div> -->
                        {!! $subtopics->intro1 !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="side-bar p-sm-4 p-3">
                        <div class="cf-img mb-3">
                        @if($subtopics->image)
                                <img src="{{ asset('images/'.$subtopics->image) }}" alt="responsive-web-design">
                            @else
                                <img src="{{ asset ('theme/topics/images/web-design/html5-small.png') }}" alt="responsive-web-design">
                            @endif
                        </div>
                        <div class="side-content mb-3">
                            <h4>Ready to practice?</h4>
                        </div>
                        <div class="side-btn">
                            <div class="btn-1 text-center mb-3">
                                <a href="{{ route('practice', $subtopics->id) }}" target="_blank">  Click here to practice</a>
                            </div>
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

@endsection
