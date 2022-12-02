<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="/index.html" title="Sleek Dashboard">
                <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30"
                    height="33" viewBox="0 0 30 33">
                    <g fill="none" fill-rule="evenodd">
                        <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                        <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                    </g>
                </svg>

                <span class="brand-name text-truncate">Admin Dashboard</span>
            </a>
        </div>

        <!-- begin sidebar scrollbar -->
        <div class="" data-simplebar style="height: 100%;">
            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
                <li class="has-sub ">
                    <a class="sidenav-item-link" href="#">
                        <span class="nav-text">Home</span> <b class="caret"></b>
                    </a>
                </li>
                <li class="has-sub ">
                    <a class="sidenav-item-link" href="{{ route('home.slider') }}">
                        <span class="nav-text">Slider</span> <b class="caret"></b>
                    </a>
                </li>

                <li class="has-sub ">
                    <a class="sidenav-item-link" href="{{ route('home.about') }}">
                        <span class="nav-text">About us</span> <b class="caret"></b>
                    </a>
                </li>

                <li class="has-sub ">
                    <a class="sidenav-item-link" href="#">
                        <span class="nav-text">Portfolio</span> <b class="caret"></b>
                    </a>
                </li>

                <li class="has-sub ">
                    <a class="sidenav-item-link" href="{{ route('all.brand') }}">
                        <span class="nav-text">Brand</span> <b class="caret"></b>
                    </a>
                </li>

            </ul>
        </div>

        {{-- <div class="sidebar-footer">
            <hr class="separator mb-0" />
            <div class="sidebar-footer-content">
                <h6 class="text-uppercase">
                    Cpu Uses <span class="float-right">40%</span>
                </h6>

                <div class="progress progress-xs">
                    <div class="progress-bar active" style="width: 40%;" role="progressbar"></div>
                </div>

                <h6 class="text-uppercase">
                    Memory Uses <span class="float-right">65%</span>
                </h6>

                <div class="progress progress-xs">
                    <div class="progress-bar progress-bar-warning" style="width: 65%;" role="progressbar">
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</aside>
