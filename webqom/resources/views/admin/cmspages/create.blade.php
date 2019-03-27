@extends('layouts.admin_layout')
@section('title','CMS Pages')
@section('content')
<script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <h2><a href="{{url('admin/cmspages')}}">Static Pages</a> <i class="fa fa-angle-right"></i> Add New <button type="button" onclick="location.href = '/admin/cmspages';" class="btn btn-primary">&#171; Back</button></h2>
            <div class="container">
                <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{url('admin/cmspages/store')}}">
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Page Title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="slug" class="col-sm-2 control-label">Slug</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="meta_title" class="col-sm-2 control-label">Meta Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Meta Title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="meta_description" class="col-sm-2 control-label">Meta Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" id="meta_description" name="meta_description"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="view" class="col-sm-2 control-label">Brief</label>
                        <div class="col-sm-10">
                            <textarea class="ckeditor" rows="3" id="view" name="view"></textarea>
                        </div> 
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-sm-2 control-label">Content</label>
                        <div class="col-sm-10">
                            <textarea class="ckeditor" rows="3" id="content" name="content"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="attributes" class="col-sm-2 control-label">Tags</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" id="attributes" name="attributes"></textarea>
                        </div> 
                    </div>
                    <div class="col-md-5 text-center"> 
                        <button type="submit" class="btn btn-primary btn">Save</button>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            </div>
        </div>
    </div>
    <div>&nbsp;</div>
    @endsection
    @section('custom_scripts')

    @endsection