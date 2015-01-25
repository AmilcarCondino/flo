@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <h1>Editar registro</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-10">
            {{  Form::model($post, ['method' => 'PATCH', 'route' => ['admin.posts.update', $post->id]]) }}

                {{ Form::openGroup('title', 'Titlo: ') }}<br />
                    {{ Form::text('title') }}
                {{ Form::closeGroup() }}

                {{ Form::openGroup('body', 'Descripcion: ') }}<br />
                    {{ Form::textarea('body') }}
                {{ Form::closeGroup() }}

                <div class="row">
                    <div class="col-sm-6">
                    {{ Form::submit('Editar Post', array('class'=>'btn btn-sm btn-success')) }}
                    </div>
                    <div class="col-sm-6">
                    <a class="btn btn-block btn-danger" href="/admin/posts" role="button">Cancelar</a>
                    </div>
                </div>

            {{ Form::close() }}
        </div>
    </div>
</div>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'body' );
</script>
@stop