@section('content')

<div class="row">
    <div class="col-sm-6">
        {{ Form::open(array('url' => 'admin/sliders', 'files' => true)) }}

        <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                <img data-src="holder.js/100%x100%" alt="...">
            </div>
            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
            <div><p>*El tamaño de las imagenes debe ser de 1024px x 523px</p></div>
            <div>
                <span class="btn btn-default btn-file btn btn-sm-3 btn-primary"><span class="fileinput-new">Seleccionar Imagen</span><span class="fileinput-exists">Change</span><input type="file" name="image"></span>
                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
            </div>
        </div>

            {{ Form::openGroup('headline', 'Titulo: ') }}
            {{ Form::text('headline', null, ['class' => 'validate']) }}
            {{ Form::closeGroup() }}

            {{ Form::openGroup('paragraph', 'Parrafo: ') }}
            {{ Form::textarea('paragraph', null, ['class' => 'validate']) }}
            {{ Form::closeGroup() }}

        <div class="row">
            <div class="col-sm-2">
                {{ Form::label('show', 'Mostrar') }}
                {{ Form::select('show', [ '0' => 'No', '1' => 'Si' ], '1') }}
            </div>
        </div> </br>

        <div class="row">
            <div class="col-sm-3">
                {{ Form::submit('Guardar Slide', array('class'=>'btn btn-sm-3 btn-success')) }}
            </div>
            <div class="col-sm-3">
                <a class="btn btn-block btn-danger" href="/admin/photos" role="button">Cancelar</a>
            </div>
        </div>

        {{ Form::close() }}
    </div>
</div>
@stop