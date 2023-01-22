@extends('layouts.index')
@section('navbar')
    @include('layouts.navbar')
@endsection

@section('styles')
    @parent
    <link rel="stylesheet" href="{{asset('plugins/DataTables/datatables.min.css')}}">
@endsection

@section('page-title')
    @include('layouts.page-title')
@endsection

@section('content')
<div id="clients_data" data_url="{{route('functions.clients_data')}}"></div>
<div class="container clearfix">
    <div class="table-responsive">
        <table id="clients_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Options</th>
                </tr>
            </thead>
        </table>
    </div>

</div>
@endsection

@section('scripts')
    @parent
    <script type="text/javascript" src="{{asset('plugins/DataTables/datatables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('layout/js/components/bs-datatable.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/clients.js')}}"></script>
@endsection