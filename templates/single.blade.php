@extends('layouts.base')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials/content-single')
  @endwhile
@endsection

