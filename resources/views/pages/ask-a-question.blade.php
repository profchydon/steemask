
@extends('layout.master')

@section('content')

<div class="container home-container">

  <div class="row home-row">

      @include('layout.ask-a-question')
      @include('layout.side')

  </div><!-- /.row -->

</div><!-- /.container -->




@endsection
