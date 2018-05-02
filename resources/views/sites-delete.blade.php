@extends('template')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="{{ $dashboard_main_color }}">
                            <h4 class="title">Todos os sites</h4>
                            <p class="category">Lista de todos os sites cadastrados pelo sistema.</p>
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
                                <form method="post" action="{{ route('sites.destroy', $site->id) }}">
                                    {!! method_field('DELETE') !!}
                                    <div class="form-group row">
                                        <div class="col-sm-9">
                                            <h4><b>{{  $site->name }}</b></h4>
                                            <p>Tem certeza que deseja deletar o site? Essa ação não poderá ser desfeita!</p>
                                        </div>
                                        <div class="col-sm-9">
                                            {!! csrf_field() !!}
                                            <button type="submit" class="btn btn-danger">Deletar site</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection