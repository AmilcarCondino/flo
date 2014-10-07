@section('content')

    <h1>Agreguemos una Nueva Foto</h1>

    <div class="container" style="color: #303030 ">

            {{ Form::open(array('url' => 'photos', 'files' => true)) }}

                <p>
                    {{ Form::file('image') }}
                </p>
                <p>
                    {{ Form::label('title', 'Titulo: ') }}
                    {{ Form::text('title') }}
                    {{ $errors->first('title') }}
                </p>
                <p>
                    {{ Form::label('description', 'Descripción: ') }}
                    {{ Form::textarea('description') }}
                    {{ $errors->first('description') }}
                </p>
                <p>
                    {{ Form::label('category', 'Categoria: ') }}
                    {{ Form::text('category') }}
                    {{ $errors->first('category') }}
                </p>
                <p>
                    {{ Form::label('show', 'Mostrar') }}
                    {{ Form::select('show', [ '0' => 'No', '1' => 'Si' ], '1') }}
                </p>
                <p>
                    {{ Form::submit('Guardar Foto') }}
                </p>

            {{ Form::close() }}

    </div>

        <p>{{ HTML::link('photos', 'Cancelar') }}</p>


@stop
