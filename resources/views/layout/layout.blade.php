<!DOCTYPE html>
<html lang="en">
	<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>@yield('title')</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{ asset('template/assets/img/img_uz_logo.png')}}" type="image/x-icon"/>



	<!-- Fonts and icons -->
	<script src="{{ asset('template/assets/js/plugin/webfont/webfont.min.js')}}"></script>
	<!-- ComboBox-->
        <script src="{{ asset('template/assets/js/combobox.js')}}"></script>

	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{ asset('template/assets/css/fonts.min.css')}}']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

       <!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('template/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{ asset('template/assets/css/atlantis.min.css')}}">
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{ asset('template/assets/css/demo.css')}}">
	<!-- <link rel="stylesheet" href="assets/css/AdminLTE.min.css"> -->
	<link rel="stylesheet" href="{{ asset('template/assets/iCheck/square/blue.css')}}">
        <!-- ComboBox -->
        <link rel="stylesheet" href="{{ asset('template/assets/css/combobox.css')}}">
        <script src="{{ asset('template/assets/css/combobox.js')}}"></script>


</head>
	<body >



		<div class="wrapper">
			<div class="main-header _head" >
				<!-- Logo Header (logo que aparece para mobile) -->
							<div class="logo-header" data-background-color="blue">

				<a href="app.php" class="logo">
					<font style="color:white;font-size:24px;"><strong style="color:gold;">M</strong>SIGA</font>
					<!-- <img src="../assets/img/logo.svg" alt="navbar brand" class="navbar-brand"> -->
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
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
				<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue">

				<div class="container-fluid">
					<!--
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div> -->
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
					<!--	<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li> -->
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-envelope"></i>
							</a>
							<ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
								<li>
									<div class="dropdown-title d-flex justify-content-between align-items-center">
										Messages
										<a href="#" class="small">Mark all as read</a>
									</div>
								</li>
								<li>
									<div class="message-notif-scroll scrollbar-outer">
										<div class="notif-center">
											<a href="#">
												<div class="notif-img">
													<img src="{{ asset('template/assets/img/jm_denis.jpg')}}" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Jimmy Denis</span>
													<span class="block">
														How are you ?
													</span>
													<span class="time">5 minutes ago</span>
												</div>
											</a>
											<a href="#">
												<div class="notif-img">
													<img src="{{ asset('template/assets/img/chadengle.jpg')}}" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Chad</span>
													<span class="block">
														Ok, Thanks !
													</span>
													<span class="time">12 minutes ago</span>
												</div>
											</a>
											<a href="#">
												<div class="notif-img">
													<img src="{{ asset('template/assets/img/mlane.jpg')}}" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Jhon Doe</span>
													<span class="block">
														Ready for the meeting today...
													</span>
													<span class="time">12 minutes ago</span>
												</div>
											</a>
											<a href="#">
												<div class="notif-img">
													<img src="{{ asset('template/assets/img/talha.jpg')}}" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Talha</span>
													<span class="block">
														Hi, Apa Kabar ?
													</span>
													<span class="time">17 minutes ago</span>
												</div>
											</a>
										</div>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">See all messages<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-bell"></i>
								<span class="notification">4</span>
							</a>
							<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
								<li>
									<div class="dropdown-title">You have 4 new notification</div>
								</li>
								<li>
									<div class="notif-center">
										<a href="#">
											<div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
											<div class="notif-content">
												<span class="block">
													New user registered
												</span>
												<span class="time">5 minutes ago</span>
											</div>
										</a>
										<a href="#">
											<div class="notif-icon notif-success"> <i class="fa fa-comment"></i> </div>
											<div class="notif-content">
												<span class="block">
													Rahmad commented on Admin
												</span>
												<span class="time">12 minutes ago</span>
											</div>
										</a>
										<a href="#">
											<div class="notif-img">
												<img src="{{ asset('template/assets/img/profile2.jpg')}}" alt="Img Profile">
											</div>
											<div class="notif-content">
												<span class="block">
													Reza send messages to you
												</span>
												<span class="time">12 minutes ago</span>
											</div>
										</a>
										<a href="#">
											<div class="notif-icon notif-danger"> <i class="fa fa-heart"></i> </div>
											<div class="notif-content">
												<span class="block">
													Farrah liked Admin
												</span>
												<span class="time">17 minutes ago</span>
											</div>
										</a>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
								<i class="fas fa-layer-group"></i>
							</a>
							<div class="dropdown-menu quick-actions quick-actions-primary animated fadeIn">
								<div class="quick-actions-header">
									<span class="title mb-1">Outros Subsistemas</span>
									<span class="subtitle op-8">Shortcuts</span>
								</div>
								<div class="quick-actions-scroll scrollbar-outer">
									<div class="quick-actions-items">
										<div class="row m-0">
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-file-1"></i>
													<span class="text">Generated Report</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-database"></i>
													<span class="text">Create New Database</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-pen"></i>
													<span class="text">Create New Post</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-interface-1"></i>
													<span class="text">Create New Task</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-list"></i>
													<span class="text">Completed Tasks</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-file"></i>
													<span class="text">Create New Invoice</span>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="{{ asset('template/assets/img/sem_foto2.jpeg')}}" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
                                         <a href="#">{{ Auth::user()->name }} </a>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Configurações</a>
										<div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Sair') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
			<div class="sidebar sidebar-style-2" id="idSideBar">



				<div class="sidebar-wrapper scrollbar scrollbar-inner" >
				<div class="sidebar-content" >
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img id="imgProfileSide" src="{{ asset('template/assets/img/sem_foto2.jpeg')}}" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php //echo $usuario->apelido;?>
									<span class="user-level">
								<?php // if($usuario->admin==0) echo'Usuario Normal'; else echo'Administrador'; ?></span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">Meu perfil</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Meu profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Password</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Areas a fim</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-danger">
						<li class="nav-item">
							<a data-toggle="collapse" href="#sidebarLayouts">
								<i class="fas fa-th-list"></i>
								<p>Cadastros</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="sidebarLayouts">
								<ul class="nav nav-collapse">
                                    <li>
                                        <a href="" >
                                            <span class="sub-item">Coordenadores</span>
                                        </a>
                                    </li>
									<li>
										<a href="">
											<span class="sub-item">Professores</span>
										</a>
									</li>
                                    <li>
                                        <a href="" >
                                            <span class="sub-item">Disciplinas</span>
                                        </a>
                                    </li>
									<li>
										<a href="">
											<span class="sub-item">Cursos</span>
										</a>
									</li>
                                    <li>
                                        <a href="">
                                            <span class="sub-item">Turmas</span>
                                        </a>
                                    </li>
                                </ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#forms">
								<i class="fas fa-pen-square"></i>
								<p>Controladores</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="forms">
								<ul class="nav nav-collapse">
                                    <li>
                                        <a href="">
                                            <span class="sub-item">Curso - Disciplina</span>
                                        </a>
                                    </li>
									<li>
                                        <a href="">
											<span class="sub-item">Turma - Disciplina</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<!--<li class="nav-item">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-tasks"></i>
								<p>Other</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="tables">
								<ul class="nav nav-collapse">
									<li>
										<a data-toggle="collapse" href="#cursoFCT">
											<i class="fas fa-10x"></i>
                                                                                        <p>FCT</p>
                                                                                        <span class="caret"></span>
										</a>
                                                                            <div class="collapse" id="cursoFCT">
                                                                                <ul class="nav nav-collapse">
                                                                                    <li>
                                                                                        <a href="{{ asset('taxaEngINFO')}}">
											<span class="sub-item">Eng. Informatica</span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="{{ asset('taxaEngMECA')}}">
											<span class="sub-item">Eng. Mecatronica</span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="{{ asset('taxaEngCIVIL')}}">
											<span class="sub-item">Eng. Civil</span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="{{ asset('taxaEngPRO')}}">
											<span class="sub-item">Eng. de Processos</span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="{{ asset('taxaEngELT')}}">
											<span class="sub-item">Eng. Electrica</span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="{{ asset('taxaCA')}}">
											<span class="sub-item">Ciencias Actuarias</span>
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
									</li>

									<li>
										<a data-toggle="collapse" href="#cursoFCSH">
											<i class="fas fa-10x"></i>
                                                                                        <p>FCSH</p>
                                                                                        <span class="caret"></span>
										</a>
                                                                            <div class="collapse" id="cursoFCSH">
                                                                                <ul class="nav nav-collapse">
                                                                                    <li>
                                                                                        <a href="{{ asset('taxa')}}">
											<span class="sub-item">Economia</span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="{{ asset('taxa')}}">
											<span class="sub-item">Direito</span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="{{ asset('taxa')}}">
											<span class="sub-item">Contabilidade</span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="{{ asset('taxa')}}">
											<span class="sub-item">Gestao</span>
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
									</li>
								</ul>
							</div>
						</li> -->
                        <li class="nav-item">
							<a href="{{ asset('temporada')}}">
								<i class="fas fa-database"></i>
								<p>Matriculas</p>
							</a>
						</li>
                                               <li class="nav-item">
							<a href="{{ asset('taxa')}}">
								<i class="fas fa-database"></i>
								<p>Inscrições</p>
							</a>
						</li>
                                                 <li class="nav-item">
							<a href="{{ asset('livros')}}">
								<i class="fas fa-database"></i>
								<p>Biblioteca</p>
							</a>
						</li>
                                                <li class="nav-item">
							<a href="{{ asset('cliente')}}">
								<i class="fas fa-database"></i>
								<p>Cliente Biblioteca</p>
							</a>
						</li>


						<li class="nav-item">
							<a href="{{ asset('../widgets.html')}}">
								<i class="fas fa-desktop"></i>
								<p>Relatórios</p>
								<span class="badge badge-success">4</span>
							</a>
						</li>

						<li class="nav-item " style="text-align: center">
							<hr size="100%">
							<br><br><br><br>
							<!--
							<img style="filter: grayscale(100%);opacity: 0.03;background-repeat: no-repeat;" src="../assets/img/img_uz_logo.png" alt="Minha Figura">
							-->
							<img width="100px" style="opacity: 0.07;background-repeat: no-repeat;" src="{{ asset('assets/img/img_uz_logo.png')}}" alt="Minha Figura">
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
					<nav class="pull-left">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="https://www.themekita.com">
									Ajuda
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Website
								</a>
							</li>
						</ul>
					</nav>
					<div class="copyright ml-auto">
						UNIZAMBEZE@CETIC.2019
					</div>
				</div>
				</footer>
			<!-- </div> -->
			</div>
		</div>
		<!-- //bibliotecas css para o projecto -->
			<div class="custom-template">
		<div class="title">Settings</div>
		<div class="custom-content">
			<div class="switcher">
				<div class="switch-block">
					<h4>Logo Header</h4>
					<div class="btnSwitch">
						<button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
						<button type="button" class="selected changeLogoHeaderColor" data-color="blue"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="green"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="red"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="white"></button>
						<br/>
						<button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
						<button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
					</div>
				</div>
				<div class="switch-block">
					<h4>Navbar Header</h4>
					<div class="btnSwitch">
						<button type="button" class="changeTopBarColor" data-color="dark"></button>
						<button type="button" class="changeTopBarColor" data-color="blue"></button>
						<button type="button" class="changeTopBarColor" data-color="purple"></button>
						<button type="button" class="changeTopBarColor" data-color="light-blue"></button>
						<button type="button" class="changeTopBarColor" data-color="green"></button>
						<button type="button" class="changeTopBarColor" data-color="orange"></button>
						<button type="button" class="changeTopBarColor" data-color="red"></button>
						<button type="button" class="changeTopBarColor" data-color="white"></button>
						<br/>
						<button type="button" class="changeTopBarColor" data-color="dark2"></button>
						<button type="button" class="selected changeTopBarColor" data-color="blue2"></button>
						<button type="button" class="changeTopBarColor" data-color="purple2"></button>
						<button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
						<button type="button" class="changeTopBarColor" data-color="green2"></button>
						<button type="button" class="changeTopBarColor" data-color="orange2"></button>
						<button type="button" class="changeTopBarColor" data-color="red2"></button>
					</div>
				</div>
				<div class="switch-block">
					<h4>Sidebar</h4>
					<div class="btnSwitch">
						<button type="button" class="selected changeSideBarColor" data-color="white"></button>
						<button type="button" class="changeSideBarColor" data-color="dark"></button>
						<button type="button" class="changeSideBarColor" data-color="dark2"></button>
					</div>
				</div>
				<div class="switch-block">
					<h4>Background</h4>
					<div class="btnSwitch">
						<button type="button" class="changeBackgroundColor" data-color="bg2"></button>
						<button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
						<button type="button" class="changeBackgroundColor" data-color="bg3"></button>
						<button type="button" class="changeBackgroundColor" data-color="dark"></button>
					</div>
				</div>
			</div>
		</div>
		<div class="custom-toggle">
			<i class="flaticon-settings"></i>
		</div>
	</div>
		<!--   Core JS Files | //bibliotecas css para o projecto  -->
			<script src="{{ asset('template/assets/js/core/jquery.3.2.1.min.js')}}"></script>

	<script src="{{ asset('template/assets/js/core/popper.min.js')}}"></script>

	<script src="{{ asset('template/assets/js/core/bootstrap.min.js')}}"></script>
	<!-- jQuery UI -->
	<script src="{{ asset('template/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>

	<script src="{{ asset('template/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{ asset('template/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
	<!-- Atlantis JS -->
	<script src="{{ asset('template/assets/js/atlantis.min.js')}}"></script>
	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="{{ asset('template/assets/js/setting-demo2.js')}}"></script>
	<script src="{{ asset('template/assets/iCheck/icheck.min.js')}}"></script>
	<script src="{{ asset('template/assets/js/app.js')}}"></script>


	    <!-- Datatables -->
	<script src="{{ asset('template/assets/js/plugin/datatables/datatables.min.js')}}"></script>


	<script >
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

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






	</body>
</html>
