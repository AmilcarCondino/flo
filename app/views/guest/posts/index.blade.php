<?php
    $lan = Session::get('lan');
?>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1>Listado de posts</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <ul class="list-group">
                @foreach($posts as $post)
                @if($post->language == $lan['language'])
                    <li class="list-group-item list-group-item-info">
                        {{ link_to("posts/{$post->id}", $post->title) }}
                    </li>
                @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>


@stop