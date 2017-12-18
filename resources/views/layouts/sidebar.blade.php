        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" style="max-width:64px;max-height:64px" class="img-circle" src="@if (Auth()->user()->avatar) {{asset('admin/avatars/'.Auth()->user()->avatar)}} @else {{asset('admin/avatars/profile.png')}} @endif" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Auth()->user()->name }}</strong>
                             </span> <span class="text-muted text-xs block">RH <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="{{route('user', ['id' => Auth()->user()->id])}}">Perfil</a></li>
                                <li class="divider"></li>
                                <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            MP+
                        </div>
                    </li>
                    <li class="active">
                        <a href="{{route('home')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Painel</span> </a>
                    </li>
                    <li>
                        <a href="{{route('departments')}}"><i class="fa fa-balance-scale"></i> <span class="nav-label">Departamentos</span></a>
                    </li>
                    <li>
                        <a href="{{route('processes')}}"><i class="fa fa-cogs"></i> <span class="nav-label">Processos</span></a>
                    </li>
                     <li>
                        <a href="{{route('tasks')}}"><i class="fa fa-calendar"></i> <span class="nav-label">Tarefas</span></a>
                    </li>
                    <li>
                        <a href="{{route('users')}}"><i class="fa fa-users"></i> <span class="nav-label">Usuarios</span></a>
                    </li>
                </ul>

            </div>
        </nav>