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

                {{ Form::openGroup('categories', 'Categoria: ') }}
                    <h6>(Utilizar control para seleccionar mas de una opcion)</h6>
                    {{ Form::select('categories[]', $categories, Input::old('categories'), ['multiple' => true]) }}
                {{ Form::closeGroup() }}

                {{ Form::openGroup('collections', 'Coleccion: ') }}
                    <h6>(Utilizar control para seleccionar mas de una opcion)</h6>
                    {{ Form::select('collections[]', $collections, Input::old('collections'), ['multiple' => true]) }}
                {{ Form::closeGroup() }}

                {{ Form::openGroup('tags', 'Etiquetas: ') }}
                    <h6>(Utilizar control para seleccionar mas de una opcion)</h6>
                    {{ Form::select('tags[]', $tags, Input::old('tags'), ['multiple' => true]) }}
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
