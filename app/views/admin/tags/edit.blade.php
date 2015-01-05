@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <h1>Editar Etiqueta</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            {{  Form::model($tag, ['method' => 'PATCH', 'route' => ['admin.tags.update', $tag->id]]) }}

                {{ Form::openGroup('title', 'Titulo: ') }}<br />
                    {{ Form::text('title') }}
                {{ Form::closeGroup() }}

                <div class="row">
                    <div class="col-sm-6">
                        {{ Form::submit('Editar', array('class'=>'btn btn-sm btn-success')) }}
                    </div>
                    <div class="col-sm-6">
                        <a class="btn btn-block btn-danger" href="{{ url('admin') }}" role="button">Cancelar</a>
                    </div>
                </div>

            {{ Form::close() }}
        </div>
    </div>
</div>

@stop