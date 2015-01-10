@extends('layouts.master')

@section('content')
    @if(Session::has('flash_m'))
    <div class="alert alert-success alert-dismissable">
        <i class="fa fa-check"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{Session::get('flash_m')}}
    </div>
    @endif
    <ul>
        @foreach($pages as $page)
            <li><a href="/pages/{{$page->id}}/edit">{{$page->title}} @if($page->parent) <small>This one has a parent</small> @endif</a></li>
        @endforeach
    </ul>
    <a class="btn btn-default" href="/pages/create">Create page</a>
@stop