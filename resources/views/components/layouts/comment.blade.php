<div class="media  mb-3 c{{$comment->id}}" >
    @if($comment->User->profile_photo_path==null)
        <img width="50" height="50" class="mr-3 rounded-circle" alt="..."
             src="{{url('/storage/profile-photos/profile.png')}}"/>
    @else
        <img width="50" height="50" class="mr-3 rounded-circle" alt="..."
             src="{{url('/storage/'.$comment->User->profile_photo_path)}}"/>
    @endif

    <div class="media-body mr-3">
        <div class="d-flex align-items-end">
            <h5 class="mt-0 CommentUser">{{$comment->User->name}}</h5>
            @if($comment->User->id==\Illuminate\Support\Facades\Auth::guard('web')->id() || \Illuminate\Support\Facades\Auth::guard('admin')->check())
                <div class="dropdown" style="margin-right: 75%">
                    <p class="dropdown-toggle" type="button" id="dropdownMenuButton"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                       style="font-size: 20px">
                    </p>
                    <div class="dropdown-menu text-right"
                         aria-labelledby="dropdownMenuButton">
                        <p commentid="{{$comment->id}}"
                           class="dropdown-item deletecomment d-flex align-items-center">
                            <svg width="1em" height="1em" viewBox="0 0 16 16"
                                 class="bi bi-trash mr-2" fill="currentColor"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd"
                                      d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                            حذف التعليق
                        </p>
                        <p class="editcomment dropdown-item d-flex align-items-center"
                           commentid="{{$comment->id}}" href="#">
                            <svg width="1em" height="1em" viewBox="0 0 16 16"
                                 class="bi bi-pen mr-2" fill="currentColor"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                            </svg>
                            تعديل
                        </p>
                    </div>
                </div>
            @endif
            <p></p>
        </div>
        <p commentid="{{$comment->id}}" id="nb{{$comment->id}}"> {{$comment->comment}}</p>
        <div id="txt{{$comment->id}}" class="mb-3 mt-3" style="display: none">
            <div class="d-flex">
                            <textarea class="form-control mr-3 ml-3 " id="area{{$comment->id}}" name="text" rows="0"
                                      style="height: 39px;">{{$comment->comment}}</textarea>
                <button class="btn btn-primary" id="save{{$comment->id}}">حفظ</button>
            </div>
        </div>

        <small>{{$comment->created_at}}</small>
    </div>
</div>
<div class="d-flex justify-center mb-3 ">
    <hr style="background-color: black;width: 80%;" class="c{{$comment->id}}">
</div>
