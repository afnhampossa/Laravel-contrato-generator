@extends('layout.app')

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <form action="{{ route('user1.update') }}" method="post" class="card">
                    {!! csrf_field() !!}
                    <input type="hidden" name="id" value="{{Auth::user()->id}}">
                    <div class="card-header" style="background-color: #ff8093!important;">
                        <h3 class="card-title">MEUS DADOS</h3>
                    </div>
                    <div class="card-body">
                        @if ($msg == 'success')
                            <div class="alert alert-success" role="alert">
                                Os seus dados foram actualizados com sucesso!
                            </div>
                        @elseif ($msg == 'error')
                            <div class="alert alert-danger" role="alert">
                                Houve um erro ao tentar atualizar os seus dados!
                            </div>
                        @endif
                        <div class="row">
                            <div class="form-group col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nome</label>
                                    <input type="text" class="form-control" name="name" value="{{$debittype->name}}" placeholder="Curso..">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="text" name="email" class="form-control" value="{{$debittype->email}}"  placeholder="Email.."/>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">CPF</label>
                                    <input type="text" name="cpf" class="form-control" value="{{$debittype->cpf}}"  placeholder="CPF.."/>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Endereco</label>
                                    <input type="text" name="endereco" class="form-control" value="{{$debittype->endereco}}"  placeholder="Endereço.."/>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Contacto</label>
                                    <input type="text" name="contato" class="form-control" value="{{$debittype->contato}}"  placeholder="Contato.."/>
                                </div>
                            </div>
                     
                            <div class="form-group col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">CEP</label>
                                    <input type="text" class="form-control" name="cep" value="{{$debittype->cep}}"   placeholder="CEP.." required>
                                </div>
                            </div>
                            <div class="form-group col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Cidade</label>
                                    <input type="text" class="form-control" name="cidade" value="{{$debittype->cidade}}"   placeholder="Cidade.." required>
                                </div>
                            </div>
                        </div>
                        <script>
                            require(['input-mask']);
                        </script>
                        <div class="card-footer text-right">
                            <div class="d-flex">
                                <a href="javascript:void(0)" class="btn btn-link">Cancelar</a>
                                <button type="submit" class="btn ml-auto" style="background-color: #ff8093">Editar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
