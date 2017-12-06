<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('images/avatars/avatar.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Navigation</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="{{ request()->segment(2) === null ? 'active' : '' }}"><a href="{{'/'.request()->segment(1) }}"><i class="fa fa-desktop"></i> <span>Dashboard</span></a></li>
            <li class="{{ request()->segment(2) === null ? 'assignments' : '' }}"><a href="#"><i class="fa fa-edit"></i> <span>Assignments</span></a></li>
            <li class="{{ request()->segment(2) === null ? 'calendar' : '' }}"><a href="{{ route('student.calender') }}"><i class="fa fa-calendar"></i> <span>Calendar</span></a></li>

            <li class="treeview {{ (request()->segment(2) === 'grades') || (request()->segment(2) === 'permit') ? 'active-link' : '' }}">
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span>Grades</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('student.grades') }}">Report Card</a></li>
                    <li><a href="{{ route('student.permit') }}">Permit</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class="fa fa-chain"></i> <span>Teachers</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('student.teachers') }}">Rate</a></li>
                </ul>
            </li>

        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
