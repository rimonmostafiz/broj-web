<div class="col-md-3">
    <div class="sidebar content-box" style="display: block;">
        <ul class="nav">
            <!-- Main menu -->
            <li class="current"><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
            <!-- contest -->
            <li class="submenu">
                <a href="#">
                    <i class="fa fa-list"></i> Contest
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="{{ url('/contest-list') }}">Contest List</a></li>
                    <li><a href="{{ url('/contest-add') }}">Add Contest</a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#">
                    <i class="fa fa-list"></i> Pages
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="signup.html">Signup</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>