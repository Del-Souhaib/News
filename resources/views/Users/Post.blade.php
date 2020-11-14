<!DOCTYPE html>
<html>
<head>
    <x-layouts.files/>
    <link rel="stylesheet" href="{{asset('css/Post.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <title>{{$Post->Title}}</title>

</head>
<body>
<header class="mb-5">
    <x-layouts.navbar/>
</header>
<main>

    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-md-8 post">
                <div class="row">
                    <div class="col-12">
                        @if($nbpics>1)
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach($pics as $pic)
                                        @if($pics[$nbpics]==$pic)
                                        @else
                                            <div class="swiper-slide">
                                                <img src="{{asset('storage/Pics/Posts/'.$pic)}}"/>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <!-- Add Pagination -->
                                <div class="swiper-pagination"></div>
                                <!-- Add Arrows -->
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>

                            </div>
                        @elseif($nbpics==1)
                            <img src="{{asset('storage/Pics/Posts/'.$pics[0])}}" class="img-fluid postimage"/>
                        @endif
                    </div>
                    <div class="col-12 mt-3">
                        <h2 class="Title">{{$Post->Title}}</h2>
                    </div>
                    <div class="col-12 mt-5 text">
                        <p>{{$Post->Text}}</p>
                    </div>
                    <div class="col-12 mt-5 text-right">
                        <p>{{date($Post->created_at)}}</p>
                    </div>
                </div>
                <div class="row mt-5 mb-5 align-items-center">
                    <div class="col-md-3">
                        <p class="Title">التعليقات</p>
                    </div>
                    <div class="col-md-9">
                        <hr/>
                    </div>
                </div>
                <div class="row Comment">
                    <div class="col-10 d-flex align-items-center">
                        @if(\Illuminate\Support\Facades\Auth::guard('web')->check())
                            @if(\Illuminate\Support\Facades\Auth::guard('web')->user()->profile_photo_path!=null)
                                <img width="50" height="50" class="mr-3 rounded-circle" alt="..."
                                     src="{{url('/storage/'.\Illuminate\Support\Facades\Auth::guard('web')->user()->profile_photo_path)}}"/>
                            @else
                                <img width="50" height="50" class="mr-3 rounded-circle" alt="..."
                                     src="{{url('/storage/profile-photos/profile.png')}}"/>

                            @endif
                        @else
                            <img width="50" height="50" class="mr-3 rounded-circle" alt="..."
                                 src="{{url('/storage/profile-photos/profile.png')}}"/>
                        @endif
                        <textarea class="form-control mr-3 ml-3" id="text" name="text" placeholder="اكتب تعليق"
                                  rows="0" style="height: 39px;"></textarea>
                        <button class="btn btn-primary" id="send">تعليق</button>

                    </div>
                    <div class="col-12 mt-4 mr-3" style="color: darkred">
                        <ul id="commenterrors" style="list-style: disc">

                        </ul>
                    </div>
                    <div class="col-12 mt-5 mb-5">
                        <hr/>
                    </div>
                    <x-layouts.comments :comments="$comments"/>
                </div>
            </div>
            <x-layouts.relatednews :related="$related"/>
        </div>
    </div>
</main>

<footer>
    <x-layouts.footer/>
</footer>


