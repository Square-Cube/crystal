<div class="top-header">
    <div class="toggle-icon"  data-toggle="tooltip" data-placement="right" title="Toggle Menu">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <ul class="top-header-links">
        @if(auth()->guard('admins')->user()->type == 'promoter')
            <li class="dropdown">
                <button class="custom-btn dropdown-toggle" type="button" data-toggle="dropdown">
                    <i class="far fa-bell"></i>
                    <div class="count">{{\App\Notification::where('receiver_id' , auth()->guard('admins')->user()->id)->count()}}</div>
                </button>
                <div class="dropdown-menu">
                    <ul>
                        @php
                            $notifications = \App\Notification::where('receiver_id' , Auth::guard('admins')->user()->id)->take(3)->get()
                        @endphp
                        @foreach($notifications as $notification)
                            <li class="notfy-item">
                                You have a new message
                                <div class="notfy-time">
                                    <i class="far fa-clock"></i>
                                    {{$notification->created_at->diffForHumans()}}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="drop-footer">
                        <a href="{{route('admin.notifications.all')}}">view all</a>
                    </div>
                </div>
            </li>
        @endif
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