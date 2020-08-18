@extends('layouts.backend.app')

@section('title', 'Dashboard')

@push('css')
   <style>
       .box{
            background: cadetblue; padding: 40px;border-radius: 20%; margin-bottom: 20px;
       }
       .box:hover{
           opacity: .90;
           background-color: rgb(100, 128, 129)
       }
    </style> 
@endpush


@section('content')

    <div class="container">
        <div class="row">
            <h2>Dashboard</h2>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="box text-center">
                    <h4>Total Author News</h4>
                    <h2>{{ $posts->count() }}</h2>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box text-center">
                    <h4>Total Categories</h4>
                    <h2>{{ $categories->count() }}</h2>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box text-center">
                    <h4>Total Authors</h4>
                    <h2>{{ $authors->count() }}</h2>
                </div>
            </div>
        </div>
    </div>
          
       
    

@endsection

@push('js')
    
<!-- Jquery CountTo Plugin Js -->
<script src="{{ asset('assets/backend/plugins/jquery-countto/jquery.countTo.js') }}"></script>

<!-- Morris Plugin Js -->
<script src="{{ asset('assets/backend/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/morrisjs/morris.js') }}"></script>

<!-- ChartJs -->
<script src="{{ asset('assets/backend/plugins/chartjs/Chart.bundle.js') }}"></script>

<!-- Flot Charts Plugin Js -->
<script src="{{ asset('assets/backend/plugins/flot-charts/jquery.flot.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/flot-charts/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/flot-charts/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/flot-charts/jquery.flot.categories.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/flot-charts/jquery.flot.time.js') }}"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="{{ asset('assets/backend/plugins/jquery-sparkline/jquery.sparkline.js') }}"></script>


<script src="{{ asset('assets/backend/js/pages/index.js') }}"></script>
@endpush