@section('content')
    <h1>Editar foto</h1>
    <div class="container">
        <div class="row show-grid">
            <div class="col-md-4">
                {{  Form::model($photo, ['method' => 'PATCH', 'files' => true, 'route' => ['admin.photos.update', $photo->id]]) }}

                    {{ Form::file('image') }}

                    {{ Form::openGroup('title', 'Titulo: ') }}
                        {{ Form::text('title') }}
                    {{ Form::closeGroup() }}

                    {{ Form::openGroup('description', 'Descripción: ') }}
                        {{ Form::textarea('description') }}
                    {{ Form::closeGroup() }}

                    {{ Form::openGroup('category', 'Categoria: ') }}
                        {{ Form::text('category') }}
                    {{ Form::closeGroup() }}

                    {{ Form::label('show', 'Mostrar') }}
                    {{ Form::select('show', [ '0' => 'No', '1' => 'Si' ]) }}

                    <div class="row">
                        <div class="col-sm-6">
                            {{ Form::submit('Editar Foto', array('class'=>'btn btn-sm btn-success')) }}
                        </div>
                        <div class="col-sm-6">
                            <a class="btn btn-block btn-danger" href="/photos" role="button">Cancelar</a>
                        </div>
                    </div>


                {{ Form::close() }}


            </div>

            <div class="col-md-8">
                {{ HTML::image("/uploads/images/{$photo->img_name}", 'foto', array('width' => '500')) }}
            </div>
        </div>
    </div>
@stop