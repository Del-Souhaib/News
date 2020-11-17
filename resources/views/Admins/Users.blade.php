<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <x-layouts.files/>
    <link rel="stylesheet" href="{{asset('css/Admins/Users.css')}}">
    <title>Home</title>
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
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Profile picture</th>
                            <th scope="col">Created at</th>
                            <th scope="col">#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @if($user->profile_photo_path!=null)
                                        <img src="{{asset('storage/'.$user->profile_photo_path)}}" width="60" height="60"/>
                                    @endif
                                </td>
                                <td>{{$user->created_at}}</td>
                                <td class="">
                                    <a href="{{url('/Admins/UpdateUser/'.$user->id)}}"
                                       class="btn btn-warning align-items-baseline">
                                        <span>Update</span>
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pen"
                                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                        </svg>
                                    </a>
                                    <form method="POST" action="{{url('/Admins/deleteUser/'.$user->id)}}">
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

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    {{ $Users->links('vendor.pagination.bootstrap-4') }}

                </div>
            </div>
        </div>
    </div>

</div>
<div class="modal fade" id="user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                User deleted
            </div>
            <div class="modal-footer">
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
