<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <x-layouts.files/>
    <title>Home</title>
</head>
<body>
<div class="container-fluid  p-0 ">
    <div class="row">
        <div class="col-2">
            <x-admin.layouts.LeftNavbar/>
        </div>
        <div class="col-10 mt-5">
            <form class="row" method="post" action="{{url('/Admins/changeinfo')}}">
                @csrf
                <div class="col-6">
                    <label for="exampleInputPassword1">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$admin->name}}">
                    @error('name')
                    <div style="color: red">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{$admin->email}}"
                           aria-describedby="emailHelp">
                    @error('email')
                    <div style="color: red">
                        {{$message}}

                    </div>
                    @enderror
                </div>
                <div class="col-6 mt-5">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
                @if(session('infoupdated'))
                    <div class="col-12 mt-5">
                        <p class="alert alert-success">
                            Information updated success
                        </p>
                    </div>
                @endif
            </form>
            <hr class="mt-5 mb-5 mr-2" style="background-color: black"/>
            <form class="row" method="post" action="{{url('/Admins/changepassword')}}">
                @csrf
                <div class="col-6 mb-5">
                    <label for="password">Current password</label>
                    <input type="password" class="form-control" name="oldpassword" id="password">
{{--                    @if(session('passworderror'))--}}
{{--                        <p style="color: red">{{session('passworderror')}}</p>--}}
{{--                    @endif--}}
                    @error('oldpassword')
                    <p style="color: red">{{$message}}</p>
                    @enderror
                </div>
                <div class="col-6">

                </div>
                <div class="col-6">
                    <label for="newpassword">New password</label>
                    <input type="password" class="form-control" name="password" id="newpassword">
                    @error('password')
                    <p style="color: red">{{$message}}</p>
                    @enderror
                </div>
                <div class="col-6 mb-5">
                    <label for="confirmpassword">Confirm new password</label>
                    <input type="password" class="form-control" name="password_confirmation" id="confirmpassword">
                    @error('password_confirmation')
                    <p style="color: red">{{$message}}</p>
                    @enderror
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
                <div class="col-12">
                    @if(session('good'))
                        <p class="alert alert-success">{{session('good')}}</p>
                    @endif
                </div>

            </form>
        </div>
    </div>

</div>


</body>
</html>
