<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <x-layouts.files/>
    <link rel="stylesheet" href="{{asset('css/Admins/Login.css')}}">
    <title>Admin Login</title>
</head>
<body>
<div class="container mb-5 mt-5">
    <h2>Admin Login</h2>

</div>
<form method="post" action="{{url('Admins/LoginClick')}}" class="container ">
    @csrf
    <div class="row ">
        <div class="col-md-2 mb-5">
            <label for="email">Email address</label>
        </div>
        <div class="col-md-10">
            <input type="email" class="form-control w-50" id="email" name="email">
        </div>
    </div>
    <div class="row ">
        <div class="col-md-2 mb-5">
            <label for="password">Password</label>
        </div>
        <div class="col-md-10 border-none">
            <input type="password" class="form-control w-50" id="password" name="password">
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-5">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

</form>


</body>
</html>
