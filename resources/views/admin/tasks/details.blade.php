@extends('layouts.layout')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Tarefa Detalhes</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="/">Home</a>
                </li>
                <li class="active">
                    <strong>Tarefa Detalhes</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content animated fadeInUp">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="m-b-md">

                                    <div class="btn-group pull-right">
                                        <a href="#" class="btn btn-white btn-xs">Editar Tarefa</a>
                                    <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-play"></i>  Iniciar Tarefa</a>
                                    </div>
                                    
                                    
                                    <h2>{{$task->description}}</h2>
                                </div>
                                <dl class="dl-horizontal">
                                    <dt>Status:</dt>
                                    @if($task->active)
                                        <dd><span class="label label-primary">Ativo</span></dd>
                                    @else
                                        <dd><span class="label label-primary">Inativo</span></dd>
                                    @endif
                                </dl>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <dl class="dl-horizontal">
                                    <dt>Criado por:</dt>
                                    <dd>{{$task->createdBy->name}}</dd>
                                    <dt>Mensagens:</dt>
                                    <dd> 0</dd>
                                    <dt>Cliente:</dt>
                                    <dd><a href="{{route('department', ['id' => $task->client->id])}}"
                                           class="text-navy"> {{$task->client->name}}</a></dd>

                                    <dt>Tempo Previsto:</dt>
                                    <dd>{{$task->time}} minutos</dd>
                                </dl>
                            </div>
                            <div class="col-lg-7" id="cluster_info">
                                <dl class="dl-horizontal">

                                    <dt>Ultima Atualização:</dt>
                                    <dd>{{$task->updated_at->format('d/m/Y H:i:s')}}</dd>
                                    <dt>Criado Em:</dt>
                                    <dd>    {{$task->updated_at->format('d/m/Y H:i:s')}} </dd>
                                    <dt>Responsável:</dt>
                                    <dd class="project-people">
                                        <a href="{{route('user', ['id' => $task->sponsor->id])}}"><img alt="image"
                                                                                                      title="{{$task->sponsor->name}}"
                                                                                                      class="img-circle"
                                                                                                      src="{{asset('admin/avatars/' . $task->sponsor->avatar)}}"></a>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <dl class="dl-horizontal">
                                    <dt>Completed:</dt>
                                    <dd>
                                        @if($task->status_id == 4)
                                            <label class="label label-danger">Cancelado</label>
                                        @else
                                            <div class="progress progress-striped active m-b-sm">
                                                <div style="width:
                                                @if ($task->status_id == 1) 0%
                                                @elseif ($task->status_id == 2) 50%
                                                @elseif ($task->status_id == 3) 100%
                                                @endif;" class="progress-bar"></div>
                                            </div>
                                        @endif
                                    </dd>
                                </dl>
                            </div>

                            
                        </div>
                        <div class="row m-t-sm">
                            <div class="col-lg-12">
                                <div class="panel blank-panel">
                                    <div class="panel-heading">
                                        <div class="panel-options">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#tab-1" data-toggle="tab">Mensagens</a></li>
                                                <li class=""><a href="#tab-2" data-toggle="tab">Last activity</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel-body">

                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab-1">
                                                <div class="feed-activity-list">
                                                    @foreach($messages as $message)
                                                        <div class="feed-element">
                                                            <a href="#" class="pull-left">
                                                                <img alt="image" class="img-circle"
                                                                     src="{{asset('admin/img/a2.jpg')}}">
                                                            </a>
                                                            <div class="media-body ">
                                                                <small class="pull-right">Agora</small>
                                                                <strong>{{$message->user->name}}</strong><br>
                                                                <small class="text-muted">{{$message->created_at->format('d/m/Y H:i:s')}}</small>
                                                                <div class="well">
                                                                    {{$message->message}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                            </div>
                                            <div class="tab-pane" id="tab-2">

                                                <table class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>Status</th>
                                                        <th>Title</th>
                                                        <th>Start Time</th>
                                                        <th>End Time</th>
                                                        <th>Comments</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <span class="label label-primary"><i
                                                                        class="fa fa-check"></i> Completed</span>
                                                        </td>
                                                        <td>
                                                            Create project in webapp
                                                        </td>
                                                        <td>
                                                            12.07.2014 10:10:1
                                                        </td>
                                                        <td>
                                                            14.07.2014 10:16:36
                                                        </td>
                                                        <td>
                                                            <p class="small">
                                                                Lorem Ipsum is that it has a more-or-less normal
                                                                distribution of letters, as opposed to using 'Content
                                                                here, content here', making it look like readable.
                                                            </p>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="label label-primary"><i
                                                                        class="fa fa-check"></i> Accepted</span>
                                                        </td>
                                                        <td>
                                                            Various versions
                                                        </td>
                                                        <td>
                                                            12.07.2014 10:10:1
                                                        </td>
                                                        <td>
                                                            14.07.2014 10:16:36
                                                        </td>
                                                        <td>
                                                            <p class="small">
                                                                Various versions have evolved over the years, sometimes
                                                                by accident, sometimes on purpose (injected humour and
                                                                the like).
                                                            </p>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="label label-primary"><i
                                                                        class="fa fa-check"></i> Sent</span>
                                                        </td>
                                                        <td>
                                                            There are many variations
                                                        </td>
                                                        <td>
                                                            12.07.2014 10:10:1
                                                        </td>
                                                        <td>
                                                            14.07.2014 10:16:36
                                                        </td>
                                                        <td>
                                                            <p class="small">
                                                                There are many variations of passages of Lorem Ipsum
                                                                available, but the majority have suffered alteration in
                                                                some form, by injected humour, or randomised words which
                                                            </p>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="label label-primary"><i
                                                                        class="fa fa-check"></i> Reported</span>
                                                        </td>
                                                        <td>
                                                            Latin words
                                                        </td>
                                                        <td>
                                                            12.07.2014 10:10:1
                                                        </td>
                                                        <td>
                                                            14.07.2014 10:16:36
                                                        </td>
                                                        <td>
                                                            <p class="small">
                                                                Latin words, combined with a handful of model sentence
                                                                structures
                                                            </p>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="label label-primary"><i
                                                                        class="fa fa-check"></i> Accepted</span>
                                                        </td>
                                                        <td>
                                                            The generated Lorem
                                                        </td>
                                                        <td>
                                                            12.07.2014 10:10:1
                                                        </td>
                                                        <td>
                                                            14.07.2014 10:16:36
                                                        </td>
                                                        <td>
                                                            <p class="small">
                                                                The generated Lorem Ipsum is therefore always free from
                                                                repetition, injected humour, or non-characteristic words
                                                                etc.
                                                            </p>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="label label-primary"><i
                                                                        class="fa fa-check"></i> Sent</span>
                                                        </td>
                                                        <td>
                                                            The first line
                                                        </td>
                                                        <td>
                                                            12.07.2014 10:10:1
                                                        </td>
                                                        <td>
                                                            14.07.2014 10:16:36
                                                        </td>
                                                        <td>
                                                            <p class="small">
                                                                The first line of Lorem Ipsum, "Lorem ipsum dolor sit
                                                                amet..", comes from a line in section 1.10.32.
                                                            </p>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="label label-primary"><i
                                                                        class="fa fa-check"></i> Reported</span>
                                                        </td>
                                                        <td>
                                                            The standard chunk
                                                        </td>
                                                        <td>
                                                            12.07.2014 10:10:1
                                                        </td>
                                                        <td>
                                                            14.07.2014 10:16:36
                                                        </td>
                                                        <td>
                                                            <p class="small">
                                                                The standard chunk of Lorem Ipsum used since the 1500s
                                                                is reproduced below for those interested.
                                                            </p>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="label label-primary"><i
                                                                        class="fa fa-check"></i> Completed</span>
                                                        </td>
                                                        <td>
                                                            Lorem Ipsum is that
                                                        </td>
                                                        <td>
                                                            12.07.2014 10:10:1
                                                        </td>
                                                        <td>
                                                            14.07.2014 10:16:36
                                                        </td>
                                                        <td>
                                                            <p class="small">
                                                                Lorem Ipsum is that it has a more-or-less normal
                                                                distribution of letters, as opposed to using 'Content
                                                                here, content here', making it look like readable.
                                                            </p>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span class="label label-primary"><i
                                                                        class="fa fa-check"></i> Sent</span>
                                                        </td>
                                                        <td>
                                                            Contrary to popular
                                                        </td>
                                                        <td>
                                                            12.07.2014 10:10:1
                                                        </td>
                                                        <td>
                                                            14.07.2014 10:16:36
                                                        </td>
                                                        <td>
                                                            <p class="small">
                                                                Contrary to popular belief, Lorem Ipsum is not simply
                                                                random text. It has roots in a piece of classical
                                                            </p>
                                                        </td>

                                                    </tr>

                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

@endsection