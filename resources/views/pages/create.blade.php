@extends('layouts.master')

@section('content')
    <a class="btn btn-info" href="/pages"><i class="fa fa-chevron-left"></i> Back to pages</a>
    <h2>Create new Page</h2>
    <div class="row">
        <div class="col-md-6">

            @if($errors->all())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>

                </div>
            @endif
            {!! Form::open(['route' => 'pages.store']) !!}
            <div class="form-group">
                {!! Form::label('title','Title') !!}
                {!! Form::text('title', '', array('class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('body','Body') !!}
                {!! Form::textarea('body', '', array('class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Create', array('class' => 'btn btn-success')) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>

@stop