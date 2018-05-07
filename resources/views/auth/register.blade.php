@extends('template')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{--<div class="card-header" data-background-color="{{ $dashboard_main_color }}">--}}
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Cadastro</h4>
                    </div>
                    <div class="card-content">

                        @if( isset($errors) && count($errors) > 0 )
                            <div class="alert alert-danger">
                                @foreach( $errors->all() as $error )
                                    <p>{{ $error  }}</p>
                                @endforeach
                            </div>
                        @endif

                        <form role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="label-floating form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="control-label">Nome</label>
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="label-floating form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="control-label">E-Mail</label>
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                        @endif
                                    </div>

                                    <div class="label-floating form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" class="control-label">Senha</label>
                                        <input id="password" type="password" class="form-control" name="password" required>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="label-floating form-group">
                                        <label for="password-confirm" class="control-label">Confirmar senha</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
