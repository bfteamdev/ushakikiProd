@extends('layout.app')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/easy-responsive-tabs.css') }}" rel="preload"
        as="style" />
    <style rel="preload" as="style">
        .resp-tab-active {
            border: 1px solid #dbac14 !important;
            border-top: 4px solid #dbac14 !important;
        }

    </style>
@endsection
@section('content')
    <div class="container">
        <h2 class="head">Main Categories</h2>
        <div class="category-list">
            <div id="parentVerticalTab" class="resp-vtabs hor_1" style="display: block; width: 100%; margin: 0px;">
                <ul class="resp-tabs-list hor_1" style="margin-top: 3px;">
                    @foreach ($category as $key => $item)
                        <li class="resp-tab-item hor_1" aria-controls="hor_1_tab_item-{{ $key }}" role="tab"
                            style="background-color: #f5f5f5;">
                            <i class="{{ $item->icon }}" style="font-size: 1.4rem;
                                                                margin-right: 10px;"></i>{{ $item->name }}
                        </li>
                    @endforeach
                </ul>
                <div class="resp-tabs-container hor_1" style="border-color: rgb(193, 193, 193);">
                    <span class="active total" style="display:block;">Touts les sous-categories du category <strong
                            style="text-transform: uppercase;">{{ $group->name }}</strong> </span>
                    @foreach ($category as $key => $item)
                        <div class="resp-tab-content hor_1" aria-labelledby="hor_1_tab_item-{{ $key }}"
                            style="border-color: rgb(193, 193, 193);">
                            <div class="category">
                                <div class="category-img">
                                    <i class="{{ $item->icon }}"></i>
                                </div>
                                <div class="category-info">
                                    <h4>{{ $item->name }}</h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            @if (sizeof($item->type) >= 1)
                                <div class="category"
                                    style="padding: 7px 20px;font-weight: bold;font-size: 1.4rem;font-variant: petite-caps;color: #6d6d6d;">
                                    Les sous-categories</div>
                                <div class="sub-categories">
                                    <div class="container">
                                        <div class="row">
                                            @foreach ($item->type as $count => $items)
                                                <div class="col-lg-6">
                                                    <a href="{{ route('category.ads',
                                                    ["name"=>$item->name,"products"=>$items->id]) }}" class="cardSubCategory">
                                                        <span class="nameCategory">{{ $items->name }}</span>
                                                        <div class="totalAds">
                                                            <span>{{ $items->Ads->count() }}</span>
                                                            <span>{{ $items->Ads->count() <= 1 ? 'Annonce' : 'Annonces' }}</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="category"
                                    style="padding: 24px;font-weight: bold;font-size: 1.4rem;font-variant: petite-caps;color: #6d6d6d;">
                                    <div class="col-lg-12">
                                        <a href="{{ route('category.ads.not',['name'=>$item->name,'products'=>$item->id]) }}" class="cardSubCategory" style="margin-bottom:0% !important;">
                                            <span class="nameCategory">Voir touts les annonces sur cette category</span>
                                            <div class="totalAds">
                                                <span>
                                                    @if (sizeof($item->type) < 1)
                                                        {{ $item->Ads->count() }}
                                                    @endif
                                                </span>
                                                <span>{{ $item->Ads->count() <= 1 ? 'Annonce':"Annonces" }}</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('layout.partials.include.footer')
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#parentVerticalTab').easyResponsiveTabs({
                type: 'vertical', //Types: default, vertical, accordion
                width: 'auto', //auto or any width like 600px
                fit: true, // 100% fit in a container
                closed: 'accordion', // Start closed if in accordion view
                tabidentify: 'hor_1', // The tab groups identifier
                activate: function(event) { // Callback function if tab is switched
                    var $tab = $(this);
                    var $info = $('#nested-tabInfo2');
                    var $name = $('span', $info);
                    $name.text($tab.text());
                    $info.show();
                }
            });
        });

    </script>
    <script src="{{ asset('app-assets/js/easyResponsiveTabs.js') }}" rel="preload" as="script"></script>
@endsection
