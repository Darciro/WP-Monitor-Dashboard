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
                        <div class="card-content table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <tr>
                                        <th>Nome</th>
                                        <th>URL</th>
                                        <th>Descrição</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                @if( !empty($sites) )
                                    @foreach($sites as $site)
                                        <tr>
                                            <td class="text-primary">{{ $site->name }}</td>
                                            <td>{{ $site->url }}</td>
                                            <td>{{ $site->description }}</td>
                                            <td>
                                                <a href="{{ route('sites.show', $site->id)  }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Visualizar dashboard">
                                                    <i class="material-icons">dashboard</i>
                                                </a>
                                                <a href="{{ route('sites.edit', $site->id)  }}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Editar dados do site">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                {{--<a href="#" class="btn btn-danger">--}}
                                                <a href="{{ url("/sites/$site->id/delete")  }}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Excluir site do monitoramento">
                                                    <i class="material-icons">delete_forever</i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3">Nenhum site monitorado até o momento.</td>
                                    </tr>
                                @endif
                            </table>

                            <a href="{{ route('sites.create')  }}" class="btn btn-primary">
                                <span class="glyphicon glyphicon-plus-sign"></span>
                                Monitorar novo site
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        (function ($) {
            $(document).ready(function () {
                initHelpers();
            });
        })(jQuery);
    </script>
@endpush