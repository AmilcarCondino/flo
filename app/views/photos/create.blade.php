@section('content')

    <h1>Agreguemos una Nueva Foto</h1>

    <div class="container" style="color: #303030 ">

            {{ Form::open(array('url' => 'photos', 'files' => true)) }}


                    {{ Form::file('image') }}


                    {{ Form::label('title', 'Titulo: ') }}
                    {{ Form::text('title') }}
                    {{ $errors->first('title') }}


                    {{ Form::label('description', 'Descripción: ') }}
                    {{ Form::textarea('description') }}
                    {{ $errors->first('description') }}


                    {{ Form::label('category', 'Categoria: ') }}
                    {{ Form::text('category') }}
                    {{ $errors->first('category') }}


                    {{ Form::label('show', 'Mostrar') }}
                    {{ Form::select('show', [ '0' => 'No', '1' => 'Si' ], '1') }}


                    {{ Form::submit('Guardar Foto') }}


            {{ Form::close() }}

    </div>

        {{ HTML::link('photos', 'Cancelar') }}


@stop
