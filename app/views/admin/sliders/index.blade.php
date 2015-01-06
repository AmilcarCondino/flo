@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <a class="btn btn-success" href="sliders/create" role="button">Nueva Slide</a>
        </div>
    </div>

    <div class="row">
        <div class="table table-hover">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Hedline</th>
                    <th>Comentario</th>
                    <th>Show</th>
                    <th>Orden</th>
                    <th>Creado</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sliders as $slide)
                <tr>
                    <td>
                        <a href="/admin/sliders/{{ $slide->id }}">
                            <img src="/uploads/slider/{{$slide->img_name}}"class="img-responsive img-rounded" alt="Responsive image" style=" height: 50px">
                        </a>
                    </td>

                    <td>
                        {{$slide->headline}}
                    </td>

                    <td>
                        {{$slide->paragraph}}
                    </td>

                    <td>
                        @if($slide->show === 1)
                        Si
                        @else
                        No
                        @endif
                    </td>

                    <td>
                        {{$slide->order}}
                    </td>

                    <td>
                        {{$slide->created_at}}
                    </td>

                    <td>
                        {{ Form::open(['method' => 'get', 'route' => ['admin.sliders.edit', $slide->id]]) }}

                        {{ Form::submit('Editar', array('class'=>'btn btn-sm btn-primary')) }}

                        {{ Form::close() }}
                    </td>

                    <td>
                        {{ Form::open(['method' => 'delete', 'route' => ['admin.sliders.destroy', $slide->id]]) }}

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



