<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <x-layouts.files/>
    <title>{{$user->name}}</title>
</head>
<body>
<div class="container-fluid  p-0">
    <div class="row">
        <div class="col-2">
            <x-admin.layouts.LeftNavbar/>
        </div>
        <form method="post" action="{{url('Admins/UpdateUserclick/'.$user->id)}}" enctype="multipart/form-data" class="col-10 mt-5 pr-5">
            @csrf
            <div class="row mb-5 text-dark">
                <a href="{{url('Admins/Users')}}" class=" text-dark">
                    <svg width="100px" height="100px" viewBox="0 0 16 16" class="bi bi-arrow-return-left"
                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                    </svg>
                </a>
            </div>
            <div class="row mb-5">
                <div class="col-md-6">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
                    @error('name')
                    <p style="color: red">{{$message}}</p>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}">
                    @error('email')
                    <p style="color: red">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-6">
                    @if($user->profile_photo_path!=null)
                        <img src="{{asset('storage/'.$user->profile_photo_path)}}" width="200" height="200">
                    @else
                        <img src="{{asset('storage/profile-photos/profile.png')}}" width="200" height="200">
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="pic">Upload new picture</label>
                    <input type="file" class="form-control-file" name="pic" id="pic">

                    @error('pic')
                    <p style="color: red">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-2">
                    <button class="btn btn-success form-control">Save</button>
                </div>
            </div>
            @if(session('success'))
                <p class="alert alert-success">{{session('success')}}</p>
            @endif
        </form>
    </div>

</div>


</body>
</html>
