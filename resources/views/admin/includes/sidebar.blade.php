<div class="sidebar sidebar-dark sidebar-fixed border-end" id="sidebar">
    <div class="sidebar-header border-bottom">
        <div class="sidebar-brand">
            <div class="sidebar-brand-full">
                <img src="{{ asset('assets/admin/images/logo/weblogo.png') }}" alt="">
            </div>
            <svg class="sidebar-brand-narrow" width="32" height="32" alt="CoreUI Logo">
                <use xlink:href="{{ asset('assets/admin/assets/brand/coreui.svg#signet') }}"></use>
            </svg>
        </div>
        <button class="btn-close d-lg-none" type="button" data-coreui-theme="dark" aria-label="Close"
            onclick="coreui.Sidebar.getInstance(document.querySelector(&quot;#sidebar&quot;)).toggle()"></button>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">
                <svg class="nav-icon">
                    <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-speedometer"></use>
                </svg> Dashboard<span class="badge badge-sm bg-info ms-auto">NEW</span></a></li>
        <li class="nav-title">Components</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-puzzle"></use>
                </svg> Users</a>
            <ul class="nav-group-items compact">
                <li class="nav-item"><a class="nav-link" href="{{ route('all.users') }}"><span class="nav-icon"><span
                    class="nav-icon-bullet"></span></span> All Users</a></li>
            </ul>
        </li>

    </ul>
    <div class="sidebar-footer border-top d-none d-md-flex">
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
</div>
