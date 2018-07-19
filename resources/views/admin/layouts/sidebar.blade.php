<div class="side-menu">
    <a href="{{route('admin.dashboard')}}" class="logo">
        @if($project != null)
            <img src="{{asset('storage/uploads/projects/'.$project->logo)}}">
            @else
            <img src="{{asset('assets/admin/images/logo.png')}}">
        @endif
    </a><!--End Logo-->
    <aside class="sidebar">
        <ul class="side-menu-links">
            <li class="@if(Request::route()->getName() == 'admin.dashboard'){{'active'}}@endif">
                <a href="{{route('admin.dashboard')}}">
                    <img src="{{asset('assets/admin/images/dashboard.png')}}">
                    dashboard
                </a>
            </li>
            @if(auth()->guard('admins')->user()->type == 'promoter' && $project != null)
                <li class="@if(Request::route()->getName() == 'admin.interaction'){{'active'}}@endif">
                    <a href="{{route('admin.interaction')}}">
                        <img src="{{asset('assets/admin/images/icon1.png')}}">
                        interaction
                    </a>
                </li>
                <li class="@if(Request::route()->getName() == 'admin.questionnaire'){{'active'}}@endif">
                    <a href="{{route('admin.questionnaire')}}">
                        <img src="{{asset('assets/admin/images/icon2.png')}}">
                        questionnaire
                    </a>
                </li>
                <li class="@if(Request::route()->getName() == 'admin.products'){{'active'}}@endif">
                    <a href="{{route('admin.products')}}">
                        <img src="{{asset('assets/admin/images/icon3.png')}}">
                        products
                    </a>
                </li>
            @endif
            @if(auth()->guard('admins')->user()->type == 'admin')
                <li class="@if(Request::route()->getName() == 'admin.projects'){{'active'}}@endif">
                    <a href="{{route('admin.projects')}}">
                        <img src="{{asset('assets/admin/images/projects.png')}}">
                        projects
                    </a>
                </li>
                <li class="@if(Request::route()->getName() == 'admin.users'){{'active'}}@endif">
                    <a href="{{route('admin.users')}}">
                        <img src="{{asset('assets/admin/images/users.png')}}">
                        users
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.notifications')}}">
                        <img src="{{asset('assets/admin/images/send_notifications.png')}}">
                        send notifications
                    </a>
                </li>
            @endif
        </ul>
    </aside>
</div>