@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12"><h1>Nueva Foto</h1></div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            {{ Form::open(array('url' => 'admin/photos', 'files' => true)) }}

                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                        <img data-src="holder.js/100%x100%" alt="...">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                    <div>
                        <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="image"></span>
                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                    </div>
                </div>


                {{ Form::openGroup('title', 'Titulo: ') }}
                    {{ Form::text('title', null, ['class' => 'validate']) }}
                {{ Form::closeGroup() }}

                {{ Form::openGroup('description', 'Descripción: ') }}
                    {{ Form::textarea('description', null, ['class' => 'validate']) }}
                {{ Form::closeGroup() }}

                <div class="row">
                    <div class="col-sm-2">
                        {{ Form::label('show', 'Mostrar') }}
                        {{ Form::select('show', [ '0' => 'No', '1' => 'Si' ], '1') }}
                    </div>

                </div>

                {{ Form::openGroup('categories', 'Categoria: ') }}
                    {{ Form::select('categories[]', $categories, Input::old('categories'), array('id' => 'tags', 'multiple' => 'multiple', 'class' => 'selectpicker', 'title' => 'Selecione las categorias que desee', 'data-live-search' => 'data-live-search')) }}
                {{ Form::closeGroup() }}

                {{ Form::openGroup('collections', 'Coleccion: ') }}
                    {{ Form::select('collections[]', $collections, Input::old('collections'), array('id' => 'tags', 'multiple' => 'multiple', 'class' => 'selectpicker', 'title' => 'Selecione las colecciones que desee', 'data-live-search' => 'data-live-search')) }}
                {{ Form::closeGroup() }}

                {{ Form::openGroup('tags', 'Etiquetas: ') }}
                    {{ Form::select('tags[]', $tags, Input::old('tags'), array('id' => 'tags', 'multiple' => 'multiple', 'class' => 'selectpicker', 'title' => 'Selecione las etiquetas que desee', 'data-live-search' => 'data-live-search')) }}
                {{ Form::closeGroup() }}

                <div class="row">
                    <div class="col-sm-6">
                        <a class="btn btn-block btn-danger" href="/admin/photos" role="button">Cancelar</a>
                    </div>
                    <div class="col-sm-6">
                        {{ Form::submit('Guardar Foto', array('class'=>'btn btn-sm btn-success', 'id' => 'btn')) }}
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
    </div>
</div>
@stop
