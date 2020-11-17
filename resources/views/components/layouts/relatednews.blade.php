<div class="col-md-4 d-felx flex-column">
    <p class="related mb-5"> اخبار ذات صلة</p>
    @foreach($related as $rld)
        @php
            $images=explode('|',$rld->Pictures);
        @endphp
        <a href="{{url('/New/'.$rld->id)}}" class="card mb-5">
            @if(count($images)>1)
                <img class="card-img-top" src="{{url('storage/Pics/Posts/'.$images[0])}}"
                     alt="Card image cap">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{$rld->Title}}</h5>
                <p class="card-text">{{mb_substr($rld->Text,0,70)}}...</p>
                <p class="card-text"><small class="text-muted date">{{$rld->created_at}}</small></p>
            </div>
        </a>
    @endforeach

</div>
