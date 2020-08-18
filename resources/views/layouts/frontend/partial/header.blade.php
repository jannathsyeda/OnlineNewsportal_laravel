<header>

    <style>
      .navbar ul li a{
          font-size: 18px;
          color: white! important;
          font-weight: bold;
        }
        .navbar ul li a:hover{
          background-color: rgb(203, 206, 205);
          color: black;
          padding: 5px;
          height: 100%;
        }
    </style>
    
  

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="newspapper-name">
                        <h1>Star News</h1>
                        {{-- <p><strong>Sunday</strong>, June 07, 2020</p> --}}
                        <div id="time"></div>
                    </div>
                   
                </div>
            </div>
        </div>


        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="{{ route('mainhome') }}">Newsportal</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
                
                  <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Categories of News
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      @foreach ($categories as $category)
              <a class="dropdown-item" href="{{ route('category.index',$category->id) }}">{{ $category->name }}</a>
                      @endforeach


                    </div>
                  </div>
                  
                <li class="nav-item ">
                  <a class="nav-link" href="{{ route('mainhome') }}">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href=" {{ route('post.index') }}">All News</a>
                </li>
               

                @guest
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('register') }}">Register</a></li>
            @else
                @if (Auth::user()->role_id == 1)
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                @endif
                @if (Auth::user()->role_id == 2)
                    <li class="nav-item"><a class="nav-link" href="{{ route('author.dashboard') }}">Dashboard</a></li>
                @endif
            @endguest
              </ul>
              <form class="form-inline my-2 my-lg-0" method="POST" action="{{ route('subscriber.store') }}">
                @csrf
                <input name="email" class="form-control mr-sm-2" type="email" placeholder="Email" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Subscribe</button>
              </form>
            </div>
          </nav>

    
</header>

<script type="text/javascript">
  
  var date = new Date();
  var days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
  var months = ["January","February","March","April","May","June","July","August","September", "October", "November", "December"];
  document.getElementById("time").innerHTML = '<strong>' + days[date.getDay()] + '</strong>' + ', ' + months[date.getMonth()] + ' ' + date.getDate() + ', ' + date.getFullYear();

  
</script>