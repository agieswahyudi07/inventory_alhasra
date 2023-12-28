<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>AL-HASRA INVENTARIS</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- jquery --}}
    <script src="{{ asset('https://code.jquery.com/jquery-3.6.0.min.js') }}"></script>


    <!-- Favicons -->
    <link href="{{ asset('assets/img/al-hasra.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    <link rel="stylesheet"
        href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css') }}">


    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- Styles -->

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->


</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="/" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/img/al-hasra.png') }}" alt="">
                <span class="d-none d-lg-block">AL-HASRA</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        {{-- <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar --> --}}

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown">

                    {{-- <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon --> --}}
                    {{-- 
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum   ga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items --> --}}

                </li><!-- End Notification Nav -->

                {{-- <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items --> --}}

                </li><!-- End Messages Nav -->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>Kevin Anderson</h6>
                            <span>Web Designer</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-heading">INTERFACE</li>

            <li class="nav-item">
                <a class="nav-link " href="/">
                    <i class="bi bi-grid"></i>
                    <span>DASHBOARD</span>
                </a>
            </li><!-- End Dashboard Nav -->


            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-toggle="collapse" href="#office-nav">
                    <i class="bi bi-building"></i><span>YAYASAN</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="office-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    @foreach (app('data2')['yayasan'] as $yayasan)
                        <li>
                            <a href="{{ route('item.room.index', ['room_id' => $yayasan['room_id']]) }}">
                                <i
                                    class="bi bi-circle"></i>{{ $yayasan['room_code'] . '-' . $yayasan['room_name'] }}<span></span>
                            </a>
                        </li>
                    @endforeach

                </ul>
            </li>



            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-toggle="collapse" href="#smk-nav">
                    <i class="ri-home-gear-line"></i><span>SMK</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="smk-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    @foreach (app('data2')['smk'] as $smk)
                        <li>
                            <a href="{{ route('item.room.index', ['room_id' => $smk['room_id']]) }}">
                                <i
                                    class="bi bi-circle"></i>{{ $smk['room_code'] . '-' . $smk['room_name'] }}<span></span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-toggle="collapse" href="#sma-nav">
                    <i class="ri-home-smile-2-line"></i><span>SMA</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="sma-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    @foreach (app('data2')['sma'] as $sma)
                        <li>
                            <a href="{{ route('item.room.index', ['room_id' => $sma['room_id']]) }}">
                                <i
                                    class="bi bi-circle"></i>{{ $sma['room_code'] . '-' . $sma['room_name'] }}<span></span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-toggle="collapse" href="#smp-nav">
                    <i class="ri-home-wifi-line"></i><span>SMP</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="smp-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    @foreach (app('data2')['smp'] as $smp)
                        <li>
                            <a href="{{ route('item.room.index', ['room_id' => $smp['room_id']]) }}">
                                <i
                                    class="bi bi-circle"></i>{{ $smp['room_code'] . '-' . $smp['room_name'] }}<span></span>
                            </a>
                        </li>
                    @endforeach
                    {{-- KELAS IX   --}}

                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-toggle="collapse" href="#special-room-nav">
                    <i class="ri-microscope-line"></i><span>FACILITIES</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="special-room-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    @foreach (app('data2')['facilities'] as $fct)
                        <li>
                            <a href="{{ route('item.room.index', ['room_id' => $fct['room_id']]) }}">
                                <i
                                    class="bi bi-circle"></i>{{ $fct['room_code'] . '-' . $fct['room_name'] }}<span></span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>

            <li class="nav-heading">SETTING</li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-toggle="collapse" href="#option-nav">
                    <i class="bi bi-gear"></i><span>Option</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="option-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">

                    <li>
                        <a href="{{ route('item.index') }}">
                            <i class="bi bi-circle"></i><span>ITEM</span>
                        </a>
                    </li>
                    {{-- <li>
              <a href="{{ route('institution.index') }}">
                <i class="bi bi-circle"></i><span>INSTITUTION</span>
              </a>
            </li> --}}
                    <li>
                        <a href="{{ route('room.index') }}">
                            <i class="bi bi-circle"></i><span>ROOM</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('category.index') }}">
                            <i class="bi bi-circle"></i><span>CATEGORY</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Forms Nav -->



        </ul>

    </aside><!-- End Sidebar-->

    @yield('main')

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Al-Hasra Inventory</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>


    <!-- Template Main JS File -->

    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
