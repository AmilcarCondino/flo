@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <h1>Add a New Post</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            {{  Form::open(array('url' => 'admin/posts' )) }}

            {{ Form::openGroup('title', 'Titulo: ') }}
            {{ Form::text('title') }}
            {{ Form::closeGroup() }}

            {{ Form::openGroup('body', 'Descripcion: ') }}
            {{ Form::textarea('body') }}
            {{ Form::closeGroup() }}

            <div class="row">
                <div class="col-sm-6">
                    {{ Form::submit('Guardar', array('class'=>'btn btn-sm btn-success')) }}
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-block btn-danger" href="/posts" role="button">Cancelar</a>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop