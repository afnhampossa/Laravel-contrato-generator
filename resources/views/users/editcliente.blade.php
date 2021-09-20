@extends('layout.app')

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

<form action="{{'user1.updatecliente'}}" method="post" class="card">
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
      <h3 class="card-title">Atualização de Usuario</h3>
    </div>
    <div class="card-body">
      @if ($msg == 'success')
        <div class="alert alert-success" role="alert">
            O usuario atualizado com sucesso!
        </div>
        @elseif ($msg == 'error')
          <div class="alert alert-danger" role="alert">
              Houve um erro ao tentar atualizar o usuario!
          </div>
      @endif
      
            <input type="hidden" class="form-control" value = "{{$user->id}}" name="id"  >
      <div class="row">
        <div class="form-group col-sm-6 col-md-6">
          <div class="form-group">
            <label class="form-label">Aluno Contratante</label>
            <input type="text" class="form-control" value = "{{$user->name}}" name="name" placeholder="Aluno Contratante.." required>
          </div>
         </div>
         <div class="form-group col-sm-6 col-md-6">
          <div class="form-group">
            <label class="form-label">Data de Nascimento</label>
            <input type="text" class="form-control" value = "{{$user->data_nascimento}}" name="data_nascimento" placeholder="Data de Nascimento.." required>
          </div>
         </div>

         <div class="form-group col-sm-6 col-md-6">
          <div class="form-group">
              <label class="form-label">Endereço</label>
              <input type="text" class="form-control" value = "{{$user->endereco}}" name="endereco" placeholder="Endereço.." required>
          </div>
      </div>

      <div class="form-group col-sm-6 col-md-6">
          <div class="form-group">
              <label class="form-label">Número</label>
              <input type="text" class="form-control" value = "{{$user->numero}}" name="numero" placeholder="Numero.." required>
          </div>
      </div>

        <div class="form-group col-sm-6 col-md-6">
          <div class="form-group">
              <label class="form-label">Cidade</label>
              <input type="text" class="form-control" value = "{{$user->cidade}}" name="cidade" placeholder="Cidade.." required>
          </div>
      </div>
      
      <div class="form-group col-sm-6 col-md-6">
          <div class="form-group">
              <label class="form-label">CPF</label>
              <input type="text" class="form-control" value = "{{$user->cpf}}" name="cpf" placeholder="CPF.." required>
          </div>
      </div>
      <div class="form-group col-sm-6 col-md-6">
          <div class="form-group">
              <label class="form-label">RG</label>
              <input type="text" class="form-control" value = "{{$user->rg}}" name="rg" placeholder="RG.." required>
          </div>
      </div>

        <div class="form-group col-sm-6 col-md-6">
          <div class="form-group">
              <label class="form-label">Telefone</label>
              <input type="text" class="form-control" value = "{{$user->contato}}" name="contato" placeholder="Telefone.." required>
          </div>
      </div>

       <div class="form-group col-sm-6 col-md-6">
          <div class="form-group">
              <label class="form-label">E-mail</label>
              <input type="email" class="form-control" value = "{{$user->email}}" name="email" placeholder="Email.." required>
          </div>
      </div>
      
      
      <div class="form-group col-sm-6 col-md-6">
          <div class="form-group">
              <label class="form-label">Responsável</label>
              <input type="text" class="form-control" value = "{{$user->responsavel}}" name="responsavel" placeholder="Responsável.." required>
          </div>
      </div>
    
          
          <div class="form-group col-sm-6 col-md-6">
              <div class="form-group">
                  <label class="form-label"> RG - Responsável</label>
                  <input type="text" class="form-control" value = "{{$user->responsavel_rg}}" name="responsavel_rg" placeholder="RG.." required>
              </div>
          </div>
          <div class="form-group col-sm-6 col-md-6">
            <div class="form-group">
                <label class="form-label">CEP - Responsável</label>
                <input type="text" class="form-control" value = "{{$user->responsavel_cpf}}" name="responsavel_cpf" placeholder="CEP.." required>
            </div>
          </div>
        
          <div class="col-sm-6 col-md-6">
            <div class="form-group">
              <label class="form-label">Curso</label>
              <select class="form-control custom-select"  name="curso" >
                <option value="Quimica" <?php if($user->curso =='Quimica')  echo "selected"; ?>>Quimica</option>
                <option value="Fisica" <?php if($user->curso =='Fisica')  echo "selected"; ?>>Fisica</option>
              </select>
            </div>
          </div>

        <div class="col-sm-6 col-md-6">
          <div class="form-group">
            <label class="form-label">Forma de Pagamento</label>
            <select class="form-control custom-select"  name="forma_pagamento" >
                <option value="Parcelamento" <?php if($user->forma_pagamento =='Parcelamento')  echo "selected"; ?>>Parcelamento</option>
                <option value="Pagamento à vista" <?php if($user->forma_pagamento =='Pagamento à vista')  echo "selected"; ?>>Pagamento à vista</option>
            </select>
          </div>
        </div>
         <div class="col-sm-6 col-md-6">
              <div class="form-group">
                  <label class="form-label">Dia Vencimento</label>
                  <select class="form-control custom-select" name="dia_vencimente">
                      <option value="Dia 05" <?php if($user->dia_vencimente =='Dia 05')  echo "selected"; ?>>Dia 05</option>
                      <option value="Dia 10" <?php if($user->dia_vencimente =='Dia 10')  echo "selected"; ?>>Dia 10</option>
                      <option value="Dia 15" <?php if($user->dia_vencimente =='Dia 15')  echo "selected"; ?>>Dia 15</option>
                  </select>
              </div>
          </div>
        
      
</div>
<script>
  require(['input-mask']);
</script>
  <div class="card-footer text-right">
    <div class="d-flex">
      <a href="javascript:void(0)" class="btn btn-link">Cancelar</a>
      <button type="submit" class="btn ml-auto" style="background-color: #ff8093">Enviar dados</button>
    </div>
  </div>
  </div>
</form>


</div>
</div>
</div>
</div>
@endsection
