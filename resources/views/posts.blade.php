@extends('layouts.frontend.app')

@section('title', 'News variety')
  
    
@push('css')

<style>
    
 
</style>
    
@endpush

@section('content')
    
    
    <div class="container">
        <section id="bangladesh">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1>All News</h1>
                    </div>
                </div>
                <div class="row">
                    @foreach ($posts as $post)
                    <div class="col-sm-6 bd-news" style="margin-bottom: 25px;">
                        <div class="row news">
                            <div class="col-sm-3"><img class="img-fluid" src="{{ asset('storage/post/'.$post->image) }}" alt=""></div>
                           
                         <div class="col-sm-9">
                             <a href="{{ route('post.details', $post->slug) }}">{{ str_limit($post->title, 35) }}</a>
                            <br>
                            <br>  <span style="font-size:12px;">{{ $post->created_at }} </span>
                           <span style="font-size:12px;margin-left:50px;"> Viewers: {{ $post->view_count }}</span>
                        </div>
 
                        </div>
                    </div>
                    @endforeach
                    

                </div>
                {{ $posts->links() }}
            </div>
        </section>

    </div>
    @include('layouts.frontend.partial.footer')

@endsection




@push('js')


@endpush