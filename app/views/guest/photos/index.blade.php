
@section('content')

<div id="masonry-container">


    <?php $i = ''; ?>

    @foreach($photos as $photo)
        @if ( $i === '1' || $i === 'g')
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
          //columnWidth: 600,
          itemSelector: '.item'
        });
    });

</script>

@stop