<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });


    /*Ajax add comment*/
    $nbcomment ={{count($comments)}};
    $("#send").on("click", function () {
        $.ajax({
            url: '{{url('/Comment/'.$Post->id)}}',
            type: 'Post',
            data: {
                "_token": "{{csrf_token()}}",
                "Text": $("#text").val()
            },
            success: function (e) {
                if (e == 'false') {
                    $('#loginmodal').modal('show')
                } else {
                    @if(\Illuminate\Support\Facades\Auth::guard('web')->check())

                        @if(\Illuminate\Support\Facades\Auth::guard('web')->user()->profile_photo_path==null)
                        $pic = "{{url('/storage/profile-photos/profile.png')}}";
                    @else
                        $pic = "{{url('/storage/'.\Illuminate\Support\Facades\Auth::guard('web')->user()->profile_photo_path)}}";
                    @endif
                        $user = "{{\Illuminate\Support\Facades\Auth::guard('web')->user()->name}}";
                    if($nbcomment>0) {
                        $('#comments').prepend('<div class="media  mb-3 c' + e.id + '" >\n' +
                            '        <img width="50" height="50" class="mr-3 rounded-circle" src="' + $pic + '"/>\n' +
                            '\n' +
                            '    <div class="media-body mr-3">\n' +
                            '        <div class="d-flex align-items-end">\n' +
                            '            <h5 class="mt-0 CommentUser">' + $user + '</h5>\n' +
                            '                <div class="dropdown" style="margin-right: 75%">\n' +
                            '                    <p class="dropdown-toggle" type="button" id="dropdownMenuButton"\n' +
                            '                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"\n' +
                            '                       style="font-size: 20px">\n' +
                            '                    </p>\n' +
                            '                    <div class="dropdown-menu text-right"\n' +
                            '                         aria-labelledby="dropdownMenuButton">\n' +
                            '                        <p commentid="' + e.id + '"\n' +
                            '                           class="dropdown-item deletecomment d-flex align-items-center">\n' +
                            '                            <svg width="1em" height="1em" viewBox="0 0 16 16"\n' +
                            '                                 class="bi bi-trash mr-2" fill="currentColor"\n' +
                            '                                 xmlns="http://www.w3.org/2000/svg">\n' +
                            '                                <path\n' +
                            '                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>\n' +
                            '                                <path fill-rule="evenodd"\n' +
                            '                                      d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>\n' +
                            '                            </svg>\n' +
                            '                            حذف التعليق\n' +
                            '                        </p>\n' +
                            '                        <p class="editcomment dropdown-item d-flex align-items-center"\n' +
                            '                           commentid="' + e.id + '" >\n' +
                            '                            <svg width="1em" height="1em" viewBox="0 0 16 16"\n' +
                            '                                 class="bi bi-pen mr-2" fill="currentColor"\n' +
                            '                                 xmlns="http://www.w3.org/2000/svg">\n' +
                            '                                <path fill-rule="evenodd"\n' +
                            '                                      d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>\n' +
                            '                            </svg>\n' +
                            '                            تعديل\n' +
                            '                        </p>\n' +
                            '                    </div>\n' +
                            '                </div>\n' +
                            '            <p></p>\n' +
                            '        </div>\n' +
                            '        <p commentid="' + e.id + '" id="nb' + e.id + '"> ' + $("#text").val() + '</p>\n' +
                            '        <div id="txt' + e.id + '" class="mb-3 mt-3" style="display: none">\n' +
                            '            <div class="d-flex">\n' +
                            '                            <textarea class="form-control mr-3 ml-3 " id="area' + e.id + '" name="text" rows="0"\n' +
                            '                                      style="height: 39px;">' + $("#text").val() + '</textarea>\n' +
                            '                <button class="btn btn-primary" id="save' + e.id + '">حفظ</button>\n' +
                            '            </div>\n' +
                            '        </div>\n' +
                            '\n' +
                            '        <small>' + e.date + '</small>\n' +
                            '    </div>\n' +
                            '</div>\n' +
                            '<div class="d-flex justify-center mb-3 ">\n' +
                            '    <hr style="background-color: black;width: 80%;" class="c' + e.id + '">\n' +
                            '</div>\n');
                    }
                    else if($nbcomment==0){
                        $('#comments').html('<div class="media  mb-3 c' + e.id + '" >\n' +
                            '        <img width="50" height="50" class="mr-3 rounded-circle" src="' + $pic + '"/>\n' +
                            '\n' +
                            '    <div class="media-body mr-3">\n' +
                            '        <div class="d-flex align-items-end">\n' +
                            '            <h5 class="mt-0 CommentUser">' + $user + '</h5>\n' +
                            '                <div class="dropdown" style="margin-right: 75%">\n' +
                            '                    <p class="dropdown-toggle" type="button" id="dropdownMenuButton"\n' +
                            '                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"\n' +
                            '                       style="font-size: 20px">\n' +
                            '                    </p>\n' +
                            '                    <div class="dropdown-menu text-right"\n' +
                            '                         aria-labelledby="dropdownMenuButton">\n' +
                            '                        <p commentid="' + e.id + '"\n' +
                            '                           class="dropdown-item deletecomment d-flex align-items-center">\n' +
                            '                            <svg width="1em" height="1em" viewBox="0 0 16 16"\n' +
                            '                                 class="bi bi-trash mr-2" fill="currentColor"\n' +
                            '                                 xmlns="http://www.w3.org/2000/svg">\n' +
                            '                                <path\n' +
                            '                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>\n' +
                            '                                <path fill-rule="evenodd"\n' +
                            '                                      d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>\n' +
                            '                            </svg>\n' +
                            '                            حذف التعليق\n' +
                            '                        </p>\n' +
                            '                        <p class="editcomment dropdown-item d-flex align-items-center"\n' +
                            '                           commentid="' + e.id + '" >\n' +
                            '                            <svg width="1em" height="1em" viewBox="0 0 16 16"\n' +
                            '                                 class="bi bi-pen mr-2" fill="currentColor"\n' +
                            '                                 xmlns="http://www.w3.org/2000/svg">\n' +
                            '                                <path fill-rule="evenodd"\n' +
                            '                                      d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>\n' +
                            '                            </svg>\n' +
                            '                            تعديل\n' +
                            '                        </p>\n' +
                            '                    </div>\n' +
                            '                </div>\n' +
                            '            <p></p>\n' +
                            '        </div>\n' +
                            '        <p commentid="' + e.id + '" id="nb' + e.id + '"> ' + $("#text").val() + '</p>\n' +
                            '        <div id="txt' + e.id + '" class="mb-3 mt-3" style="display: none">\n' +
                            '            <div class="d-flex">\n' +
                            '                            <textarea class="form-control mr-3 ml-3 " id="area' + e.id + '" name="text" rows="0"\n' +
                            '                                      style="height: 39px;">' + $("#text").val() + '</textarea>\n' +
                            '                <button class="btn btn-primary" id="save' + e.id + '">حفظ</button>\n' +
                            '            </div>\n' +
                            '        </div>\n' +
                            '\n' +
                            '        <small>' + e.date + '</small>\n' +
                            '    </div>\n' +
                            '</div>\n' +
                            '<div class="d-flex justify-center mb-3 ">\n' +
                            '    <hr style="background-color: black;width: 80%;" class="c' + e.id + '">\n' +
                            '</div>\n');
                    }
                    $('#text').val('');
                    $nbcomment += 1;
                    $('.nbcomments').text($nbcomment + " تعليق")
                    @endif
                }
            },
            error: function (response) {
                $('#commenterrors').text('')
                $response = response.responseJSON
                $.each($response.errors, function (key, val) {
                    $('#commenterrors').append(
                        "<li>" + val[0] + "</li>"
                    )
                })
            }
        })
    })


    /*edit comment*/
    $('.editcomment').on('click', function () {
        //commentid
        $commentid = $(this).attr('commentid');
        $('#nb' + $commentid).hide();
        $('#txt' + $commentid).show();
        $('#save' + $commentid).on('click', function () {
            $.ajax({
                url: '/updatecomment/' + $commentid,
                type: 'post',
                data: {
                    "_token": "{{csrf_token()}}",
                    newcomment: $('#area' + $commentid).val(),
                },
                success: function (e) {
                    $('#nb' + $commentid).text($('#area' + $commentid).val());
                    $('#nb' + $commentid).show();
                    $('#txt' + $commentid).hide();
                }
            });
        });
    });

    /*Ajax delete comment*/
    $('.deletecomment').on('click', function () {
        $.ajax({
            url: "{{url('/deletecomment')}}",
            type: 'post',
            data: {
                "_token": "{{csrf_token()}}",
                "commentid": $(this).attr('commentid'),
            },
            success: function (e) {
                $(".c" + e).hide();
                $('.c'+e).hide();
                @if(count($comments)-1==0)
                $('.nbcomments').text("لا يوجد تعليقات");
                @else
                $('.nbcomments').text(" {{count($comments)-1}} تعليق")
                @endif


            }
        })
    })
</script>
</body>
</html>
