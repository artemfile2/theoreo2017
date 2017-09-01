<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                @if(Auth::user()->upload)
                    <img src="{{ asset('/image/fit/80/80/' . Auth::user()->upload->path . '.' . Auth::user()->upload->ext) }}" class="img-circle" alt="{{ Auth::user()->name }}" />
                @else
                    <img src="{{ asset('/image/fit/80/80/default.jpg') }}" class="img-circle" alt="{{ Auth::user()->name }}" />
                @endif
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i>
                    {{ Auth::user()->role->name }}
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
            @can('users_management', \App\Models\User::class)
                <li class="{{ (URL::current() == route('admin.user.active')) ? "active" : '' }}">
                    <a href="{{ route('admin.user.active') }}">
                        <i class="fa fa-users"></i>
                        <span>Пользователи</span>
                    </a>
                </li>
            @endcan
            @can('brand_management', \App\Models\User::class)
                <li class="{{ (URL::current() == route('admin.brands.active')) ? "active" : '' }}">
                    <a href="{{ route('admin.brands.active') }}">
                        <i class="fa fa-building"></i>
                        <span>Компании</span>
                    </a>
                </li>
            @endcan
            @can('actions_management', \App\Models\User::class)
                <li class="{{ (URL::current() == route('admin.actions.active') || URL::current() == route('admin.actions.trashed')) ? "active" : '' }}">
                    <a href="{{ route('admin.actions.active') }}">
                        <i class="fa fa-fire"></i>
                        <span>Акции</span>
                    </a>
                </li>
            @endcan
            {{--<li>
                <a href="{{ route('admin.comments') }}">
                    <i class="fa fa-percent"></i>
                    <span>Комментарии</span>
                </a>.users
            </li>--}}
            <li class="{{ (URL::current() == route('admin.content.get_all')) ? "active" : '' }}">
                <a href="{{ route('admin.content.get_all') }}">
                    <i class="fa fa-th"></i>
                    <span>Контент</span>
                </a>
            </li>
            {{--@can('control', \App\Models\Tag::class)--}}
                {{--<li class="">
                    <a href="#">
                        <i class="fa fa-tags"></i>
                        <span>Теги</span>
                    </a>
                </li>--}}
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
            <li class="{{ (URL::current() == route('parser.vksimple')) ? "active" : '' }}">
                <a href="{{ route('parser.vksimple') }}">
                    <i class="fa fa-newspaper-o"></i>
                    <span>Парсинг</span>
                </a>
            </li>
        </ul>
    </section>
</aside>