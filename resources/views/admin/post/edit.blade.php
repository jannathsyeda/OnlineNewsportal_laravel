@extends('layouts.backend.app')

@section('title', 'Edit News')

@push('css')
<link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush


@section('content')

{{-- @if ($errors->any())
<div class="alert alert-danger m-3">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif --}}

    <div class="container-fluid">

        <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
    
        <!-- Vertical Layout | With Floating Label -->
        
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="">
                    <div class="header">
                        <h2>
                            Edit News
                        </h2>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger m-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="body">
                        
                            <div class="form-group">
                                <label class="form-label">News Title</label>
                                <input type="text" placeholder="write here..." id="title" class="form-control" name="title" value="{{ old('title', $post->title) }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" value="{{ old('image') }}">
                            </div>

                            <div style="width: 50%" class="form-group form-float {{ $errors->has('categories') ? 'focused error' : '' }}">
                                <label class="form-label" for="category">Select Category</label>
                                <select name="category" id="category" class="form-control show-tick" data-live-search="true" >
                                    @foreach ($categories as $category)
                                        <option class="text-center" value="{{ $category->id }}" >{{ $category->name }}</option>
                                    @endforeach
                                </select>                      
                             </div>

                    </div>
                </div>
            </div>
           
            </div>
        </div>

        <!-- Second Row Start -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                           News Description
                          
                        </h2>
               
                    </div>
                    <div class="body">
                        
                    <textarea id="tinymce" name="body"> {{ $post->body }}  </textarea>        
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 40px;">
                
                <div class="body">
                        <a class="btn btn-danger waves-effect m-t-15" href="{{ route('admin.post.index') }}">Back</a>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                </div>
            </div>
        </div>
        <!-- Second Row End -->
    
    </form>
    </div>

@endsection

@push('js')
    <!-- Select Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <!-- TinyMCE -->
    <script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>
   
   <script type="text/javascript">
   $(function () {
   
    //TinyMCE
    tinymce.init({
        selector: "textarea#tinymce",
        theme: "modern",
        height: 300,
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons',
        image_advtab: true
    });
    tinymce.suffix = ".min";
    tinyMCE.baseURL = "{{ asset('assets/backend/plugins/tinymce') }}";
});


 </script>


@endpush