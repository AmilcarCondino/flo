@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <h1>Editar Categoría</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            {{  Form::model($category, ['method' => 'PATCH', 'route' => ['admin.categories.update', $category->id]]) }}

                {{ Form::openGroup('title', 'Titulo: ') }}<br />
                    {{ Form::text('title') }}
                {{ Form::closeGroup() }}

                <div class="row">
                    <div class="col-sm-6">
                        <a class="btn btn-block btn-danger" href="{{ url('admin') }}" role="button">Cancelar</a>
                    </div>
                    <div class="col-sm-6">
                        {{ Form::submit('Guardar', array('class'=>'btn btn-sm btn-success')) }}
                    </div>
                </div>

            {{ Form::close() }}
        </div>
    </div>
</div>

@stop