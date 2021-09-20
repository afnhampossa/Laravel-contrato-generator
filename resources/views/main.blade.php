@extends('layout.app')

@section('content')

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">

              <div class="">

                <div class=" row">
                <div class="col-12 ">
                    <div class="card-header" style="background-color: #ff8093! important;">
                      <br>
                        <h3 class="card-title text-center" style="color: white!important; font-size: 26; font-weight: bold; ">Olá, {{Auth::user()->name}}. Seja bem-vindo ao sistema da YUPE! </h3>
                      <br>
                    </div>
                    <br>
                    <hr>
                </div>
              </div>

            </div>
        </div>
    </div>


@endsection


@endsection
