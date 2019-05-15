 <div class="page-header navbar navbar-fixed-top" style="background:#fff;border-bottom:2px solid #000;">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="index.html">
                            <img src="{{asset('img/salam-aid.png')}}" alt="logo" class="logo-default" style="height:40px;margin-top:0px;"/> </a>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN MEGA MENU -->
                    <!-- DOC: Remove "hor-menu-light" class to have a horizontal menu with theme background instead of white background -->
                    <!-- DOC: This is desktop version of the horizontal menu. The mobile version is defined(duplicated) in the responsive menu below along with sidebar menu. So the horizontal menu has 2 seperate versions -->
                    @php
                        $path=Request::path();
                    @endphp
                    <div class="hor-menu   hidden-sm hidden-xs">
                        <ul class="nav navbar-nav">
                            <!-- DOC: Remove data-hover="megamenu-dropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
                            <li class="classic-menu-dropdown {{$path=='beranda' ? 'active' : ''}}" aria-haspopup="true">
                                <a href="{{url('beranda')}}"> Beranda
                                    @if ($path=='beranda')
                                        <span class="selected"> </span>
                                    @endif
                                </a>
                            </li>
                            <li class="classic-menu-dropdown {{$path=='muzzaki' ? 'active' : ''}}" aria-haspopup="true">
                                <a href="{{url('muzzaki')}}"> Muzzaki
                                    @if ($path=='muzzaki')
                                        <span class="selected"> </span>
                                    @endif
                                </a>
                            </li>
                            <li class="classic-menu-dropdown {{$path=='zis-siswa' ? 'active' : ''}}" aria-haspopup="true">
                                <a href="{{url('zis-siswa')}}"> ZIS Siswa
                                    @if ($path=='zis-siswa')
                                        <span class="selected"> </span>
                                    @endif
                                </a>
                            </li>
                            <li class="classic-menu-dropdown {{$path=='zis-muzzaki' ? 'active' : ''}}" aria-haspopup="true">
                                <a href="{{url('zis-muzzaki')}}"> ZIS Muzzaki
                                    @if ($path=='zis-muzzaki')
                                        <span class="selected"> </span>
                                    @endif
                                </a>
                            </li>
                            <li class="classic-menu-dropdown {{$path=='laporan' ? 'active' : ''}}" aria-haspopup="true">
                                <a href="{{url('laporan')}}"> Laporan
                                    @if ($path=='laporan')
                                        <span class="selected"> </span>
                                    @endif
                                </a>
                            </li>
                            <li class="classic-menu-dropdown {{$path=='laporan-per-kelas' ? 'active' : ''}}" aria-haspopup="true">
                                <a href="{{url('laporan-per-kelas')}}"> Laporan Per Kelas
                                    @if ($path=='laporan-per-kelas')
                                        <span class="selected"> </span>
                                    @endif
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                    <!-- END MEGA MENU -->
                    <!-- BEGIN HEADER SEARCH BOX -->
                    <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
                    {{-- <form class="search-form" action="extra_search.html" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search..." name="query">
                            <span class="input-group-btn">
                                <a href="javascript:;" class="btn submit">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </span>
                        </div>
                    </form> --}}
                    <!-- END HEADER SEARCH BOX -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="{{asset('assets/layouts/layout/img/avatar3_small.jpg')}}" />
                                    <span class="username username-hide-on-mobile" style="color:#000"> {{Auth::user()->name}} </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    {{-- <li>
                                        <a href="page_user_profile_1.html">
                                            <i class="icon-user"></i> My Profile </a>
                                    </li>
                                     --}}
                                    <li>
                                        <a href="{{url('logout')}}">
                                            <i class="icon-key"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                            <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            
                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END HEADER INNER -->
            </div>
<style>
.navbar-nav>li>a
{
    color:#000 !important;
}
.navbar-nav>li>a:hover
{
    color:#fff !important;
}
</style>