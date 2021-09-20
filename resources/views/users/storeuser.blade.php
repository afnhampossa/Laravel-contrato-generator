@extends('layout.app')

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <form action="{{ 'storeuser' }}" method="post" class="card">
                    {!! csrf_field() !!}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-header" style="background-color: #ff8093!important;">
                        <h3 class="card-title">Registro de Usuario</h3>
                    </div>
                    <div class="card-body">
                        @if ($msg == 'success')
                            <div class="alert alert-success" role="alert">
                                O usuario registrado com sucesso!
                            </div>
                        @elseif ($msg == 'error')
                            <div class="alert alert-danger" role="alert">
                                Houve um erro ao tentar registrar um novo usuario!
                            </div>
                        @endif
                        <div class="row">
                            <div class="form-group col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Aluno Contratante</label>
                                    <input type="text" class="form-control" name="name" placeholder="Aluno Contratante.."
                                        required>
                                </div>
                            </div>
                            <div class="form-group col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Data de Nascimento</label>
                                    <input type="date" class="form-control" name="data_nascimento"
                                        placeholder="Data de Nascimento.." required>
                                </div>
                            </div>

                            <div class="form-group col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Endereço</label>
                                    <input type="text" class="form-control" name="endereco" placeholder="Endereço.."
                                        required>
                                </div>
                            </div>

                            <div class="form-group col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Número</label>
                                    <input type="text" class="form-control" name="numero" placeholder="Numero.." required>
                                </div>
                            </div>

                            <div class="form-group col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Cidade</label>
                                    <input type="text" class="form-control" name="cidade" placeholder="Cidade.." required>
                                </div>
                            </div>

                            <div class="form-group col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">CPF</label>
                                    <input type="text" class="form-control" name="cpf" placeholder="CPF.." required>
                                </div>
                            </div>
                            <div class="form-group col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">RG</label>
                                    <input type="text" class="form-control" name="rg" placeholder="RG.." required>
                                </div>
                            </div>

                            <div class="form-group col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Telefone</label>
                                    <input type="text" class="form-control" name="contato" placeholder="Telefone.."
                                        required>
                                </div>
                            </div>

                            <div class="form-group col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email.." required>
                                </div>
                            </div>


                            <div class="form-group col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Responsável</label>
                                    <input type="text" class="form-control" name="responsavel" placeholder="Responsável.."
                                        required>
                                </div>
                            </div>


                            <div class="form-group col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"> RG - Responsável</label>
                                    <input type="text" class="form-control" name="responsavel_rg" placeholder="RG.."
                                        required>
                                </div>
                            </div>
                            <div class="form-group col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">CEP - Responsável</label>
                                    <input type="text" class="form-control" name="responsavel_cpf" placeholder="CEP.."
                                        required>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Curso</label>
                                    <select class="form-control custom-select" name="curso">
                                        <option value="Quimica">Quimica</option>
                                        <option value="Fisica">Fisica</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Forma de Pagamento</label>
                                    <select class="form-control custom-select" name="forma_pagamento">
                                        <option value="Parcelamento">Parcelamento</option>
                                        <option value="Pagamento à vista">Pagamento à vista</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Dia Vencimento</label>
                                    <select class="form-control custom-select" name="dia_vencimente">
                                        <option value="Dia 05">Dia 05</option>
                                        <option value="Dia 10">Dia 10</option>
                                        <option value="Dia 15">Dia 15</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6">

                                <script>
                                    require(['input-mask']);
                                </script>
                                <div class="card-footer text-right">
                                    <div class="d-flex">
                                        <a href="javascript:void(0)" class="btn btn-link">Cancelar</a>
                                        <button type="submit" class="btn ml-auto"
                                            style="background-color: #ff8093">Enviar dados</button>
                                    </div>
                                </div>
                            </div>
                </form>

                
            </div>
        </div>
    </div>
    </div>
@endsection
