@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <h1>Editar registro</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-10">
            {{  Form::model($caption, ['method' => 'PATCH', 'files' => true, 'route' => ['admin.captions.update', $caption->id]]) }}

            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="width: 0px; height: 0px;">
                    <img data-src="holder.js/100%x100%" alt="...">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                <div><p>*El tamaño de las imagenes debe ser de 1024px x 523px</p></div>
                <div>
                    <span class="btn btn-default btn-file btn btn-sm-3 btn-primary"><span class="fileinput-new">Buscar Imagen</span><span class="fileinput-exists">Cambiar</span><input type="file" name="image"></span>
                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Cancelar</a>
                </div>
            </div>
        </div class="row">
        <div class="col-sm-9">
            {{ Form::openGroup('caption_body', 'Copete o nombre de la imagen: ') }}
                {{ Form::text('caption_body') }}
            {{ Form::closeGroup() }}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            {{ Form::label('is_photo', 'Es una imagen:') }}
            {{ Form::select('is_photo', [ '0' => 'No', '1' => 'Si' ], $caption->is_photo) }}
        </div>

        <div class="col-sm-3">
            {{ Form::openGroup('data_animate', 'Animacion: ') }}
                {{ Form::select('data_animate', array(  'slideAppearLeftToRight' => 'De izquierda a Drecha',
                                                        'slideAppearRightToLeft' => 'De derecha a izquierda',
                                                        'slideAppearUpToDown' => 'De arriba a abajo',
                                                        'slideAppearDownToUp' => 'De abajo a arriba'
                )) }}
            {{ Form::closeGroup() }}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            {{ Form::openGroup('data_delay', 'Demora de entrada en ms: ') }}
                {{ Form::number('data_delay') }}
            {{ Form::closeGroup() }}
        </div>
        <div class="col-sm-3">
            {{ Form::openGroup('data_length', 'Velocidad de entrada en ms: ') }}
                {{ Form::number('data_length') }}
            {{ Form::closeGroup() }}
        </div>
        <div class="col-sm-3">
            {{ Form::openGroup('transition_distance', 'Distancia de entrada: ') }}
                {{ Form::number('transition_distance') }}
            {{ Form::closeGroup() }}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            {{ Form::openGroup('top_position', 'Poscion desde arriba en %: ') }}
                {{ Form::number('top_position') }}
            {{ Form::closeGroup() }}
        </div>
        <div class="col-sm-3">
            {{ Form::openGroup('left_position', 'Poscion desde izquierda en %: ') }}
                {{ Form::number('left_position') }}
            {{ Form::closeGroup() }}
        </div>
        <div class="col-sm-3">
            {{ Form::openGroup('parent_id', 'Es epigrafe de:') }}
                {{ Form::select('parent_id', array('Copetes', 'Selecione el que corresponda' => $caption), array('id' => 'caption_body', 'class' => 'selectpicker')) }}
            {{ Form::closeGroup() }}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            {{ Form::submit('Guardar', array('class'=>'btn btn-sm btn-success', 'id' => 'btn')) }}
        </div>
        <div class="col-sm-3">
            <a class="btn btn-block btn-danger" href="/admin/sliders/<?php $parent_slide = $caption->sliders;?>{{$parent_slide[0]->id;}}/edit" role="button">Cancelar</a>
        </div>
    </div>
    {{ Form::close() }}
        </div>
    </div>
</div>
@stop