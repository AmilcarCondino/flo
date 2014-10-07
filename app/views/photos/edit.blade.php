@section('content')

    <h1>{{ 'Editar foto' }}</h1>
    <div class="container" style="color: #303030 ">
        {{  Form::model($photo, ['method' => 'PATCH', 'files' => true, 'route' => ['photos.update', $photo->id]]) }}

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
                {{ Form::select('show', [ '0' => 'No', '1' => 'Si' ]) }}
            </p>

            <p> {{ Form::submit('Editar Foto') }}</p>

        {{ Form::close() }}
    </div>

    <p>{{ HTML::link('photos', 'Cancelar') }}</p>

    <p>{{ HTML::image("/uploads/images/{$photo->img_name}", 'foto', array('width' => '500')) }}</p><br />

@stop