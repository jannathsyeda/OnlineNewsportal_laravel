@extends('layouts.frontend.app')
@section('content')

<section id="latest-news" style="background-color:#ccc">
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page"><h1>{{ $category->name }}</h1></li>
                </ol>
              </nav>
                
        </div>  
        <div class="row">

            @foreach ($posts as $b)
            <div class="col-lg-3 col-md-4 col-sm-6">
                   

                <div class="card text-center" style="background-color:hsla(0, 8%, 90%, 0.8)"; >
                    <img class="card-img-top" style="border-radius:50px;" src="{{ asset('storage/post/'.$b->image) }}" alt="Card image cap">
                    <div class="card-body">
                        <a style="text-decoration: none;" target="_blank" href="{{ route('post.details', $b->slug) }}">{{  str_limit($b->title, 20) }}
                        </a>  </div>
                   
                    <div class="row" style="font-size:12px;">
                      <div class="col-md-8">
                        {{ $b->created_at }}
                      </div> 
                      <div class="col-md-4">
                        Viewers: {{ $b->view_count }}
                      </div>
                    </div>
                </div>
           
            </div>
            @endforeach
        </div>  
        {{ $posts->links() }}
      </div>    

    </section> 

  @endsection