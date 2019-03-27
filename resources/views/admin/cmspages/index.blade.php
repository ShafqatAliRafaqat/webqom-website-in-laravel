@extends('layouts.admin_layout')
@section('title','CMS Pages')
@section('content')
<div class="col-lg-12">
    <h2>Static Pages <i class="fa fa-angle-right"></i> List View <button type="button" onclick="location.href ='/admin/cmspages/create';" class="btn btn-success">Add New Page &#187;</button></h2>
</div>
<div class="container" style="width:95% !important;">
    <table id="cmspages-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Created</th>
                <th>Last Updated</th>
            </tr>
        </thead>
    </table>
</div><!--table-responsive-->
@stop
@section('custom_scripts')
<link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css">
<script src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>
<script type="text/javascript">
    $(function() {
        $('#cmspages-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("datatable.getposts") }}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'title', name: 'title'},
                {data: 'slug', name: 'slug'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_at', name: 'updated_at'}
            ],
            order: [[0, "asc"]],
            searchDelay: 500
        });
    });
</script>
<script>
@stop
