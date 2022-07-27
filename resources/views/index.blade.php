@extends('front_end/layout/layout')

@section('slide_show')
@includeIf('front_end.partial.slide_show')
@endsection

@section('new_arrival')
@include('front_end.partial.new_arrival')
@endsection

@section('sidebar')
      @includeIf('front_end.partial.sidebar')
@endsection
@section('content')
   @includeIf('front_end.partial.product_for_you')
    
@endsection








  

   