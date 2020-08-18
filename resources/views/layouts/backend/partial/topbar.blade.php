<!-- Top Bar -->
<nav class="navbar " style="background: rgb(209, 97, 97);">
    <div class="container-fluid ">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
          @if (Request::is('admin*'))
            <a class="navbar-brand" href="{{ route('mainhome') }}">Admin Panel</a>
            @endif

            @if (Request::is('author*'))
            <a class="navbar-brand" href="{{ route('mainhome') }}">Author Panel</a>
            @endif


        </div>
        
    </div>
</nav>
<!-- #Top Bar -->