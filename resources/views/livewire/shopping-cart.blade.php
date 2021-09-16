<div id="cart" class="favorite_Ads">
    <h1>Favorite <button id="close" class="fas fa-times"></button></h1>
    <div class="allFavo">
        @forelse($data as $favorite)
        <a href="#" class="adFavorite">
            <img src="{{ asset('storage/' . $favorite['image']) }}" alt="xxx">
            <div class="detail">
                <span class="detailTitle">{{ $favorite['title'] }}</span>
                <span class="detailPrice">{{ $favorite['price'] }}</span>
            </div>
            <i class="fas fa-times"></i>
        </a>
    @empty
        <h1>No content</h1>
        @endforelse
    </div>
</div>
