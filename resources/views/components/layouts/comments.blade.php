<div class="col-12">


</div>
<div class="col-12 "  id="comments">
    @if(count($comments)==0)
        <h2 class="Title mr-5 nbcomments">لا يوجد تعليقات</h2>
    @else
        <h2 class="Title mr-5 mb-5 nbcomments">{{count($comments)}} تعليق</h2>
        <div>
            @foreach($comments as $comment)
                <x-layouts.comment :comment="$comment" :/>
            @endforeach
        </div>
    @endif

</div>
<script>

</script>
