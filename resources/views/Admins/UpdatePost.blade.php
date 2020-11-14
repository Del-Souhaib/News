<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <x-layouts.files/>
    <link rel="stylesheet" href="{{asset('css/Admins/Post.css')}}">
    <title>Update</title>
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
                        <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-arrow-left-short"
                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                        </svg>
                        Back
                    </a>
                </div>
                <div class="col-12 mt-5 mb-5">

                    <form method="post" action="{{url('/Admins/Updatepostclick/'.$post->id)}}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control rtl" id="title" name="title"
                                   value="{{$post->Title}}">
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select multiple class="form-control" name="type[]" id="type" name="type">
                                <option
                                    @foreach($types as $type)
                                    @if($type=='morocco')
                                    selected
                                    @endif
                                    @endforeach>morocco
                                </option>
                                <option
                                    @foreach($types as $type)
                                    @if($type=='world')
                                    selected
                                    @endif
                                    @endforeach>world
                                </option>
                                <option
                                    @foreach($types as $type)
                                    @if($type=='politic')
                                    selected
                                    @endif
                                    @endforeach>politic
                                </option>
                                <option
                                    @foreach($types as $type)
                                    @if($type=='tech')
                                    selected
                                    @endif
                                    @endforeach>tech
                                </option>
                                <option
                                    @foreach($types as $type)
                                    @if($type=='sport')
                                    selected
                                    @endif
                                    @endforeach>sport
                                </option>
                                <option
                                    @foreach($types as $type)
                                    @if($type=='art')
                                    selected
                                    @endif
                                    @endforeach>art
                                </option>
                                <option
                                    @foreach($types as $type)
                                    @if($type=='health')
                                    selected
                                    @endif
                                    @endforeach>health
                                </option>
                            </select>
                        </div>
                        <div class="form-group ">
                            <label for="images">Images</label>
                            <input type="file" class="form-control-file mb-5" id="images" name="images[]" multiple>
                            @foreach($images as $image)
                                @if(!end($images)==$image)
                                    <img src="{{asset('storage/Pics/Posts/'.$image)}}" width="80" height="80"/>
                                @endif
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label for="text">Text</label>
                            <textarea class="form-control rtl" id="text" name="text" rows="3">{{$post->Text}}</textarea>
                        </div>
                        <button class="btn btn-success">
                            Update
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check2" fill="currentColor"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                            </svg>
                        </button>
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
    <div class="modal fade show text-dark" id="updateModel" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModelLabel">Updated</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Post updated success</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    @if(session('show'))
    $('#updateModel').modal('show')
    @endif
</script>
</body>
</html>
