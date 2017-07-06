<!-- banner -->
<div id="log-reg-header">
    <div class="header">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="agileits-logo">
                    <h1><a href="{{ url('/') }}">Market Place</a></h1>
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                <nav>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="#services" class="scroll">Categories</a></li>
                        <li><a href="#team" class="scroll">Freelancers</a></li>
                        <li><a href="#news" class="scroll">News</a></li>
                        <li><a href="#mail" class="scroll">Contact Us</a></li>
                        <li><a href="{{url('/login')}}">Log In</a></li>
                        <li><a href="{{url('/register-as')}}">Sign In</a></li>
                    </ul>
                </nav>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    </div>
</div>