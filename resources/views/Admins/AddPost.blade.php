<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <x-layouts.files/>
    <link rel="stylesheet" href="{{asset('css/Admins/AddPost.css')}}">
    <title>Add post</title>
</head>
<body>
<div class="container-fluid  p-0">
    <div class="row">
        <div class="col-2">
            <x-admin.layouts.LeftNavbar/>
        </div>
        <div class="col-10">
            <div class="row">
                <div class="col-12 mt-5">
                    <a href="{{url('/Admins/Posts')}}" class="text-dark">
                        <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-arrow-left-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                        </svg>
                        Back
                    </a>
                </div>
                <div class="col-12 mt-5 mb-5">

                    <form method="post" action="{{url('/Admins/Addclick')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control rtl" id="title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select multiple class="form-control" name="type[]" id="type" name="type">
                                <option>morocco</option>
                                <option>world</option>
                                <option>politic</option>
                                <option>tech</option>
                                <option>sport</option>
                                <option>art</option>
                                <option>health</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="images">Images</label>
                            <input type="file" multiple class="form-control-file" id="images" name="images[]" multiple>
                        </div>
                        <div class="form-group">
                            <label for="text">Text</label>
                            <textarea class="form-control rtl" id="text" name="text" rows="3"></textarea>
                        </div>
                        <button class="btn btn-primary">Add</button>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade show" id="postadded" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-black">
                    Post added success
                </div>

            </div>
        </div>
    </div>
</div>
@if(session('show'))
<script>
        $('#postadded').modal('show')
</script>
@endif
</body>
</html>
