
@section('content')
<div id="masonry-container">
    <?php $i = 'a'; ?>
    @foreach($photos as $photo)
        @if ( $i === 'h')
             <?php $i = 'a'; ?>
        @endif
        @if($photo->show === 1)
            <div class="item {{$i}}">
                <a href="/photos/{{ $photo->id }}">
                    <img  class="img-rounded" src="/uploads/images/{{$photo->img_name}}" alt="alt">
                </a>
            </div>
        @endif
    <?php $i++;?>
    @endforeach
</div>

<script>

    $( window ).load(function(){
        var container = document.querySelector('#masonry-container');
        var msnry = new Masonry( container, {
          // options
          columnWidth: 287,
          itemSelector: '.item'
        });
    });

</script>

@stop