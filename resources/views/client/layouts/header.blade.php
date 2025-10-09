 
 <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

           <a href="{{ url('/') }}" class="logo d-flex align-items-center">
      <img src="{{ asset('assets/img/Logo.png') }}" alt="Logo" class="img-fluid" style="max-height: 40px;">   <h1 class="sitename">Solvis</h1>
    </a>
    

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="home" class="active">Trang chủ</a></li>
           <li class="dropdown"><a href="#"><span>Giới thiệu</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="{{ route('about-me')}}">Về chúng tôi</a></li>
              <li><a href="{{ route('about-partner')}}">Đối tác</a></li>
              <li><a href="{{ route('about-client')}}">Khách hàng</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Sản phẩm</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Dropdown 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul>
          </li>
          <li><a href="#services">Tin tức</a></li>
          <li><a href="#contact">Liên hệ</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>