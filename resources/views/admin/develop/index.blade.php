@extends('layouts.admin_layout')
@section('title','Development')
@section('content')
@section('page_header','Dashboard')
<div class="page-content">
    <div id="tab-general">
        <div class="row">
        	<div class="col-lg-12">
            	<h5 class="block-heading">
                    There is artisan commands for development purpose, to run migrations, clear cache, and optimize dependency
                </h5>
                <br>
            </div>
            {!! Form::open(['route' => ['develop.artisan.commands']]) !!}
                <div class="col-md-6">
                    {!! Form::select('action',
                        [
                            'migrations_status' => 'Migrations Status',
                            'regenerate_migrations' => 'Regeterate migrations(Please, do not touch this)',
                            'migrate' => 'Migrate',
                            'rollback' => 'Rollback las migration',
                            'cache_clear' => 'Clear application cahe',
                            'route_clear' => 'Clear route cache',
                            'route_cache' => 'Cache routes',
                            'route_list' => 'Show root lists',
                         ],
                        null,
                        ['placeholder' => 'Select action', 'class' => 'form-control'])
                    !!}
                </div>
                <div class="col-md-6">
                    {!! Form::submit(
                        'Execute artisan command',
                        ['class' => 'btn btn-lg btn-primary'])
                    !!}
                </div>
            {!! Form::close() !!}
            <div class="col-md-12">
                @if (\Session::has('message'))
                    <div class="alert alert-warning">
                        <ul>
                            <li>{!! \Session::get('message') !!}</li>
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
