@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12, text-center">
            <h2>{{ $photo->title }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-4, text-center">
                {{ HTML::image("/uploads/images/{$photo->img_name}", 'foto', array('width' => '500')) }}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12, text-center">
                    <h5>{{ $photo->description }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>




@stop




