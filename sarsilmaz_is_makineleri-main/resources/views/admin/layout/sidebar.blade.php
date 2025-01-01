<div class="sidebar sidebar-main sidebar-expand-lg align-self-start">

    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- Sidebar header -->
        <div class="sidebar-section">
            <div class="sidebar-section-body d-flex justify-content-center">
                <h5 class="sidebar-resize-hide flex-grow-1 my-auto">Menü</h5>

                <div>
                    <button type="button" class="btn btn-light btn-icon btn-sm rounded-pill border-transparent sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                        <i class="ph-arrows-left-right"></i>
                    </button>

                    <button type="button" class="btn btn-light btn-icon btn-sm rounded-pill border-transparent sidebar-mobile-main-toggle d-lg-none">
                        <i class="ph-x"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- /sidebar header -->


        <!-- Main navigation -->
        <div class="sidebar-section">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header pt-0">
                    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Main</div>
                    <i class="ph-dots-three sidebar-resize-show"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route("admin.home") }}" class="nav-link @if($title == 'Anasayfa') {{ 'active' }} @endif ">
                        <i class="ph-house"></i>
                        <span>
                            {{ "Anasayfa" }}
                        </span>
                    </a>
                </li>

                <li class="nav-item nav-item">
                    <a href="{{ route("gallery") }}" class="nav-link @if($title == 'Galeri') {{ 'active' }} @endif">
                        <i class="ph-layout"></i>
                        <span>{{ 'Galeri'  }}</span>
                    </a>
                </li>

                <li class="nav-item nav-item">
                    <a href="{{ route("blog") }}" class="nav-link @if($title == 'Blog') {{ 'active' }} @endif">
                        <i class="ph ph-text-align-center"></i>
                        <span>{{ 'Blog'  }}</span>
                    </a>
                </li>

                <li class="nav-item nav-item">
                    <a href="{{ route("service") }}" class="nav-link @if($title == 'Hizmetler') {{ 'active' }} @endif">
                        <i class="ph-light ph-wrench"></i>
                        <span>{{ 'Hizmetler'  }}</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route("slider") }}" class="nav-link @if($title == 'Slider') {{ 'active' }} @endif">
                        <i class="ph ph-cards"></i>
                        <span>Slider</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route("settings") }}" class="nav-link @if($title == 'Ayarlar') {{ 'active' }} @endif">
                        <i class="ph ph-gear-six"></i>
                        <span>Ayarlar</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>

<div class="content-wrapper">


    <!-- Page header -->
    <div class="page-header page-header-light shadow mb-2">
        <div class="page-header-content d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    {{ $title }}  @if($sub_title == "") {{ "" }} @else {{ " - " }}@endif <span class="fw-normal">{{ $sub_title }}</span>
                </h4>

                <a href="#page_header" class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto" data-bs-toggle="collapse">
                    <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- /page header -->

