@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">IndexPlan {{ $indexplan->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('admin/index-plan/' . $indexplan->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit IndexPlan"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/indexplan', $indexplan->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete IndexPlan',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $indexplan->id }}</td>
                                    </tr>
                                    <tr><th> Name Line1 </th><td> {{ $indexplan->name_line1 }} </td></tr><tr><th> Name Line2 </th><td> {{ $indexplan->name_line2 }} </td></tr><tr><th> Status </th><td> {{ $indexplan->status }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection