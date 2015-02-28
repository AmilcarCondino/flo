@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <h1>Editar Categoria</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            {{  Form::open(array('method' => 'PATCH', 'route' => ['admin.categories.update', $category->id])) }}

                {{ Form::openGroup('title', 'Categoria: ') }}<br />
                    {{ Form::text('title', $category->title) }}
                {{ Form::closeGroup() }}

                {{ Form::openGroup('title_EN', 'Category: ') }}<br />
                    {{ Form::text('title_EN', $category->title_EN) }}
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