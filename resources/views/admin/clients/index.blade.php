@extends('layouts.layout')

@push('stylesheets')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.3/chosen.min.css">
@endpush

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Clientes</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('home') }}">Painel Principal</a>
                </li>
                <li class="active">
                    <strong>Clientes</strong>
                </li>
            </ol>
        </div>

        <div class="col-lg-2">
            @permission('create.clientes')
                <a href="{{route('clients.create')}}" class="btn btn-primary btn-block dim m-t-lg"><i class="fas fa-user-plus"></i> Novo Cliente</a>
            @endpermission

        </div>

    </div>


    <div class="row">
            <div class="wrapper wrapper-content animated fadeInUp">

                <div class="col-lg-12">

                    <div class="ibox">
                      <div class="ibox-title">
                          <h5>Pesquisa</h5>
                      </div>
                      <div class="ibox-content">

                        <form method="get" action="?">
                          <div class="row">
                              <div class="col-md-5"><input name="search" type="text" placeholder="ID, Nome, Documento, Email, ou Telefone" class="form-control"></div>
                              <div class="col-md-2">
                                <select class="form-control selectpicker show-tick" data-live-search="true" title="Situação" data-style="btn-white" data-width="100%" placeholder="Situação" name="status">
                                    <option value="false">Inativo</option>
                                    <option value="true">Ativo</option>
                                </select>
                              </div>
                              <div class="col-md-3"><input name="address" type="text" placeholder="CEP, Endereço" class="form-control"></div>
                              <div class="col-md-2"><button type="submit" class="btn btn-primary btn-block"><i class="fas fa-search"></i>  Buscar</button></div>

                          </div>
                        </form>

                      </div>
                    </div>

                    <div class="ibox">
                    <div class="ibox-title">
                        <h5>Listagem (<small class="text-navy">Registros retornados: {{ $quantity }}</small>)</h5>
                    </div>
                    <div class="ibox-content">

                        <div class="project-list table-responsive">
                            @if($clients->isNotEmpty())
                                <table class="table table-hover">
                                    <thead>

                                      <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Documento</th>
                                        <th>Telefone</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th></th>
                                      </tr>

                                    </thead>

                                    <tbody>
                                        @foreach($clients as $client)
                                            <tr>

                                                <td class="project-title">
                                                    <a href="{{route('clients.show', ['id' => $client->uuid])}}">{{$client->id}}</a>
                                                </td>

                                                <td class="project-title">
                                                    <a href="{{route('clients.show', ['id' => $client->uuid])}}">{{$client->name}}</a>
                                                </td>

                                                <td class="project-title">
                                                    <a href="{{route('clients.show', ['id' => $client->uuid])}}">{{$client->document}}</a>
                                                </td>

                                                <td class="project-title">
                                                    <a href="{{route('clients.show', ['id' => $client->uuid])}}">{{$client->phone}}</a>
                                                </td>

                                                <td class="project-title">
                                                    <a href="{{route('clients.show', ['id' => $client->uuid])}}">{{$client->email}}</a>
                                                </td>

                                                <td class="project-title">
                                                  @if($client->active)
                                                    <span class="badge badge-primary">Ativo</span>
                                                  @else
                                                    <span class="badge badge-danger">Inativo</span>
                                                  @endif
                                                </td>

                                                <td class="project-actions">

                                                  @permission('view.clientes')
                                                    <a href="{{route('clients.show', ['id' => $client->uuid])}}" class="btn btn-white"><i class="fa fa-info"></i> </a>
                                                  @endpermission

                                                  @permission('edit.clientes')
                                                    <a href="{{route('clients.edit', ['id' => $client->uuid])}}" class="btn btn-white"><i class="far fa-edit"></i> </a>
                                                  @endpermission

                                                  <a href="{{route('client_addresses', $client->uuid)}}" class="btn btn-white"><i class="fas fa-map-marked-alt"></i> </a>

                                                  @permission('delete.clientes')
                                                    <a data-route="{{route('clients.destroy', ['id' => $client->uuid])}}" class="btn btn-danger btn-outline btnRemoveItem"><i class="fas fa-user-times"></i> </a>
                                                  @endpermission
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                {{ $clients->links() }}

                            @else

                                <div class="widget white-bg no-padding">
                                    <div class="p-m text-center">
                                        <h1 class="m-md"><i class="far fa-folder-open fa-4x"></i></h1>
                                        <h3 class="font-bold no-margins">
                                            Nenhum registro encontrado, para o parametros informados.
                                        </h3>
                                    </div>
                                </div>

                            @endif
                        </div>

                    </div>

                </div>

            </div>
        </div>

        <div class="modal inmodal" id="adicionar-cliente-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Novo Cliente</h4>
                    </div>
                    <form action="{{route('clients.store')}}" method="post">
                        {{csrf_field()}}
                        <div class="modal-body">

                        <div class="form-group"><label class="control-label">Nome</label>
                            <input type="text" name="name" autofocus required class="form-control">
                        </div>

                        <div class="form-group {!! $errors->has('document') ? 'has-error' : '' !!}"><label class="col-sm-2 control-label">CPF/CNPJ</label>
                            <div class="col-sm-10">
                                <input type="text" placeholder="Informe o CPF ou CNPJ" id="cpf" name="document" class="form-control"/>
                                {!! $errors->first('document', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label">Telefone</label>
                            <input type="text" name="phone" required class="form-control inputPhone">
                        </div>

                        <div class="form-group"><label class="control-label">Email</label>
                            <input type="email" name="email" required class="form-control">
                        </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection

@push('scripts')

  <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.3/chosen.jquery.min.js"></script>

@endpush
