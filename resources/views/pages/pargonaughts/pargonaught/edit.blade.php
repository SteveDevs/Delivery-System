@extends('layouts.app')

@section('template_title')
    Edit Pargonaught
@endsection

@section('template_linked_css')
    <style type="text/css">
        .btn-save,
        .pw-change-container {
            display: none;
        }
    </style>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            Edit Pargonaught
                            <div class="pull-right">
                                <a href="{{ route('pargonaughts.index') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="top" title="Back">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                    Back to pargonaughts
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! Form::open(array('route' => ['pargonaughts.update', $pargonaught->id], 'method' => 'PUT', 'role' => 'form', 'class' => 'needs-validation')) !!}

                            {!! csrf_field() !!}

                            <div class="form-group has-feedback row {{ $errors->has('name') ? ' has-error ' : '' }}">
                                {!! Form::label('name', 'Name', array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        
                                        {!! Form::text('name', $pargonaught->name, array('id' => 'name', 'class' => 'form-control', 'placeholder' => 'Name')) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="courier">
                                            </label>
                                        </div>
                                    </div>
                                    @if($errors->has('courier'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('status') ? ' has-error ' : '' }}">
                                {!! Form::label('Status', 'status', array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {{!! Form::select('status', $statuses, $pargonaught->status); !!}}
                                    </div>
                                    @if($errors->has('status'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                             
                            {!! Form::button('Save changes', array('class' => 'btn btn-success margin-bottom-1 mb-1 float-left','type' => 'submit' )) !!}
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('modals.modal-save')
    @include('modals.modal-delete')

@endsection

@section('footer_scripts')
  @include('scripts.delete-modal-script')
  @include('scripts.save-modal-script')
  @include('scripts.check-changed')
@endsection
