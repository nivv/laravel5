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
            {!! Form::open(['route' => 'pages.store', 'id' => 'foo']) !!}
            <!-- Title Form Input -->
            <div class="form-group control-group" data-form-field="title">
                {!! Form::label('title','Title:') !!}
                {!! Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Title')) !!}
            </div>

            <div class="form-group control-group" data-form-field="body">
                {!! Form::label('body','Body') !!}
                {!! Form::textarea('body', '', array('class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Create', array('class' => 'btn btn-success')) !!}
            </div>
            <div class="alert alert-danger error-container" style="display: none">
                <ul class="error-list"></ul>
            </div>
            <h4>To remember</h4>
                <pre>
                     &lt;!-- $VALUE$ Form Input --&gt;
&lt;div class=&quot;form-group&quot;&gt;
                    {|| Form::label(&apos;$NAME$&apos;,&apos;$VALUE$:&apos;) ||}
                    {|| Form::text(&apos;$NAME$&apos;, null, array(&apos;class&apos; =&gt; &apos;form-control&apos;, &apos;placeholder&apos; =&gt; &apos;$VALUE$&apos;)) ||}
                    &lt;/div&gt;
                </pre>
                                <pre>
                    &#x3C;!-- $VALUE$ Form Input --&#x3E;
&#x3C;div class=&#x22;form-group&#x22;&#x3E;
                    {// Form::label(&#x27;$NAME$&#x27;,&#x27;$VALUE$:&#x27;) //}
                    {// Form::password(&#x27;$NAME$&#x27;, null, array(&#x27;class&#x27; =&#x3E; &#x27;form-control&#x27;, &#x27;placeholder&#x27; =&#x3E; &#x27;$VALUE$&#x27;)) //}
                    &#x3C;/div&#x3E;
                </pre>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('scripts')
    <script>
        var request = window.superagent;
    </script>
    <script>
        $("form").submit(function (e) {

            var form = $('form');
            var url = $('form').attr('action');
            request
                    .post(url)
                    .send(form.serialize())
                    .end(function (error, res) {
                        if (res.status == 422) {
                            var data = JSON.parse(res.text);
                            $('.error-list').empty();
                            $('.has-error').removeClass('has-error');

                            for (var item in data) {
                                console.log('adding error to: '+item)
                                $("[data-form-field='" + item + "']").addClass('has-error')
                                //console.log("Key: " + item + " / Value: " + data[item]);
                                $('.error-list').append('<li>' + data[item] + '</li>')
                            }
                            $('.error-container').slideDown();
                        } else if (res.status == 200) {
                            $('.error-container').slideUp();
                            alert('page saved');
                        }
                    });
            return false;
        });

    </script>
@stop