@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Home</div>

                    <div class="panel-body">
                        You are logged in!
                        <hr/>

                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach


                        <legend>Edit your stuff</legend>
                        <form class="" role="form" method="POST" action="/users/{{$user->id}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input class="form-control" name="email" type="text" value="{{$user->email}}"/>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
