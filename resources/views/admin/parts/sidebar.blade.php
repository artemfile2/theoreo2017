<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
               {{-- @if(Auth::user()->upload)
                    <img src="{{ asset('/image/fit/100/100/' . Auth::user()->upload->path . '.' . Auth::user()->upload->ext) }}" class="img-circle" alt="{{ Auth::user()->name }}" />
                @else
                    <img src="{{ asset('/image/fit/100/100/default.jpg') }}" class="img-circle" alt="{{ Auth::user()->name }}" />
                @endif--}}

                <img src="{{ asset('/img/admin/users/avatar.png') }}"
                     class="img-circle"
                     alt="{{ 'user999' }}" />
            </div>
            <div class="pull-left info">
                {{--<p>{{ Auth::user()->name }}</p>--}}
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i>
                    {{--{{ Auth::user()->role->name }}--}}
                    {{ 'user999' }}
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">ПАНЕЛЬ АДМИНИСТРАТОРА</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="{{ (URL::current() == route('admin')) ? "active" : '' }}">
                <a href="{{ route('admin') }}">
                    <i class="fa fa-gears"></i>
                    <span>Панель управления</span>
                </a>
            </li>
            {{--@can('control', \App\Models\User::class)--}}
                <li class="{{ (URL::current() == route('admin.user.get_all')) ? "active" : '' }}">
                    <a href="{{ route('admin.user.get_all') }}">
                        <i class="fa fa-users"></i>
                        <span>Пользователи</span>
                    </a>
                </li>
            {{--@endcan
            @can('control', \App\Models\Brand::class)--}}
                <li class="{{ (URL::current() == route('admin.brands.get_all')) ? "active" : '' }}">
                    <a href="{{ route('admin.brands.get_all') }}">
                        <i class="fa fa-building"></i>
                        <span>Компании</span>
                    </a>
                </li>
            {{--@endcan
            @can('control', \App\Models\Action::class)--}}
                <li class="{{ (URL::current() == route('admin.actions')) ? "active" : '' }}">
                    <a href="{{ route('admin.actions') }}">
                        <i class="fa fa-fire"></i>
                        <span>Акции</span>
                    </a>
                </li>
            {{--@endcan--}}
            {{--<li>
                <a href="{{ route('admin.comments') }}">
                    <i class="fa fa-percent"></i>
                    <span>Комментарии</span>
                </a>.users
            </li>--}}
            <li class="{{ (URL::current() == route('admin.content')) ? "active" : '' }}">
                <a href="{{ route('admin.content') }}">
                    <i class="fa fa-th"></i>
                    <span>Контент</span>
                </a>
            </li>
            {{--@can('control', \App\Models\Tag::class)--}}
                <li class="">
                    <a href="#">
                        <i class="fa fa-tags"></i>
                        <span>Теги</span>
                    </a>
                </li>
            {{--@endcan--}}
            <li class="{{ (URL::current() == route('admin.logs')) ? "active" : '' }}">
                <a href="{{ route('admin.logs') }}">
                    <i class="fa fa-tasks"></i>
                    <span>Логи парсера</span>
                </a>
            </li>
            <li class="{{ (URL::current() == route('admin.queries')) ? "active" : '' }}">
                <a href="{{ route('admin.queries') }}">
                    <i class="fa fa-search"></i>
                    <span>Поисковые запросы</span>
                </a>
            </li>
        </ul>
    </section>
</aside>