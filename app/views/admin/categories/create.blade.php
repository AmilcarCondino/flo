@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <h1>Crear nueva categoria</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            {{  Form::open(array('url' => 'admin/categories' )) }}

            {{ Form::openGroup('title', 'Categoria: ') }}
                {{ Form::text('title') }}
            {{ Form::closeGroup() }}

            {{ Form::openGroup('title_EN', 'Category: ') }}
                {{ Form::text('title_EN') }}
            {{ Form::closeGroup() }}

            <div class="row">
                <div class="col-sm-6">
                    {{ Form::submit('Guardar', array('class'=>'btn btn-sm btn-success')) }}
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