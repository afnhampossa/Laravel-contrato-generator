@extends('layout.app')

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">

                    <div class="card-header" style="background-color: #ff8093!important;">
                        <h3 class="card-title">LISTA DE ALUNOS</h3>
                    </div>
                    <br>
                    <!------------------------------------------------------------------------------>

                    @if ($msg == 'confirm')
                        <div>
                            <div>
                                <div class="modal fade" id="modalPush" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-notify modal-info" role="document">
                                        <!--Content-->
                                        <div class="modal-content text-center">
                                            <!--Header-->
                                            <div class="modal-header d-flex justify-content-center">
                                                <h2 class="heading">Deseja continuar? </h2>
                                            </div>
                                            <!--Body-->
                                            <div class="modal-body">
                                                <i class="fa fa-file-text fa-4x animated rotateIn mb-4"></i>
                                                <p>Todos dados do cliente serão apagados </p>
                                            </div>
                                            <!--Footer-->
                                            <div class="modal-footer flex-center">
                                                <form action="{{ route('user.destroy') }}" method="post">
                                                    {!! csrf_field() !!}

                                                    <input type="hidden" name="id" value="{{ $userss }}" />

                                                    <button class="btn btn-outline-danger" type="submit"
                                                        title="Apagar">Continuar</button>
                                                </form>

                                                <a type="button" class="btn btn-outline-info waves-effect"
                                                    data-dismiss="modal">Cancelar</a>
                                            </div>
                                        </div>
                                        <!--/.Content-->
                                    </div>
                                </div>
                                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                                                                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                                                                crossorigin="anonymous"></script>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                                                                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                                                                crossorigin="anonymous"></script>
                                <script>
                                    $(window).on('load', function() {
                                        $('#modalPush').modal('show');
                                    });
                                </script>
                            </div>

                        </div>
                    @endif

                    <!-------------------------------------------------------->
                    @if ($msg == 'success')
                        <div class="alert alert-success" role="alert">
                            Usuario removido com sucesso!!
                        </div>
                    @elseif ($msg == 'error')
                        <div class="alert alert-danger" role="alert">
                            N&atilde;o &eacute; possivel remover o usuario!
                        </div>
                    @else

                    @endif
                    <div class="table-responsive">

                        <table id="basic-datatables" class="table card-table table-striped table-vcenter table-hover ">
                            <thead>
                                <tr>
                                    <th colspan="5">
                                        <a href="{{ route('createuser') }}" class="btn btn-danger" style="background-color: #ff8093"><i
                                                class="fa fa-plus"></i> Novo Usuario</a>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Nome</th>
                                    <th>Telefone</th>
                                    <th>CPF</th>
                                    <th>Ação</th>
                                    <!--<th></th>-->

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)

                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->contato }}</td>
                                        <td>{{ $user->cpf }}</td>


                                        <td class="w-1">

                                            <form action="{{ route('confirmdelete') }}" method="get">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="id" value="{{ $user->id }}" />
                                                <a class="icon"
                                                    href="{{ url('user.editcliente') }}?id={{ $user->id }}"
                                                    title="Editar aluno">
                                                    <i class="btn btn-outline-dark  fas fa-pencil-alt"></i>
                                                </a>
                                                   <a class="icon"
                                                    href="{{ url('user.printcontrato') }}?id={{ $user->id }}"
                                                    target="_blank"
                                                    title="Imprimir contrato">
                                                    <i class="btn btn-outline-dark  fas fa-print"></i>
                                                </a>
                                                 </a>
                                                   <a class="icon"
                                                    href="{{ url('user.printcontrato') }}?id={{ $user->id }}"
                                                    target="_blank"
                                                    title="Enviar email">
                                                    <i class="btn btn-outline-dark  fas fa-envelope"></i>
                                                </a>
                                                <button class="btn btn-outline-danger fas fa-times" type="submit"
                                                    title="Apagar"></button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
