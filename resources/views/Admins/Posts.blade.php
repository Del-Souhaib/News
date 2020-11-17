<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <x-layouts.files/>
    <link rel="stylesheet" href="{{asset('css/Admins/Post.css')}}">
    <title>الاخبار</title>
</head>
<body>
<div class="container-fluid  p-0">
    <div class="row">
        <div class="col-2">
            <x-admin.layouts.LeftNavbar/>
        </div>
        <div class="col-10">
            <div class="row">
                <div class="col-12 mt-5 mb-5">
                    <a href="{{url('/Admins/AddPost')}}" class="btn btn-primary">
                        Add post
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg>
                    </a>
                </div>
                <div class="col-12">
                    <table class="table table-hover table-bordered ">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Title</th>
                            <th scope="col">Type</th>
                            <th scope="col">Pics</th>
                            <th scope="col">Text</th>
                            <th scope="col">Date creation</th>
                            <th scope="col">#</th>
                            <th scope="col" style="width: 10%">Post url</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td width="200px">{{$post->Title}}</td>
                                <td width="25">
                                    @php
                                    $types=explode('|',$post->Type);
                                    @endphp
                                    @foreach($types as $type)
                                        {{$type}}
                                    @endforeach
                                </td>
                                <td class="">
                                    <div class="d-flex">
                                        @php
                                            $images=explode('|',$post->Pictures);
                                        @endphp

                                        <img src="{{asset('storage/Pics/Posts/'.$images[0])}}" class="mb-3"
                                             width="80" height="80"/><br>

                                    </div>
                                </td>
                                <td width="25">{{mb_substr($post->Text,0,50)}}...</td>
                                <td>{{$post->created_at}}</td>
                                <td class="">
                                    <a href="{{url('/Admins/Updatepost/'.$post->id)}}"
                                       class="btn btn-warning align-items-baseline">
                                        <span>Update</span>
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pen"
                                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                        </svg>
                                    </a>
                                    <form method="post" action="{{url('/Admins/Deletepost/'.$post->id)}}">
                                        @csrf
                                        <button class="delete btn btn-danger  align-items-baseline">
                                            <span>Delete</span>
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash"
                                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd"
                                                      d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>
                                        </button>
                                    </form>

                                </td>
                                <td>
                                    <a href="{{url('/New/'.$post->id)}}" class="text-dark">
                                        Go to post
                                    </a>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    {{ $posts->links('vendor.pagination.bootstrap-4') }}

                </div>
            </div>
        </div>
    </div>

</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Delete</button>
                <button type="button" class="btn btn-primary" id="cancel">Cancel</button>
            </div>
        </div>
    </div>
</div>
<script>

    $('#cancel').click(function (e) {
        // e.preventDefault()
        confirm('do you really want tht')
    })
</script>
</body>
</html>
