@include('admin.layouts.header')

<div class="d-flex" id="wrapper">
    {{-- Sidebar --}}
    @include('admin.layouts.sidebar')

    {{-- Page Content --}}
    <div id="page-content-wrapper" class="flex-grow-1 d-flex flex-column">
        {{-- Topbar nằm trong content để sidebar kéo từ trên xuống --}}
        @include('admin.layouts.topbar')

        <div class="container-fluid py-4 flex-grow-1">
            @yield('content')
        </div>

    </div>
</div>
@include('admin.layouts.footer')