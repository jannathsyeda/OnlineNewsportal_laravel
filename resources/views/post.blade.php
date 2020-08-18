@extends('layouts.frontend.app')

@section('title')
    {{ $post->title }}
@endsection
    
@push('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<style>
    .favorite_post{
        color: blue;
    }

    .header-bg{
        height: 40%;
        background-size: cover;
        weight: 100%;
        background-image: url({{ asset('/storage/post/'.$post->image) }}) ;
    }
</style>
    
@endpush

@section('content')

		<div class="container">
            
            <div class="row" style="margin-top: 40px;">
                
                <h3><span style="color:Red;">News Title</span> : {{ $post->title }}</h3>
                <br>
                
               
            </div>
            <hr>
            <div class="row">
                <small>Posted By <br><strong><a href="">{{ $post->user->name }}</a></strong><br> 
                    {{ $post->created_at->toFormattedDateString() }}</small>
            </div>
            <hr style="width:100px;">
            <div class="row">
               
                
                
                <div class="col-md-6" style="margin-bottom:30px;">                
                    <h5><span style="color:rgb(0, 128, 0);">Category</span>: {{$post->category->name }}</h5>
                </div>
             <div class="col-md-6" style="color:rgb(0, 128, 0);">
                  viewers:  {{ $post->view_count }}
                </div>
            </div>
            <div class="row">
                <img  src="{{ asset('storage/post/'.$post->image) }}" 
                                        alt="featured-image" class="img-responsive thumbnail" style="height: 50%;width:50%;">
                
            </div>
            <div class="row" style="text-align: justify;margin: 20px 10px;">
               <h5> Description :

               </h5>
                <br><hr style="width:100%; margin-top:15px;">
               
                {!! $post->body !!}     
 <a href="{{ route('mainhome') }}" class="btn btn-dark"><i class="fas fa-arrow-left"></i></a>

            </div>
        </div>

	
        @include('layouts.frontend.partial.footer')

@endsection

@push('js')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
    function fav(){
        Swal.fire({
            title: 'To Add Your Favorite List, You Need To Login First!',
            showClass: {
                popup: 'animated fadeInDown faster'
            },
            hideClass: {
                popup: 'animated fadeOutUp faster'
            }
            })
    }	
</script>

@endpush
