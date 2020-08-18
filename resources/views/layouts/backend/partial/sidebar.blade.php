<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info" class="img-fluid" style="background-image: url('https://lyrictheatre.co.uk/wp-content/uploads/2018/12/Dark-of-the-Moon-Event.png');background-size: cover">
        
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</div>
        <div class="email">{{ Auth::user()->email }}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                <li><a href="">
                    Settings</a></li>
                    
                    <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       Sign Out
                                    </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu" style="background: rgb(128, 168, 255)">
        <ul class="list">
            @if (Request::is('admin*'))
                <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/category*') ? 'active' : '' }}">
                    <a href="{{ route('admin.category.index') }}">
                        <span>Category</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/post*') ? 'active' : '' }}">
                    <a href="{{ route('admin.post.index') }}">
                        <span>News List</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/pending/post') ? 'active' : '' }}">
                    <a href="{{ route('admin.post.pending') }}">
                        <span>Pending News</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/subscriber') ? 'active' : '' }}">
                    <a href="{{ route('admin.subscriber.index') }}">
                        <span>All Subscriber</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/author') ? 'active' : '' }}">
                    <a href="{{ route('admin.author.index') }}">
                        <span>All Authors</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/breakingNews*') ? 'active' : '' }}">
                    <a href="{{ route('admin.breakingNews.index') }}">
                        <span>BreakingNews</span>
                    </a>
                </li>
               
               
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); 
                             document.getElementById('logout-form').submit();">
                                    <span>Sign Out</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                    </form>
                </li>

            @endif


            @if (Request::is('author*'))
            <li class="{{ Request::is('author/dashboard') ? 'active' : '' }}">
                <a href="{{ route('author.dashboard') }}">
                   
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="{{ Request::is('author/post*') ? 'active' : '' }}">
                <a href="{{ route('author.post.index') }}">
                    <span>News Lists</span>
                </a>
            </li>
           
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); 
                         document.getElementById('logout-form').submit();">
                                <span>Sign Out</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                </form>
            </li>
            @endif


            
        </ul>
    </div>
</aside>