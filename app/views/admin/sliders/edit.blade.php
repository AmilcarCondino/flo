@section('content')
<h1>Editar foto</h1>
<div class="container">
    <div class="row show-grid">
        <div class="col-md-4">
            {{  Form::model($slide, ['method' => 'PATCH', 'files' => true, 'route' => ['admin.sliders.update', $slide->id]]) }}

            {{ Form::openGroup('headline', 'Titulo: ') }}
            {{ Form::text('headline', null, ['class' => 'validate']) }}
            {{ Form::closeGroup() }}

            {{ Form::openGroup('paragraph', 'Descripción: ') }}
            {{ Form::textarea('paragraph', null, ['class' => 'validate']) }}
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
</div>
@stop