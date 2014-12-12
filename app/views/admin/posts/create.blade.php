@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1>Nuevo Post</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            {{  Form::open(array('url' => 'admin/posts' )) }}

                {{ Form::openGroup('title', 'Titulo: ') }}
                    {{ Form::text('title') }}
                {{ Form::closeGroup() }}

                {{ Form::openGroup('body', 'Descripcion: ') }}
                    {{ Form::textarea('body') }}
                {{ Form::closeGroup() }}

                <div class="row">
                    <div class="col-sm-3">
                        <a class="btn btn-block btn-danger" href="/admin/posts" role="button">Cancelar</a>
                    </div>
                    <div class="col-sm-offset-6 col-sm-3">
                        {{ Form::submit('Guardar Post', array('class'=>'btn btn-sm btn-success')) }}
                    </div>
                </div>

            {{ Form::close() }}
        </div>
    </div>
</div>
@stop