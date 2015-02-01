@section('content')
<h1>Editar foto</h1>
<div class="container">
    <div class="row show-grid">
        <div class="col-md-4">

            <div class="col-lg-10"><img src="/uploads/slider/{{ $slide->img_name }}" style="width: 520px;"></div>
            {{  Form::model($slide, ['method' => 'PATCH', 'files' => true, 'route' => ['admin.sliders.update', $slide->id]]) }}

            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="width: 0px; height: 0px;">
                    <img data-src="holder.js/100%x100%" alt="...">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                <div><p>*El tamaño de las imagenes debe ser de 1024px x 523px</p></div>
                <div>
                    <span class="btn btn-default btn-file btn btn-sm-3 btn-primary"><span class="fileinput-new">Seleccionar Nueva Imagen</span><span class="fileinput-exists">Cambiar</span><input type="file" name="image"></span>
                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Cancelar</a>
                </div>
            </div>

            {{ Form::openGroup('title', 'Titulo: ') }}
            {{ Form::text('title', $slide->img_name, ['class' => 'validate']) }}
            {{ Form::closeGroup() }}

            <div class="row">
                <div class="col-sm-3">
                    {{ Form::label('show', 'Mostrar') }}
                    {{ Form::select('show', [ '0' => 'No', '1' => 'Si' ], $slide->show) }}
                </div>
                <div class="col-sm-3">
                    {{ Form::openGroup('order', 'Orden: ') }}
                    {{ Form::selectRange('order', 1, $rows) }}
                    {{ Form::closeGroup() }}
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    {{ Form::submit('Editar Slide', array('class'=>'btn btn-sm btn-success', 'id' => 'btn')) }}
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-block btn-danger" href="/admin/sliders" role="button">Cancelar</a>
                </div>
            </div>

            {{ Form::close() }}

        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            {{  Form::open(array('method' => 'GET', 'url' => 'admin/captions/create' )) }}

                {{ Form::openGroup('slide_id') }}
                    {{ Form::text('slide_id', $slide->id, ['class' => 'hide']) }}
                {{ Form::closeGroup() }}

                {{ Form::submit('Crear Copete', array('class'=>'btn btn-sm btn-primary', 'id' => 'btn')) }}

            {{ Form::close() }}
        </div>
    </div>
    <div class="row">
        <div class="table table-hover">
            <table class="table">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Demora de entrada</th>
                    <th>Poscion desde arriba</th>
                    <th>Poscion desde izquierda</th>
                    <th>Es epigrafe de</th>
                </tr>
                </thead>
                <tbody>
                @foreach($captions as $caption)
                <tr>
                    <td>
                        @if ($caption->is_photo === 1)
                            <img src="/uploads/captions/{{$caption->caption_image_name}}"class="img-responsive img-rounded" alt="Responsive image" style=" height: 50px">
                        @else
                            {{ $caption->caption_body }}
                        @endif
                    </td>
                    <td>
                        {{$caption->data_delay}}
                    </td>
                    <td>
                        {{$caption->top_position}}
                    </td>
                    <td>
                        {{$caption->left_position}}
                    </td>
                    <td>
                        @if ($caption->parent_id === 0)
                        @else
                            <?php
                                $parent_caption =  DB::table('captions')->where('id', '=', $caption->parent_id)->get();
                            echo $parent_caption[0]->caption_body;


                            ?>
                        @endif
                    </td>
                    <td>
                        {{ Form::open(['method' => 'get', 'route' => ['admin.captions.edit', $caption->id]]) }}

                            {{ Form::submit('Editar', array('class'=>'btn btn-sm btn-primary')) }}

                        {{ Form::close() }}
                    </td>
                    <td>
                        {{ Form::open(['method' => 'delete', 'route' => ['admin.captions.destroy', $caption->id]]) }}

                            {{ Form::submit('Eliminar', array('class'=>'btn btn-xs btn-danger')) }}

                        {{ Form::close() }}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop