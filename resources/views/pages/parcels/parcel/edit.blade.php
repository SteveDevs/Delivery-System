@extends('layouts.app')

@section('template_title')
    Edit Parcel
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
                            Edit Parcel
                            <div class="pull-right">
                                <a href="{{ route('parcels.index') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="top" title="Back">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                    Back to parcels
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! Form::open(array('route' => ['parcels.update', $parcel->id], 'method' => 'PUT', 'role' => 'form', 'class' => 'needs-validation')) !!}

                            {!! csrf_field() !!}

                            <div class="form-group has-feedback row {{ $errors->has('status') ? ' has-error ' : '' }}">
                                {!! Form::label('status', 'status', array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('status', $parcel->status, array('id' => 'status', 'class' => 'form-control', 'placeholder' => 'Location')) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="status">
                                            </label>
                                        </div>
                                    </div>
                                    @if($errors->has('status'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('discarded') ? ' has-error ' : '' }}">
                                {!! Form::label('discarded', 'discarded', array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('discarded', $parcel->discarded, array('id' => 'discarded', 'class' => 'form-control', 'placeholder' => 'discarded')) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="discarded">
                                            </label>
                                        </div>
                                    </div>
                                    @if($errors->has('discarded'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('discarded') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('payment_amount') ? ' has-error ' : '' }}">
                                {!! Form::label('payment_amount', 'payment_amount', array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('payment_amount', $parcel->payment_amount, array('id' => 'payment_amount', 'class' => 'form-control', 'placeholder' => 'payment_amount')) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="payment_amount">
                                            </label>
                                        </div>
                                    </div>
                                    @if($errors->has('payment_amount'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('payment_amount') }}</strong>
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
