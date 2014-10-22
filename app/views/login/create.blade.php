@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <h1>Log In</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            {{  Form::open(array('route' => 'users.store' )) }}

            {{ Form::openGroup('user', 'Usuario: ') }}
            {{ Form::text('user') }}
            {{ Form::closeGroup() }}

            {{ Form::openGroup('password', 'Password: ') }}
            {{ Form::password('password') }}
            {{ Form::closeGroup() }}

            <div class="row">
                <div class="col-sm-6">
                    {{ Form::submit('Ingresar', array('class'=>'btn btn-sm btn-success')) }}
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-block btn-danger" href="/" role="button">Cancelar</a>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop