@extends('layout.app')

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="{{ route('user.update') }}" method="post" class="card">
                    {!! csrf_field() !!}
                    <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                    <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                    <div class="card-header" style="background-color: #ff8093!important;">
                        <h3 class="card-title">ALTERAL SENHA</h3>
                    </div>
                    <div class="card-body">
                        @if ($msg == 'success')
                            <div class="alert alert-success" role="alert">
                                Palavra passe atualizada com sucesso!
                            </div>
                        @elseif ($msg == 'passIncorrect')
                            <div class="alert alert-danger" role="alert">
                                Palavra passe incorreta!
                            </div>
                        @elseif($msg == 'notMatch')
                            <div class="alert alert-danger" role="alert">
                                Confirma senha n&atilde;o corresponde!
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="password-confirm"
                                        class="form-label">{{ __('Palavra Passe Atual') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password"
                                        required autocomplete="Password">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="password-confirm"
                                        class="form-label">{{ __('Nova Palavra Passe') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="newPassword"
                                        required autocomplete="New-password">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="password-confirm"
                                        class="form-label">{{ __('Confirmar Palavra Passe') }}</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="confirmPassword" required autocomplete="Confirm-password">
                                </div>
                            </div>

                        </div>
                        <script>
                            require(['input-mask']);
                        </script>
                        <div class="card-footer text-right">
                            <div class="d-flex">
                                <a href="javascript:void(0)" class="btn btn-link">Cancelar</a>
                                <button type="submit" class="btn ml-auto text-bold" style="background-color: #ff8093">Enviar
                                    dados</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
