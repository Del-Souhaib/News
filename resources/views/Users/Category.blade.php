<!DOCTYPE html>
<html>
<head>
    <x-layouts.files/>
    <link rel="stylesheet" href="{{asset('css/Category.css')}}">
    <title>
        {{$category}}
    </title>

</head>
<body>
<header class="mb-5">
    <x-layouts.navbar/>
</header>
<main>
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="title">- {{$category}}</h2>
            </div>
        </div>
        <div class="row">
            @foreach($Posts as $post)
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
</main>

<footer>
    <x-layouts.footer/>
</footer>


</body>
</html>
