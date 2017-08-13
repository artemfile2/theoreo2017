<header class="main-header">

    <!-- Logo -->
    {{--<a href="" class="logo"><b>Admin</b>.THEOREO</a>--}}
    <a href="" class="logo"><img src="/img/logo.png" alt=""></a>
    
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        {{--@if(Auth::user()->upload)
                            <img src="{{ asset('/image/fit/100/100/' . Auth::user()->upload->path . '.' . Auth::user()->upload->ext) }}" class="user-image" alt="{{ Auth::user()->name }}" />
                        @else
                            <img src="{{ asset('/image/fit/100/100/default.jpg') }}" class="user-image" alt="{{ Auth::user()->name }}" />
                        @endif--}}
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        {{--<span class="hidden-xs">{{ Auth::user()->name }}</span>--}}

                        <img src="{{ asset('/img/admin/users/avatar3.png') }}" class="img-circle" alt="{{ 'user999' }}" />
                        <span class="hidden-xs">{{ 'user999' }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            {{--@if(Auth::user()->upload)
                                <img src="{{ asset('/image/fit/100/100/' . Auth::user()->upload->path . '.' . Auth::user()->upload->ext) }}" class="img-circle" alt="{{ Auth::user()->name }}" />
                            @else
                                <img src="{{ asset('/image/fit/100/100/default.jpg') }}" class="img-circle" alt="{{ Auth::user()->name }}" />
                            @endif--}}
                            <img src="{{ asset('/img/admin/users/avatar.png') }}" class="img-circle" alt="{{ 'user999' }}" />
                            <p>
                                {{--{{ Auth::user()->name }}
                                <small>{{ Auth::user()->role->name }}</small>--}}
                                {{ 'user999' }}
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Профиль</a>
                            </div>
                            <div class="pull-right">
                                <a href="#" class="btn btn-default btn-flat">Выйти</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>