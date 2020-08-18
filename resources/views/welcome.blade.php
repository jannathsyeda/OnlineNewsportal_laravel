@extends('layouts.frontend.app')

@section('title','Home Page')
    
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    #bangladesh{
        margin: 60px 0px;
    }
    body{
        background-color:;
    }
    #bangladesh h1{
        font-weight: bold;
    }
    .bd-news{
        border: 1px solid grey;
        padding: 8px 3px;
        margin-bottom: 15px;
    }
    .bd-news .img{
        border-radius: 80px;
    }
    .news{
        margin-left: 12px;
       /* border-radius: 80px; */
    }
    


</style>
    
@endpush

@section('content')

@if (session()->has('successSubscriber'))
                        <div class="alert alert-success m-3" role="alert">
                            {{ session()->get('successSubscriber') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger m-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

    <section id="marquee">
        <div class="container">
            <div class="row" style="width: 70%; margin:auto;">
                <div class="col-sm-12">

                <div class="col-sm-12 form-group">
                    <div class="input-group">
                        <form method="GET" action="{{ route('search') }}">
                     <input class="form-control" name="date" type="date" > 
                     <div class="input-group-btn">
                       <button type="submit" class="btn btn-success">Search</button>
                     </div>    
                        </form>     
                   </div>
                  </div>



                </div>
            </div>
            <div class="row marquee">
                <h2>Breaking News</h2>
                <marquee  direction="left" height="40px" style="background: rgb(126, 85, 95);color:whitesmoke">
                    @foreach ($breakingNews as $bkn)
                    
                   ## {{ $bkn->breakingNews }} 
                        
                    @endforeach
                </marquee>
            </div>
           
        </div>
    </section>

    <section id="bangladesh">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1>Latest News</h1>
                </div>
            </div>
            <div class="row">
                @foreach ($posts as $post)
                <div class="col-sm-6 bd-news" style="border-radius:80px; border: 2px solid grey;">
                    <div class="row news">
                        <div class="col-sm-3"><img class="img-fluid"  src="{{ asset('storage/post/'.$post->image) }}" alt=""></div>
                        <div class="col-sm-9"><a target="_blank" href="{{ route('post.details', $post->slug) }}">{{ str_limit($post->title, 35) }}
                        </a>
                        </div>
                    </div>
                    <div class="row" style="font-size:12px;margin-left:200px;">
                        <div class="col-md-8">
                            {{ $post->created_at->toFormattedDateString() }}
                        </div> 
                        <div class="col-md-4">
                          Viewers: {{ $post->view_count }}
                        </div>
                      </div>
                </div>
                @endforeach
            </div>
            <div class="row m-auto">
                <a target="_blank" href="{{ route('post.index') }}" style="float:right" class="btn btn-success btn-lg m-auto">Read More</a>
            </div>
        </div>
    </section>

    

  
 @foreach ($categories as $category)
     

    <section id="latest-news" style="border: 3px solid grey;border-radius:50px; background-color:#ccc;margin-bottom:80px;">
        <div class="container">
            <div class="row">
                    <h2>{{ $category->name }}</h2>
            </div>  
            <div class="row">
    
                @foreach ($category->posts->where('is_approved','=',1)->take(3) as $e)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card text-center" style="background-color:hsla(0, 8%, 90%, 0.8)"; >
                        <img class="card-img-top" style="border-radius:50px;" src="{{ asset('storage/post/'.$e->image) }}" alt="Card image cap">
                        <div class="card-body">
                            <a style="text-decoration: none;" target="_blank" href="{{ route('post.details', $e->slug) }}">
                                {{  str_limit($e->title, 20) }}
                            </a> </div>
                       
                        <div class="row" style="font-size:12px;">
                          <div class="col-md-8">
                            {{ $e->created_at }}
                          </div> 
                          <div class="col-md-4">
                            Viewers: {{ $e->view_count }}
                          </div>
                        </div>
                    </div>
                    
                </div>
                @endforeach

                <div class="row m-auto">
         <a target="_blank" href="{{ route('category.index', $category->id) }}" 
                    style="float:right" class="btn btn-dark btn-lg m-auto">
                    <i class="fas fa-angle-double-right"></i></a> 
             </div>
                
                
            </div>  
          </div> 
        </section> 
        @endforeach

    {{-- <section id="latest-news">
        <div class="container">
            <div class="row">
                    <h2>International</h2>
            </div>  
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card text-center" >
                        <img class="card-img-top" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1728bb1463a%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1728bb1463a%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.18333435058594%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6" style="float: left;"><i class="fas fa-eye"> 24</i></div>
                            <div class="col-sm-6" style="float: right;"><i class="fas fa-comments"> 5</i></div>
                        </div>
                    </div>
                </div> 
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card text-center" >
                        <img class="card-img-top" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1728bb1463a%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1728bb1463a%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.18333435058594%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6" style="float: left;"><i class="fas fa-eye"> 24</i></div>
                            <div class="col-sm-6" style="float: right;"><i class="fas fa-comments"> 5</i></div>
                        </div>
                    </div>
                </div>  
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card text-center" >
                        <img class="card-img-top" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1728bb1463a%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1728bb1463a%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.18333435058594%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6" style="float: left;"><i class="fas fa-eye"> 24</i></div>
                            <div class="col-sm-6" style="float: right;"><i class="fas fa-comments"> 5</i></div>
                        </div>
                    </div>
                </div>  
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card text-center" >
                        <img class="card-img-top" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1728bb1463a%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1728bb1463a%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.18333435058594%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6" style="float: left;"><i class="fas fa-eye"> 24</i></div>
                            <div class="col-sm-6" style="float: right;"><i class="fas fa-comments"> 5</i></div>
                        </div>
                    </div>
                </div>      
                
            </div>  
          </div>       
        </section>  --}}

<div >
    @include('layouts.frontend.partial.footer')

</div>
@endsection



