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
<div id="products_data" data_url="{{route('functions.invoice_data')}}"></div>

<div class="container clearfix">
    <button href="#" class="button button-border button-rounded button-fill button-aqua btn_add" get_url="{{Route('functions.products_form')}}"><span><i class="icon-plus1"></i>New Invoice</span></button>
    <div class="table-responsive">
        <table id="products_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Client</th>
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
    <script type="text/javascript" src="{{asset('js/invoices.js')}}"></script>
@endsection