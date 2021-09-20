<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Yupe!</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{ asset('template/assets/img/logo.png') }}" type="image/x-icon" />



    <!-- Fonts and icons -->
    <script src="{{ asset('template/assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <!-- ComboBox-->
    <script src="{{ asset('template/assets/js/combobox.js') }}"></script>

    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ['{{ asset('template/assets/css/fonts.min.css') }}']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/atlantis.min.css') }}">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/demo.css') }}">
    <!-- <link rel="stylesheet" href="assets/css/AdminLTE.min.css"> -->
    <link rel="stylesheet" href="{{ asset('template/assets/iCheck/square/blue.css') }}">
    <!-- ComboBox -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/combobox.css') }}">
    <script src="{{ asset('template/assets/css/combobox.js') }}"></script>


</head>

<body style="background-color: #ff8093">



    <div class="wrapper">
        <div class="main-header _head">
            <!-- Logo Header (logo que aparece para mobile) -->
            <div class="logo-header" style="background-color: #ff8093">

                <a href="" class="logo">
                    <font style="color:black;font-size:24px;">YUPE</font>
                    <!-- <img src="../assets/img/logo.svg" alt="navbar brand" class="navbar-brand"> -->
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->
            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark">

                <div class="container-fluid">

                    <div class="collapse" id="search-nav">
                        <form class="navbar-left navbar-form nav-search mr-md-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-search pr-1">
                                        {{-- <i class="fa fa-search search-icon"></i> --}}
                                    </button>
                                </div>
                                <input type="text" placeholder="Pesquisar ..." class="form-control">
                            </div>
                        </form>
                    </div>
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item toggle-nav-search hidden-caret">
                            <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button"
                                aria-expanded="false" aria-controls="search-nav">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
                                aria-expanded="false">
                                <div class="avatar-sm">
                                    <img src="{{ asset('template/assets/img/sem_foto2.jpeg') }}" alt="..."
                                        class="avatar-img rounded-circle">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>

                                        <a class="dropdown-item"
                                            href="{{ url('user1.edit') }}?id={{ Auth::user()->id }}">
                                            <i class="fas fa-user-alt"></i>
                                            <strong>{{ Auth::user()->name }}</strong> </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('user.edit') }}">
                                            <i class="far fa-edit"></i>
                                            <span class="link-collapse">Mudar senha</span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <div class="dropdown-divider"></div>

                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fas fa-window-close"></i>
                                            {{ __('Terminar sessão') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
        <!-- Sidebar -->
        <div class="sidebar sidebar-style-2" id="idSideBar" style="background-color: #000000;">



            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-danger">
                        <li class="nav-item " onmouseover="this.style.background='#ff8093';"
                            onmouseout="this.style.background='black';">
                            <a href="{{ url('/') }}">
                                <i class=" fas fa-home"></i>
                                <p style="color: white">Home</p>
                            </a>
                        </li>
                        <li class="
                                    nav-item"
                            onmouseover="this.style.background='#ff8093';" onmouseout="this.style.background='black';">
                            <a href="{{ url('user1.edit') }}?id={{ Auth::user()->id }}">
                                <i class="fas fa-user"></i>
                                <p style="color: white">Perfil</p>
                            </a>
                        </li>
                        <li class="nav-item" onmouseover="this.style.background='#ff8093';"
                            onmouseout="this.style.background='black';">
                            <a href="{{ url('users') }}">
                                <i class="fas fa-user-friends"></i>
                                <p style="color: white">Gerir Usuários</p>
                            </a>
                        </li>


                        <li class="nav-item" onmouseover="this.style.background='#ff8093';"
                            onmouseout="this.style.background='black';">
                            <a href="{{ route('user.edit') }}">
                                <i class="far fa-edit"></i>
                                <p style="color: white">Trocar senha</p>
                            </a>
                        </li>
                        <li class="nav-item" onmouseover="this.style.background='#ff8093';"
                            onmouseout="this.style.background='black';">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="fas fa-window-close"></i>
                                <p style="color: white">Encerrar</p>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>


                </div>
            </div>





        </div>
        <!-- //end Sidebar -->
        <!-- <div class="main-panel _main_" style="background-color: #F8F8FF";> -->
        <!-- <div class="content _conteudo" style="background-color: #F8F8FF;"> -->

        <div class="main-panel">
            <section class="content">

                @yield('body')

            </section>


            <!-- </div>				 -->
            <footer class="footer _rodapeh">
                <div class="container-fluid">
                    <nav class="copyright ml-auto">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" target="_blank" href="http://www.actecn.com">
                                    Desenvolvido por: ACTECH
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </footer>
            <!-- </div> -->
        </div>
    </div>
    <!-- //bibliotecas css para o projecto -->
    <!--   Core JS Files | //bibliotecas css para o projecto  -->
    <script src="{{ asset('template/assets/js/core/jquery.3.2.1.min.js') }}"></script>

    <script src="{{ asset('template/assets/js/core/popper.min.js') }}"></script>

    <script src="{{ asset('template/assets/js/core/bootstrap.min.js') }}"></script>
    <!-- jQuery UI -->
    <script src="{{ asset('template/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>

    <script src="{{ asset('template/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('template/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <!-- Atlantis JS -->
    <script src="{{ asset('template/assets/js/atlantis.min.js') }}"></script>
    <!-- Atlantis DEMO methods, don't include it in your project! -->
    <script src="{{ asset('template/assets/js/setting-demo2.js') }}"></script>
    <script src="{{ asset('template/assets/iCheck/icheck.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/app.js') }}"></script>


    <!-- Datatables -->
    <script src="{{ asset('template/assets/js/plugin/datatables/datatables.min.js') }}"></script>


    <script>
        $(document).ready(function() {
            $('#basic-datatables').DataTable({});

            $('#multi-filter-select').DataTable({
                "pageLength": 5,
                initComplete: function() {
                    this.api().columns().every(function() {
                        var column = this;
                        var select = $(
                                '<select class="form-control"><option value=""></option></select>'
                            )
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });

                        column.data().unique().sort().each(function(d, j) {
                            select.append('<option value="' + d + '">' + d +
                                '</option>')
                        });
                    });
                }
            });

            // Add Row
            $('#add-row').DataTable({
                "pageLength": 5,
            });

            var action =
                '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

            $('#addRowButton').click(function() {
                $('#add-row').dataTable().fnAddData([
                    $("#addName").val(),
                    $("#addPosition").val(),
                    $("#addOffice").val(),
                    action
                ]);
                $('#addRowModal').modal('hide');

            });
        });
    </script>

    <script>
        var goFS = document.getElementById("goFS");
        goFS.addEventListener("click", function() {
            document.body.requestFullscreen();
        }, false);
    </script>





</body>

</html>
