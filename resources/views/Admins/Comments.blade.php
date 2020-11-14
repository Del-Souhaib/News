<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <x-layouts.files/>
    <link rel="stylesheet" href="{{asset('css/Admins/Comments.css')}}">
    <title>التعليقات</title>
</head>
<body>
<div class="container-fluid  p-0">
    <div class="row">
        <div class="col-2">
            <x-admin.layouts.LeftNavbar/>
        </div>
        <div class="col-10">
            <div class="row mt-5">
                <div class="col-12">
                    <table class="table table-hover table-bordered ">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">User id</th>
                            <th scope="col">Post id</th>
                            <th scope="col">Comment</th>
                            <th scope="col">Created at</th>
                            <th scope="col">#</th>
                            <th scope="col">Comment link</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                            <tr>
                                <td>{{$comment->id}}</td>
                                <td>{{$comment->user_id}}</td>
                                <td>{{$comment->post_id}}</td>
                                <td>{{$comment->comment}}</td>
                                <td>{{$comment->created_at}}</td>
                                <td class="#">
                                    <form method="Post" action="{{url('/Admins/deletecomment/'.$comment->id)}}">
                                        @csrf
                                        <button class="delete btn btn-danger align-items-baseline">
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
                                    <a href="{{url('/New/'.$comment->post_id)}}" class="text-dark">
                                        Post link
                                    </a>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    {{ $comments->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

</div>


</body>
</html>
