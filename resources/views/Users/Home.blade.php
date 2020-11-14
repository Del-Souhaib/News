<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <x-layouts.files/>


    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <style>
        * {
            direction: rtl;
            text-align: right;
        }
    </style>
    <title>الرئيسية</title>

</head>
<body>
<header>
    <x-layouts.navbar/>

    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-interval="10000">
                <img src="{{asset('Pics/backgrounds/bg1.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-interval="2000">
                <img src="{{asset('Pics/backgrounds/bg2.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('Pics/backgrounds/bg3.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('Pics/backgrounds/bg4.jpg')}}" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
            <svg width="40px" height="40px" viewBox="0 0 16 16" class="bi bi-chevron-left" fill="currentColor"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
            </svg>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
            <svg width="40px" height="40px" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
            </svg>
            <span class="sr-only">Next</span>
        </a>
    </div>

</header>
<div class="container-fluid" id="container">
    <div class="row  align-items-center mb-5">
        <div class="col-lg-2 col-md-3 col-sm-5 col-7  bigtitle pr-2">
            <p class="title">اخر الاخبار</p>
        </div>
        <div class="col-lg-10 col-md-9 col-sm-7 col-5 ">
            <hr>
        </div>
    </div>
    <div class="row">
        @foreach($lastposts as $post)
            <a href="{{url('New/'.$post->id)}}" class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
                <div class="card">
                    @if(isset($post->Pictures))
                        @php
                            $image=explode('|',$post->Pictures);
                            $image=$image[0];
                        @endphp
                        <img src="{{asset('storage/Pics/Posts/'.$image)}}" class="card-img-top img-fluid" alt="">
                    @endif
                    <div class="card-body">
                        <h3 class="card-title">-{{$post->Title}}</h3>
                        <p class="card-text">
                                {{$post->Text}}
                        </p>
                    </div>
                </div>
            </a>
        @endforeach

    </div>
    <div class="row  align-items-center mb-5">
        <div class="col-lg-2 col-md-3 col-sm-5 col-7  bigtitle pr-2">
            <p class="title"> الاكتر مشاهدة</p>
        </div>
        <div class="col-lg-10 col-md-9 col-sm-7 col-5 ">
            <hr>
        </div>
    </div>
    <div class="row">
        @foreach($lastposts as $post)
            <a href="{{url('New/'.$post->id)}}" class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
                <div class="card">
                    @if(isset($post->Pictures))
                        @php
                            $image=explode('|',$post->Pictures);
                            $image=$image[0];
                        @endphp
                        <img src="{{asset('storage/Pics/Posts/'.$image)}}" class="card-img-top" alt="">
                    @endif
                    <div class="card-body">
                        <h3 class="card-title">
                                {{$post->Title}}
                        </h3>

                        <p class="card-text">
                                {{$post->Text}}
                        </p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    <div class="row  align-items-center mb-5">
        <div class="col-lg-2 col-md-3 col-sm-5 col-7  bigtitle pr-2">
            <p class="title"> سياسة</p>
        </div>
        <div class="col-lg-10 col-md-9 col-sm-7 col-5 ">
            <hr>
        </div>
    </div>
    <div class="row">
        @foreach($politicposts as $post)
            <a href="{{url('New/'.$post->id)}}" class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
                <div class="card">
                    @if(isset($post->Pictures))
                        @php
                            $image=explode('|',$post->Pictures);
                            $image=$image[0];
                        @endphp
                        <img src="{{asset('storage/Pics/Posts/'.$image)}}" class="card-img-top" alt="">
                    @endif
                    <div class="card-body">
                        <h3 class="card-title">-{{$post->Title}}</h3>
                        <p class="card-text">{{substr($post->Text,2)}}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <div class="row  align-items-center mb-5">
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <p class="title"> رياضة</p>
        </div>
        <div class="col-lg-10 col-md-9 col-sm-7 col-5 ">
            <hr>
        </div>
    </div>
    <div class="row">
        @foreach($sportposts as $post)
            <a href="{{url('New/'.$post->id)}}" class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
                <div class="card">
                    @if(isset($post->Pictures))
                        @php
                            $image=explode('|',$post->Pictures);
                            $image=$image[0];
                        @endphp
                        <img src="{{asset('storage/Pics/Posts/'.$image)}}" class="card-img-top" alt="">
                    @endif
                    <div class="card-body">
                        <h3 class="card-title">-{{$post->Title}}</h3>
                        <p class="card-text">{{substr($post->Text,2)}}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    <div class="row  align-items-center mb-5">
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <p class="title"> فن ومشاهير</p>
        </div>
        <div class="col-lg-10 col-md-9 col-sm-7 col-5 ">
            <hr>
        </div>
    </div>
    <div class="row">
        @foreach($artposts as $post)
            <a href="{{url('New/'.$post->id)}}" class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
                <div class="card">
                    @if(isset($post->Pictures))
                        @php
                            $image=explode('|',$post->Pictures);
                            $image=$image[0];
                        @endphp
                        <img src="{{asset('storage/Pics/Posts/'.$image)}}" class="card-img-top" alt="">
                    @endif
                    <div class="card-body">
                        <h3 class="card-title">-{{$post->Title}}</h3>
                        <p class="card-text">{{substr($post->Text,2)}}</p>
                    </div>
                </div>
            </a>
        @endforeach

    </div>
</div>
<footer>
    <x-layouts.footer/>
</footer>

</body>
</html>
