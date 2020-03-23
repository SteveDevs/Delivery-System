@extends('layouts.app')

@section('template_title')
    Deliveries
@endsection

@section('template_linked_css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <style type="text/css" media="screen">
        .data-table {
            border: 0;
        }
        .data-table tr td:first-child {
            padding-left: 15px;
        }
        .data-table tr td:last-child {
            padding-right: 15px;
        }
        .data-table.table-responsive,
        .data-table.table-responsive table {
            margin-bottom: 0;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">

                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                
                            </span>

                            <div class="btn-group pull-right btn-group-xs">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="/households/create">
                                        <i class="fa fa-fw fa-user-plus" aria-hidden="true"></i>
                                        Create
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @include('partials.search-form')
                        <div class="table-responsive data-table-div">
                            <table class="table table-striped table-sm data-table">
                                <caption id="count">
                                    
                                </caption>
                                <thead class="thead">
                                    <tr>
                                        <th>Name</th>
                                        <th>Actions</th>
                                        <th class="no-search no-sort"></th>
                                        <th class="no-search no-sort"></th>
                                    </tr>
                                </thead>
                                <tbody id="table-data">
                                
                                    @foreach($households as $household)

                                        <tr>
                                            <td class="hidden-xs">{{$household->name}}</td>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-success btn-block" href="{{ URL::to('households/' . $household->id) }}" data-toggle="tooltip" title="Show">
                                                    Show
                                                </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-info btn-block" href="{{ URL::to('households/' . $household->id . '/edit') }}" data-toggle="tooltip" title="Edit">
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tbody id="search_results"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('modals.modal-delete')

@endsection

@section('footer_scripts')
    @if ((count($households) > 0))
        @include('scripts.datatables')
    @endif
    @include('scripts.delete-modal-script')
    @include('scripts.save-modal-script')
    @include('scripts.tooltips')
    @include('scripts.search')
@endsection
