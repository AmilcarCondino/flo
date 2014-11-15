@section('content')
    <h1>Editar foto</h1>
    <div class="container">
        <div class="row show-grid">
            <div class="col-md-4">
                {{  Form::model($photo, ['method' => 'PATCH', 'files' => true, 'route' => ['admin.photos.update', $photo->id]]) }}

                {{ Form::openGroup('title', 'Titulo: ') }}
                    {{ Form::text('title', null, ['class' => 'validate']) }}
                {{ Form::closeGroup() }}

                {{ Form::openGroup('description', 'Descripción: ') }}
                    {{ Form::textarea('description', null, ['class' => 'validate']) }}
                {{ Form::closeGroup() }}

                <div class="row">
                    <div class="col-sm-3">
                        {{ Form::label('show', 'Mostrar') }}
                        {{ Form::select('show', [ '0' => 'No', '1' => 'Si' ], $photo->show) }}
                    </div>

                </div>

                {{ Form::openGroup('category', 'Categoria: ') }}
                    {{ Form::select('categories[]', $categories, $photo->categories()->getRelatedIds(), array('id' => 'categories', 'multiple' => 'multiple', 'class' => 'selectpicker', 'title' => 'Selecione las categorias que desee', 'data-live-search' => 'data-live-search')) }}
                {{ Form::closeGroup() }}

                {{ Form::openGroup('collection', 'Coleccion: ') }}
                    {{ Form::select('collections[]', $collections, $photo->collections()->getRelatedIds(), array('id' => 'collections', 'multiple' => 'multiple', 'class' => 'selectpicker', 'title' => 'Selecione las colecciones que desee', 'data-live-search' => 'data-live-search')) }}
                {{ Form::closeGroup() }}

                {{ Form::openGroup('tags', 'Etiquetas: ') }}
                    {{ Form::select('tags[]', $tags, $photo->tags()->getRelatedIds(), array('id' => 'tags', 'multiple' => 'multiple', 'class' => 'selectpicker', 'title' => 'Selecione las etiquetas que desee', 'data-live-search' => 'data-live-search')) }}
                {{ Form::closeGroup() }}
                <div class="row">
                    <div class="col-sm-6">
                        {{ Form::submit('Editar Foto', array('class'=>'btn btn-sm btn-success', 'id' => 'btn')) }}
                    </div>
                    <div class="col-sm-6">
                        <a class="btn btn-block btn-danger" href="/admin/photos" role="button">Cancelar</a>
                    </div>
                </div>


                {{ Form::close() }}

            </div>

            <script>
                $(".validate").blur(function() {
                    $.ajax({
                        type: "POST",
                        url: "/admin/validate",
                        data: { name: $(this).attr('name'), value: $(this).val() }
                    })
                        .done(function( response ) {
                            if (response == false) {
                                
                            }
                        });
                });
            </script>




            <div class="col-md-8">
                {{ HTML::image("/uploads/images/{$photo->img_name}", 'foto', array('width' => '500')) }}
            </div>
        </div>
    </div>
@stop