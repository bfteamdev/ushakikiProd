@extends('layout.app')

@section('content')


    <div class="container choiseCategory">
        <h2>Déposer une annonce </h2>
    </div>

    <div class=" container">
        <div class="row m-0 justify-content-center align-items-center choiseCategory">
            <h3 class="w-100">choisir la categorie</h3>
            @foreach ($cat as $item)
                <a href="{{ route('ad.subCategory', ['id' => $item->id]) }}" class="col-lg-3 rounded m-3 cardCategory"
                    style="background-color:{{ $item->color }}">
                    <i class="{{ $item->icon }}"></i>
                    <span class="nameCategory">{{ $item->name }}</span>
                </a>
            @endforeach
        </div>
    </div>
@endsection
@section('footer')
    @include('layout.partials.include.footer')
@endsection
@section('styles')
    <style>
        .cat {
            border-radius: 25%;
            background-color: #ffffff
        }

    </style>

@endsection
