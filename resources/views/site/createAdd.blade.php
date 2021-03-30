@extends('layout.app')

@section('content')
    <div class="container my-5">
        <div class="container choiseCategory px-0">
            <h2>Déposer une annonce </h2>
        </div>
        <div class="container postCard">
            <div class="row choiseCategory">
                <h3 style="width:100%;">choisir la categorie</h3>
                @foreach ($group as $item)
                    <div class="col-lg-3 mb-4">
                        <a href="{{ route('ad.subCategory', ['group' => $item->id]) }}" class="rounded cardCategory"
                            style="background-color:{{ $item->color }}">
                            <i class="{{ $item->icon }}"></i>
                            <span class="nameCategory">{{ $item->name }}</span>
                        </a>
                    </div>
                @endforeach
            </div>
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
