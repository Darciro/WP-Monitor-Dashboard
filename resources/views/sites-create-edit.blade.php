@extends('template')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="{{ $dashboard_main_color }}">
                            <h4 class="title">@if( !isset( $site ) ) Novo site @else Editar site @endif</h4>
                            <p class="category">@if( !isset( $site ) ) Adicione as informações do site e em seguida clique no botão <b>"Monitorar"</b> @else Atualize as informações do site e em seguida clique no botão <b>"Atualizar"</b> @endif</p>
                        </div>
                        <div class="card-content">
                            @if( isset($errors) && count($errors) > 0 )
                                <div class="alert alert-danger">
                                    @foreach( $errors->all() as $error )
                                        <p>{{ $error  }}</p>
                                    @endforeach
                                </div>
                            @endif

                            @if( isset( $site ) )
                            <form method="post" action="{{ route('sites.update', $site->id) }}">
                                {!! method_field('PUT') !!}
                                @php ($bt_text = 'Atualizar')
                            @else
                            <form method="post" action="{{ route('sites.store') }}">
                                @php ($bt_text = 'Monitorar')
                                @endif
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label for="name" class="control-label">Nome do site</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $site->name or old('name') }}">
                                        </div>

                                        <div class="form-group label-floating">
                                            <label for="url" class="control-label">URL do site</label>
                                            <input type="text" class="form-control" id="url" name="url" value="{{ $site->url or old('url') }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Descrição</label>
                                            <div class="form-group label-floating">
                                                <label for="description" class="control-label">Faça uma breve descrição sobre o site que deseja monitorar</label>
                                                <textarea id="description" name="description" class="form-control">{{ $site->description or old('description') }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group label-floating">
                                            <label for="security-token" class="control-label">Token de segurança</label>
                                            <input type="text" name="security-token" class="form-control" id="security-token" value="@if ( isset( $site['security-token'] ) ){{ $site['security-token']}}@endif">
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 col-form-label" style="padding-left: 0">Ativar monitoramento</label>
                                            <div class="col-sm-9">
                                                <label for="active">
                                                    <input type="checkbox" name="active" id="active" value="1" @if ( isset($site->active) && $site->active === 1 ) checked @endif> Ativar
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            {!! csrf_field() !!}
                                            <button type="submit" class="btn btn-primary">{{ $bt_text  }}</button>
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