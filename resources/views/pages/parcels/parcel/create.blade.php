@extends('layouts.app')

@section('template_title')
    Create New Delivery
@endsection

@section('template_fastload_css')
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            Create New Parcel
                            <div class="pull-right">
                                <a href="{{ route('parcels.index') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="Back to parcels">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                    Back to parcels
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        {!! Form::open(array('route' => 'parcels.store', 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')) !!}

                            {!! csrf_field() !!}

                            <div class="form-group has-feedback row {{ $errors->has('location') ? ' has-error ' : '' }}">
                                {!! Form::label('Location', 'location', array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('location', NULL, array('id' => 'location', 'class' => 'form-control', 'placeholder' => 'Location' )) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="location">
                                                <i class="fa fa-fw" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('location'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('location') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('discarded') ? ' has-error ' : '' }}">
                                {!! Form::label('Discarded', 'discarded', array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('discarded', NULL, array('id' => 'discarded', 'class' => 'form-control')) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="discarded">
                                                <i class="fa fa-fw" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('discarded'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('discarded') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('payment_amount') ? ' has-error ' : '' }}">
                                {!! Form::label('Payment amount', 'payment_amount', array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('payment_amount', NULL, array('id' => 'payment_amount', 'class' => 'form-control')) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="first_name">
                                                <i class="fa fa-fw" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('payment_amount'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('payment_amount') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {!! Form::button('Create', array('class' => 'btn btn-success margin-bottom-1 mb-1 float-right','type' => 'submit' )) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer_scripts')
@endsection
