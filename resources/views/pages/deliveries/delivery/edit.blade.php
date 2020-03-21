@extends('layouts.app')

@section('template_title')
    Edit Delivery
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
                            Edit Delivery
                            <div class="pull-right">
                                <a href="{{ route('deliveries.index') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="top" title="Back">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                    Back to deliveries
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! Form::open(array('route' => ['deliveries.update', $delivery->id], 'method' => 'PUT', 'role' => 'form', 'class' => 'needs-validation')) !!}

                            {!! csrf_field() !!}

                            <div class="form-group has-feedback row {{ $errors->has('courier') ? ' has-error ' : '' }}">
                                {!! Form::label('courier', 'Courier', array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('courier', $delivery->courier, array('id' => 'courier', 'class' => 'form-control', 'placeholder' => 'Courier')) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="courier">
                                            </label>
                                        </div>
                                    </div>
                                    @if($errors->has('courier'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('courier') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('capacity') ? ' has-error ' : '' }}">
                                {!! Form::label('capacity', 'capacity', array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('capacity', $delivery->capacity, array('id' => 'capacity', 'class' => 'form-control', 'placeholder' => 'Capacity')) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="capacity">
                                            </label>
                                        </div>
                                    </div>
                                    @if($errors->has('capacity'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('capacity') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                             
                            <div class="row">
                                <div class="col-12 col-sm-6 mb-2">
                                    <a href="#" class="btn btn-outline-secondary btn-block btn-change-pw mt-3" title="{{ trans('forms.change-pw')}} ">
                                        <i class="fa fa-fw fa-lock" aria-hidden="true"></i>
                                        <span></span> {!! trans('forms.change-pw') !!}
                                    </a>
                                </div>
                                <div class="col-12 col-sm-6">
                                    {!! Form::button(trans('forms.save-changes'), array('class' => 'btn btn-success btn-block margin-bottom-1 mt-3 mb-2 btn-save','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmSave', 'data-title' => trans('modals.edit_user__modal_text_confirm_title'), 'data-message' => trans('modals.edit_user__modal_text_confirm_message'))) !!}
                                </div>
                            </div>
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
