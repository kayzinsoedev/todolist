@extends('layouts.app')

<link href="{{ asset('css/custom.css') }}" rel="stylesheet">

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="row">
                    <div class="col-md-12">
                        @if(Session::has('alert-message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ Session::get('alert-message') }}
                        </p>
                        @endif
                    </div>
                </div> 

                <div class="card-header">                    
                    <h1>
                        <i class="fa fa-th-list" aria-hidden="true"></i>
                        To Do List
                    </h1>
                </div>
                <div class="card-body">
                    <div class="container">
                        <section id="data_section" class="todo">
                            <div class="row">
                                <div class="col-sm-9">
                                    {!! Form::text('title', null, array('id'=>'task_title', 'class' => 'form-control txtsize', 'required' => 'required', 'placeholder'=>'Create New Todo Item')); !!}
                                    {!! Form::text('user_id', $user_id, array('id'=>'user_id', 'class' => 'form-control',  'hidden'=>'hidden' )); !!}
                                </div>
                                <div class="col-sm-3">
                                    <button class="btn btn-primary" id="add-task" type="submit" onclick="addTask('{{csrf_token()}}')">
                                        <i class="fa fa-plus fa-lg fa-2x" aria-hidden="true"></i> 
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="list-group-item col-12 col-sm-12">
                                    @if(isset($todos))
                                        @foreach($todos as $todo)
                                            <div class="row">  
                                                <div class="col-sm-8">
                                                    @if($todo->status == 1)
                                                        <strike><span id="span_{{$todo->id}}" class="txtsize">{{$todo->title}}</span></strike>
                                                    @else
                                                        <span id="span_{{$todo->id}}" class="txtsize">{{$todo->title}}</span>
                                                    @endif
                                                </div>

                                                <div class="col-sm-1"> 
                                                    @if($todo->status == 1)
                                                        <label class="checkcontainer">                             
                                                            <input class="status" id="status" type="checkbox"  name="task_check" checked="checked" onchange="changeStatus('{{$todo->id}}','{{csrf_token()}}',this )" >            
                                                            </input>   
                                                            <span class="checkmark"></span>
                                                        </label>                                              
                                                    @else
                                                        <label class="checkcontainer">
                                                            <input class="status" id="status" type="checkbox"  name="task_check" onchange="changeStatus('{{$todo->id}}','{{csrf_token()}}',this )" >
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    @endif                                                  
                                                    
                                                </div>  
                                                <div class="col-sm-1">    
                                                    <a href="" onClick="delete_task('{{$todo->id}}','{{ csrf_token()}}')" class="icon-delete" data-token="{{ csrf_token() }}">
                                                        <i class="fa fa-trash-o fa-2x" aria-hidden="true">
                                                      </i>  
                                                    </a>  
                                                </div>                                                       
                                            </div>          
                                            <hr> 
                                        @endforeach
                                    @endif
                                </div><!-- list-group-item -->
                            </div>
                        </section>
                    </div> <!-- container -->
                </div> <!-- card body -->
            </div>   <!-- card -->          
        </div> <!-- col-6 -->

        @include('note')

    </div>
</div>
<!-- <script src="js/jquery-latest.min.js"type="text/javascript"></script> -->
<script src="js/todo.js"type="text/javascript"></script>

@endsection
