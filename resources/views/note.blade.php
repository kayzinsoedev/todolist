<link href="{{ asset('css/custom.css') }}" rel="stylesheet">

<div class="col-sm-6">        
    <div class="card">
        <div class="row">
            <div class="col-md-12">
                @if(isset($notes))
                    @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('message') }}
                    </p>
                    @endif
                @endif
            </div>
        </div> 

        <div class="card-header">
            <h1>
                <i class="fa fa-sticky-note " aria-hidden="true"></i>
                Notes   
            </h1>               
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 note">
                        {!! Form::text('note_title', null, array('id'=>'note_title', 'class' => 'form-control txtsize', 'required' => 'required', 'placeholder'=>'Enter a Note Title', )); !!}                               
                        {!! Form::textarea('description', null, array('id'=>'description', 'class' => 'form-control txtsize', 'required' => 'required', 'placeholder'=>'Enter Description', 'rows' => '3'  )); !!}
                        {!! Form::text('user_id', $user_id, array('id'=>'user_id', 'class' => 'form-control',  'hidden'=>'hidden' )); !!}
                    </div>
                    <div class="col-sm-4">                                
                        <button class="btn btn-primary" id="add-note" type="submit" onclick="addNote('{{csrf_token()}}')" data-token="{{ csrf_token() }}">
                                 <i class="fa fa-plus fa-lg" aria-hidden="true"></i> Create 
                        </button>
                    </div>
                </div>


                <div class="row">
                    <div class="list-group-item col-12 col-sm-12 note">                               
                        @if(isset($notes))
                            @foreach($notes as $note)
                                <div class="row">  
                                    <div class="col-sm-8">                                        
                                        <a href="#show_note{{$note->id}}" data-toggle="collapse" aria-expanded="false" aria-controls="show_note" class="txtsize"
                                            >{{$note->title}}</a>

                                        <div class="collapse" id="show_note{{$note->id}}">
                                            <div class="row">
                                                <div class="col-12 col-sm-12">                            
                                                {!! Form::text('show_note_description', $note->description, array('id'=>'show_note_description', 'class' => 'form-control txtsize', 'required' => 'required', )); !!}
                                                </div>                                     
                                            </div>   
                                        </div>  

                                    </div>
                                    <div class="col-sm-1" id="{{$note->id}}">                                         
                                        <a href="#" id="" onClick="edit_show_note('{{$note->id}}',
                                          '{{$note->title}}', '{{$note->description}}', '{{ csrf_token() }}');">
                                            <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true">
                                            </i>  
                                        </a>  
                                    </div>

                                    <div class="col-sm-1" id="{{$note->id}}">  
                                        <a href="#" onClick="delete_note('{{$note->id}}','{{ csrf_token() }}');" class="icon-delete" data-token="{{ csrf_token() }}"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a>
                                    </div>                                                                                         
                                </div>  

                                <!-- <div class="collapse note" id="edit_note{{$note->id}}" > -->
                                <div class="note" id="edit_note{{$note->id}}" style="display: none;" >
                                    <div class="row">
                                        <div class="col-12 col-sm-8" name="" class="edit_note{{$note->id}}">
                                            {{ Form::open(array('id'=>'edit_note', 'url' => '/updateNote','method' => 'POST')) }}

                                            {!! Form::text('edit_note_title', null, array('id'=>'edit_note_title'.$note->id, 'class' => 'form-control txtsize', 'required' => 'required', )); !!}

                                            {!! Form::textarea('edit_note_description', null, array('id'=>'edit_note_description'.$note->id, 'class' => 'form-control txtsize',  'placeholder'=>'', 'rows' => '3' )); !!}

                                            {!! Form::text('edit_note_id', null, array('id'=>'edit_note_id'.$note->id, 'class' => 'form-control',  'hidden'=>'hidden'  )); !!}

                                            {!! Form::text('user_id', $user_id, array('id'=>'user_id', 'class' => 'form-control',  'hidden'=>'hidden' )); !!}   
                                           
                                            <button class="btn btn-primary" id="update-note" type="submit" > 
                                                <i class="fa fa-pencil-square-o " aria-hidden="true"></i>
                                                Update
                                            </button> 
                                                                                          
                                            <a href="#" class="btn btn-primary" onclick="cancelnote('{{$note->id}}')">
                                               <i class="fa fa-times " aria-hidden="true"></i>
                                               Cancel 
                                            </a>
                                            {{ Form::close() }} 
                                                                                                   
                                        </div>                                      
                                    </div>   
                                </div>                                                              
                                <hr>
                            @endforeach
                        @endif                                  
                    </div>
                </div>                                            
            </div>            
        </div>
    </div>
</div>

<!-- <script src="js/jquery-latest.min.js"type="text/javascript"></script> -->
<script src="js/todo.js"type="text/javascript"></script>



