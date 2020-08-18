@extends('layouts.frontend.app')

@section('title')
    Search
@endsection
    
@push('css')



<style>
   
</style>
    
@endpush

@section('content')

		<div class="container">
            <div class="row" style="margin:25px">
                <a href="{{ route('mainhome') }}" class="btn btn-primary">Back</a>
            </div>
            <div class="row" style="margin: 40px 0px;">
                <h1 class="title display-table-cell m-auto" style="background-color: rgb(224, 224, 224); padding: 30px 40px;"><b>{{ $posts->count() }} Results</b></h1>
                <br>
            </div>
            <div class="row">
                <section id="latest-news">  
                    <div class="container">
                        <div class="row">
                            @foreach ($posts as $s)
                            <div class="col-lg-3 col-md-4 col-sm-6">
                
                                <div class="card text-center" style="background-color:hsla(0, 8%, 90%, 0.8)"; >
                                    <img class="card-img-top" style="border-radius:50px;" src="{{ asset('storage/post/'.$s->image) }}" alt="Card image cap">
                                    <div class="card-body">
                                        <a style="text-decoration: none;" target="_blank" href="{{ route('post.details', $s->slug) }}">{{  str_limit($s->title, 20) }}
                                        </a> </div>
                                   
                                    <div class="row" style="font-size:12px;">
                                      <div class="col-md-8">
                                        {{ $s->created_at }}
                                      </div> 
                                      <div class="col-md-4">
                                        Viewers: {{ $s->view_count }}
                                      </div>
                                    </div>
                                </div>
                               
                            </div>
                            @endforeach
                        </div> 
                        {{ $posts->links() }} 
                      </div>       
                    </section> 
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
