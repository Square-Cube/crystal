<div class="top-header">
    <div class="toggle-icon"  data-toggle="tooltip" data-placement="right" title="Toggle Menu">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <ul class="top-header-links">
        <li class="dropdown">
            <button class="custom-btn dropdown-toggle" type="button" data-toggle="dropdown">
                <i class="far fa-bell"></i>
                <div class="count">2</div>
            </button>
            <div class="dropdown-menu">
                <ul>
                    <li class="notfy-item">
                        hi , i have some questions
                        <div class="notfy-time">
                            <i class="far fa-clock"></i>
                            now
                        </div>
                    </li>
                    <li class="notfy-item">
                        hi , i have some questions
                        <div class="notfy-time">
                            <i class="far fa-clock"></i>
                            now
                        </div>
                    </li>
                    <li class="notfy-item">
                        hi , i have some questions
                        <div class="notfy-time">
                            <i class="far fa-clock"></i>
                            now
                        </div>
                    </li>
                    <li class="notfy-item">
                        hi , i have some questions
                        <div class="notfy-time">
                            <i class="far fa-clock"></i>
                            now
                        </div>
                    </li>
                </ul>
                <div class="drop-footer">
                    <a href="notifactions.html">view all</a>
                </div>
            </div>
        </li>
        <li class="profile">
            <a href="{{route('admin.dashboard')}}" class="custom-btn">
                <img src="{{asset('storage/uploads/users/'.auth()->guard('admins')->user()->image)}}">
                {{auth()->guard('admins')->user()->name}}
            </a>
        </li>
        @if(auth()->guard('admins')->user()->type == 'promoter')
            <li>
                <a data-url="{{route('admin.breakout')}}" data-token="{!! csrf_token() !!}" class="BreakoutBTN" style="cursor: pointer;">Break</a>
            </li>
        @endif
        <li>
            <a href="{{route('admin.logout')}}"><i class="fa fa-power-off"></i></a>
        </li>
    </ul>
</div>