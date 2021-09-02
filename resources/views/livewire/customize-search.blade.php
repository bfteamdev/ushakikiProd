<div class="ads-grid row">
    <div class="side-bar col-md-3 grayBg">
        <div class="search-hotel">
            <div class="field has-label">
                <input type="search" id="search" class="field-input allInputs " name="email" value="" autocomplete="off"
                    aria-autocomplete="off" wire:model.debounce.300ms="q" placeholder="Search by name">
            </div>
        </div>
        <div class="search-hotel">
            <h3 class="sear-head">Trie par prix</h3>
            <div class="form-check">
                <label>
                    <input type="radio" wire:model.debounce.300ms="trieByPrice" value="">&nbsp;All
                </label>
            </div>
            @foreach ($tablePrice as $key => $item)
                <div class="form-check">
                    <label>
                        <input type="radio" wire:model.debounce.300ms="trieByPrice"
                            value="{{ $key . '-' . $key * $item }}">&nbsp;{{ number_format($key) . ' - ' . number_format($key * $item) }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
    <div class="ads-display col-md-9">
        <div class="wrapper boxView grayBg">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active show" id="home" aria-labelledby="home-tab">
                        <div id="container">
                            <div class="clearfix"></div>
                            <ul class="list">
                                @forelse ($annonce as $item)
                                    <a
                                        href="{{ route('category.product.one', ['name' => $item->category->name ?? $item->type->name, 'id' => $item->id]) }}">
                                        <li>
                                            <img src="{{ asset('storage/' . $item->viewPhoto->name) }}" title=""
                                                alt="" />
                                            <section class="list-left">
                                                <h5 class="title">{{ $item->title }}</h5>
                                                <span
                                                    class="adprice">{{ number_format($item->price) }}&nbsp;Fbu</span>
                                                <p class="catpath">{{ $name }} » Other
                                                    {{ $name }}</p>
                                            </section>
                                            <section class="list-right">
                                                <span class="date">Poster: {{ $item->created_at }}</span>
                                                {{-- <span class="cityname">{{ $item->commune }} {{ $item->zone  }}</span> --}}
                                            </section>
                                            <section class="list-right">
                                                <div class="">
                                                    <a href="#" class="btn btn-primary m-0" id="facebook-btn">
                                                        <i class="fab fa-facebook-square" aria-hidden="true" style=" color:#3b5998"></i>&nbsp; share</a>
                                                </div>
                                            </section>
                                            <div class="clearfix"></div>
                                        </li>
                                    </a>
                                @empty
                                    <li>
                                        <section class="no-result">
                                            Pas de resultats
                                        </section>
                                        <div class="clearfix"></div>
                                    </li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                    <div class="d-felx justify-content-center">
                        {{ $annonce->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>


