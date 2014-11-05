
@section('content')
<<<<<<< HEAD
<div class="container">
    <div class="row" id="container">
        @foreach($photos as $photo)
            @if($photo->show === 1)
                <div class="item">
=======

<div id="masonry-container">


    <?php $i = 'a'; ?>

    @foreach($photos as $photo)
        @if ( $i === 'h')
             <?php $i = 'a'; ?>
        @endif
        @if($photo->show === 1)
            <div class="item {{$i}}">
>>>>>>> masonry-test
                <a href="/photos/{{ $photo->id }}">
                    <img  class="img-rounded" src="/uploads/images/{{$photo->img_name}}" alt="alt">
                </a>
<<<<<<< HEAD
                </div>
            @endif
        @endforeach
    </div>
=======
            </div>
        @endif
    <?php $i++;?>
    @endforeach
>>>>>>> masonry-test
</div>

<script>

<<<<<<< HEAD

    $( window ).load(function(){
        var container = document.querySelector('#container');
        var msnry = new Masonry( container, {
            // options
            isFitWidth:true,
            columnWidth: 200,
            itemSelector: '.item'
=======
    $( window ).load(function(){
        var container = document.querySelector('#masonry-container');
        var msnry = new Masonry( container, {
          // options
            
          columnWidth: 285,
          itemSelector: '.item'
>>>>>>> masonry-test
        });
        
    });

</script>

@stop