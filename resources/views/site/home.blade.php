@extends('layout.app')
@section('title')
    <title>home</title>
@endsection


@section('content')
<div class="main-banner banner text-center">
    <div class="container">
        <h1>Sell or Advertise <span class="segment-heading"> anything online </span> with Resale</h1>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
        <a href="post-ad.html">Post Free Ad</a>
    </div>
</div>
    @include('site.partial.homeContent')
@endsection

@section('footer')
    @include('layout.partials.include.footer')

@endsection
