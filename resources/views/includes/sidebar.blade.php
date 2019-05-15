<div class="page-sidebar-wrapper">
<!-- BEGIN SIDEBAR -->
<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
<div class="page-sidebar navbar-collapse collapse">
    <!-- END SIDEBAR MENU -->
    <div class="page-sidebar-wrapper">
        <!-- BEGIN RESPONSIVE MENU FOR HORIZONTAL & SIDEBAR MENU -->
        <ul class="page-sidebar-menu visible-sm visible-xs  page-header-fixed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            <!-- DOC: This is mobile version of the horizontal menu. The desktop version is defined(duplicated) in the header above -->
            <li class="sidebar-search-wrapper">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                <form class="sidebar-search sidebar-search-bordered" action="extra_search.html" method="POST">
                    <a href="javascript:;" class="remove">
                        <i class="icon-close"></i>
                    </a>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn submit">
                                <i class="icon-magnifier"></i>
                            </button>
                        </span>
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            @php
                $path=Request::path();
            @endphp
            <li class="nav-item start {{$path=='beranda' ? 'active open' : ''}}">
                <a href="{{url('beranda')}}" class="nav-link nav-toggle"> Beranda
                    @if ($path=='beranda')
                        <span class="selected"> </span>
                    @endif
                </a>
            </li>
            <li class="nav-item start {{$path=='muzzaki' ? 'active open' : ''}}">
                <a href="{{url('muzzaki')}}" class="nav-link nav-toggle"> Muzzaki
                    @if ($path=='muzzaki')
                        <span class="selected"> </span>
                    @endif
                </a>
            </li>
            <li class="nav-item start {{$path=='zis-siswa' ? 'active open' : ''}}">
                <a href="{{url('zis-siswa')}}" class="nav-link nav-toggle"> ZIS Siswa
                    @if ($path=='zis-siswa')
                        <span class="selected"> </span>
                    @endif
                </a>
            </li>
            <li class="nav-item start {{$path=='zis-muzzaki' ? 'active open' : ''}}">
                <a href="{{url('zis-muzzaki')}}" class="nav-link nav-toggle"> ZIS Muzzaki
                    @if ($path=='zis-muzzaki')
                        <span class="selected"> </span>
                    @endif
                </a>
            </li>
            <li class="nav-item start {{$path=='laporan' ? 'active open' : ''}}">
                <a href="{{url('laporan')}}" class="nav-link nav-toggle"> Laporan
                    @if ($path=='laporan')
                        <span class="selected"> </span>
                    @endif
                </a>
            </li>
            
        </ul>
        <!-- END RESPONSIVE MENU FOR HORIZONTAL & SIDEBAR MENU -->
    </div>
</div>
<!-- END SIDEBAR -->
                </div>