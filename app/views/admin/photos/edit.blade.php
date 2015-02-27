@section('content')
    <h1>Editar foto</h1>
    <div class="container">
        <div class="row show-grid">
            <div class="col-md-6">
                {{  Form::open(array('method' => 'PATCH', 'files' => true, 'route' => ['admin.photos.update', $photo->id])) }}

                <div class="row">
                    <div class="col-sm-6">
                        {{ Form::openGroup('title', 'Titulo: ') }}
                            {{ Form::text('title', $photo->title, ['class' => 'validate']) }}
                        {{ Form::closeGroup() }}

                        {{ Form::openGroup('description', 'Descripción: ') }}
                            {{ Form::textarea('description', $photo->description, ['class' => 'validate']) }}
                        {{ Form::closeGroup() }}
                    </div>
                    <div class="col-sm-6">
                        {{ Form::openGroup('title_en', 'Titulo: ') }}
                            {{ Form::text('title_en', $photo_en->title, ['class' => 'validate']) }}
                        {{ Form::closeGroup() }}

                        {{ Form::openGroup('description_en', 'Descripción: ') }}
                            {{ Form::textarea('description_en', $photo_en->description, ['class' => 'validate']) }}
                        {{ Form::closeGroup() }}
                    </div>
                </div>
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
                        data: { photoId: <?php echo $photo->id; ?>, name: $(this).attr('name'), value: $(this).val() }
                    })
                        .done(function( response ) {

                            var attributte = response.attributeName;




                            if (    $( "[name="+attributte+"]").parent("div").children("p") ) {
                                    $( "[name="+attributte+"]").parent("div").children("p").remove();
                            }

                            if (response.success) {

                                $("[name="+attributte+"]").parent("div").removeClass("has-error");
                                $("[name="+attributte+"]").parent("div").addClass("has-success");

                            }

                            if (!response.success) {

                                $("[name="+attributte+"]").parent("div").removeClass("has-success");
                                var errors = response.errors;
                                var error  = $.map( errors, function( value, key ) {
                                    return value;
                                });

                                $("[name="+attributte+"]").parent("div").addClass("has-error");
                                $("[name="+attributte+"]").parent("div").append(" <p class= 'help-block' >"+error);

                            }
                        });
                });
            </script>




            <div class="col-md-6">
                {{ HTML::image("/uploads/images/{$photo->img_name}", 'foto', array('width' => '500')) }}
            </div>
        </div>
    </div>
@stop