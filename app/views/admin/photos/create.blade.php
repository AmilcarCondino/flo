@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1>Agreguemos una Nueva Foto</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            {{ Form::open(array('url' => 'admin/photos', 'files' => true)) }}

                {{ Form::file('image') }}

                {{ Form::openGroup('title', 'Titulo: ') }}
                {{ Form::text('title') }}
                {{ Form::closeGroup() }}

                {{ Form::openGroup('description', 'Descripción: ') }}
                {{ Form::textarea('description') }}
                {{ Form::closeGroup() }}

                <div class="row">
                    <div class="col-sm-2">
                        {{ Form::label('show', 'Mostrar') }}
                        {{ Form::select('show', [ '0' => 'No', '1' => 'Si' ], '1') }}
                    </div>

                </div>
                {{ Form::openGroup('category', 'Categoria: ') }}
                {{ Form::text('category') }}
                {{ Form::closeGroup() }}

                <div class="row">
                    <div class="col-sm-3">
                        {{ Form::submit('Guardar Foto', array('class'=>'btn btn-sm-3 btn-success')) }}
                    </div>
                    <div class="col-sm-3">
                        <a class="btn btn-block btn-danger" href="/admin/photos" role="button">Cancelar</a>
                    </div>
                </div>

            {{ Form::close() }}
        </div>
    </div>
</div>
@stop
