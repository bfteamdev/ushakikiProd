@extends('layout.app')

@section('content')
    <div class="container my-5">
        <div class="container choiseCategory px-0">
            <h2>Déposer une annonce </h2>
        </div>
        <div class="container postCard">
            <div class="row choiseCategory">
                {{-- style="display: flex;flex-wrap: wrap;align-items: center;justify-content: center;"> --}}
                <h3 style="width:100%;" class="mx-4">Ad more information</h3>
                @if(sizeof($subCategory) !== 0)
                @foreach ($subCategory as $item)
                    <div class="col-lg-6 col-md-6 mb-4">
                        <a href="{{ route('ad.AddMoreInfo', ['category' => $item->id]) }}" class="cardSubCategory">
                            <i class="{{ $item->icon }}"></i>
                            <span class="nameCategory">{{ $item->name }}</span>
                            <div class="totalAds">
                                <span>200</span>
                                <span>Annonces</span>
                            </div>
                        </a>
                    </div>
                @endforeach
                @else
                <h4 class="mx-4">No result</h4>
                @endif
            </div>
        </div>

    </div>
@endsection
@section('footer')
    @include('layout.partials.include.footer')
@endsection
