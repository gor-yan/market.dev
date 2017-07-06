<div id="log-reg-header">
    <div class="header">
        <nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span><span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://www.jquery2dotnet.com">Market Place</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                    class="glyphicon glyphicon-comment"></span>Chats <span class="label label-primary">42</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><span class="label label-warning">7:00 AM</span>Hi :)</a></li>
                            <li><a href="#"><span class="label label-warning">8:00 AM</span>How are you?</a></li>
                            <li><a href="#"><span class="label label-warning">9:00 AM</span>What are you doing?</a></li>
                            <li class="divider"></li>
                            <li><a href="#" class="text-center">View All</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                    class="glyphicon glyphicon-envelope"></span>Inbox <span class="label label-info">32</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><span class="label label-warning">4:00 AM</span>Favourites Snippet</a></li>
                            <li><a href="#"><span class="label label-warning">4:30 AM</span>Email marketing</a></li>
                            <li><a href="#"><span class="label label-warning">5:00 AM</span>Subscriber focused email
                                    design</a></li>
                            <li class="divider"></li>
                            <li><a href="#" class="text-center">View All</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                    class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }} <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span>Profile</a></li>
                            <li><a href="{{url('freelancer/settings/main')}}"><span class="glyphicon glyphicon-cog"></span>Settings</a></li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="active" title="Navigation will be filled with other menu items during development and should be redesigned">
                        <a href="{{url('/')}}">
                            <span class="glyphicon glyphicon-home"></span>Dashboard</a>
                    </li>
                    <li class="active" title="Navigation will be filled with other menu items during development and should be redesigned">
                        <a href="{{url('/freelancer/proposals-history')}}">
                            <span class="fa fa-history"></span>My Job History</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    </div>
</div>
























