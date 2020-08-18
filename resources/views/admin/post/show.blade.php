@extends('layouts.backend.app')

@section('title', 'Post Create')

@push('css')
<link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush


@section('content')

    <div class="container-fluid">

                 
   <a href="{{ route('admin.post.index') }}" class="btn btn-danger wave-effect" >BACK</a>

   {{-- @if($post->is_approved == false)
   <button type="button" class="btn btn-success btn-lg" onclick="approvePost({{ $post->id }})">
  Approve This Post
    </button>
   <form method="POST" action="{{ route('admin.post.approve',$post->id) }}" id="approval-form" style="display: none;" >
   @csrf
   @method('PUT') 
  
   </form>
  @else
 
   @endif --}}
  
   <br>
   <br>



        <div class="row">
            <h4>News Details</h4>
            <br>
            <h3>News Title: {{ $post->title }}</h3><small>Posted By <strong><a href="">{{ $post->user->name }}</a></strong> on
                {{ $post->created_at->toFormattedDateString() }}</small>
            <br>
            <div class="row" style="text-align: justify; margin: 20px 10px">
                <h3>News Category : <strong>{{ $c->name }}</strong></h3>
                <span style="float:right;margin-right:500px;">
                @if($post->is_approved == false)
                <button type="button" class="btn btn-success btn-lg" onclick="approvePost({{ $post->id }})">
               Approve This News
                 </button>
                <form method="POST" action="{{ route('admin.post.approve',$post->id) }}" id="approval-form" style="display: none;" >
                @csrf
                @method('PUT') 
               
                </form>
               @else
              
                @endif
                </span>
            </div>
            <img  src="{{ asset('storage/post/'.$post->image) }}" 
                                    alt="featured-image" class="img-responsive thumbnail" style="height: 50%;width:50%;">
            <br>
            

            <div class="row" style="text-align: justify; margin: 20px 10px">
                <h4>Description</h4>
                {!! $post->body !!}
            </div>

            
           
           

            
            

           
            
        </div>

    </div>

@endsection


@push('js')
 <!-- Select Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <!-- TinyMCE -->
    <script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
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


function approvePost(id){
    const swalWithBootstrapButtons = Swal.mixin({
         customClass: {
         confirmButton: 'btn btn-success',
         cancelButton: 'btn btn-danger'
         },
         buttonsStyling: false
     })
     
     swalWithBootstrapButtons.fire({
         title: 'Are you sure?',
         text: "You won't be able to revert this!",
         type: 'warning',
         showCancelButton: true,
         confirmButtonText: 'Yes, Approve it!',
         cancelButtonText: 'No, cancel!',
         reverseButtons: true
     }).then((result) => {
         if (result.value) {
             
             event.preventDefault();
             document.getElementById('approval-form').submit();
     
         } else if (
         /* Read more about handling dismissals below */
         result.dismiss === Swal.DismissReason.cancel
         ) {
         swalWithBootstrapButtons.fire(
             'Cancelled',
             'Your imaginary file is safe :)',
             'info'
         )
         }
     })
}	

</script>


@endpush