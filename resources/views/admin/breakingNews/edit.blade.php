@extends('layouts.backend.app')

@section('title', 'breakingNews Edit')

@push('css')

@endpush


@section('content')



    <div class="container">
        <div class="row">
            
                <h2>Edit Category</h2>
            
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
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('admin.breakingNews.update',$News->id) }}" method="POST" style="border: 2px solid grey; padding: 20px;">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Enter breakingNews</label>
                        <input id="breakingNews" placeholder="type here....." type="text" class="form-control" name="breakingNews" value="{{ old('breakingNews',$News->breakingNews) }}">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-info">Submit</button>
                        <a class="btn btn-danger" href="{{ route('admin.breakingNews.index') }}">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('js')

@endpush