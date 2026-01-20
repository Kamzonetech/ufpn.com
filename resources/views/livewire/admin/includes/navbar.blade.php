<div class="vertical-menu">

    <div class="h-100">

        <div class="user-wid text-center py-4">
            <div class="user-img">
                <img src="{{ asset('admin/assets/images/users/'.Auth::user()->profile_photo_path) }}?t={{ now() }}" id="profile-image" alt="" class="avatar-md mx-auto rounded-circle">
            </div>

            <div class="mt-3">

                <a href="#" class="text-body fw-medium font-size-16">{{ Auth::user()->surname." ".Auth::user()->othernames}}</a>
                <p class="text-muted mt-1 mb-0 font-size-13">{{ Auth::user()->user_type }}</p>

            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="mdi mdi-airplay"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-users"></i>
                        <span>Team Members</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('team.create') }}">Add Team Member</a></li>
                        <li><a href="{{ route('team.index') }}">Manage Team Members</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-settings"></i>
                        <span>Projects/Portfolio</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('project.create') }}">Add Project</a></li>
                        <li><a href="{{ route('project.index') }}">Manage Projects</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-frequently-asked-questions"></i>
                        <span>Services</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('service.create') }}">Add Service</a></li>
                        <li><a href="{{ route('service.index') }}">Manage Services</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-newspaper-variant-outline"></i>
                        <span>News Update</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('news.create') }}">Post News</a></li>
                        <li><a href="{{ route('news.index') }}">Manage News</a></li>
                        <li><a href="{{ route('subscriber.index') }}">New Letter Subcribers</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>

