@section('content')

    <h1>{{ 'Editar foto' }}</h1>
    <div class="container" style="color: #303030 ">
        <div class="row show-grid">
            <div class="col-md-4">
                {{  Form::model($photo, ['method' => 'PATCH', 'files' => true, 'route' => ['photos.update', $photo->id]]) }}

                    <p>
                        {{ Form::file('image') }}
                    </p>
                    <p>
                        {{ Form::openGroup('title', 'Titulo: ') }}
                            {{ Form::text('title') }}
                        {{ Form::openGroup() }}
                    </p>
                    <p>
                        {{ Form::openGroup('description', 'Descripción: ') }}
                            {{ Form::textarea('description') }}
                        {{ Form::openGroup() }}
                    </p>
                    <p>
                        {{ Form::openGroup('category', 'Categoria: ') }}
                            {{ Form::text('category') }}
                        {{ Form::openGroup() }}
                    </p>
                    <p>
                        {{ Form::label('show', 'Mostrar') }}
                        {{ Form::select('show', [ '0' => 'No', '1' => 'Si' ]) }}
                    </p>

                    <p> {{ Form::submit('Editar Foto', array('class'=>'btn btn-sm btn-success')) }}</p>

                {{ Form::close() }}

                <p><a class="btn btn-danger" href="/photos" role="button">Cancear</a></p>
            </div>

            <div class="col-md-8">
                <p>{{ HTML::image("/uploads/images/{$photo->img_name}", 'foto', array('width' => '500')) }}</p><br />
            </div>
        </div>
    </div>
@stop