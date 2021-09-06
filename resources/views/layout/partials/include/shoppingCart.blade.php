<div id="cart" class="favorite_Ads">
    <h1>Favorite <button id="close" class="fas fa-times"></button></h1>
    <div class="allFavo">
        @for ($i = 0; $i < 100; $i++)
            <a href="#" class="adFavorite">
                <img src="http://localhost:8000/storage/AdsImages/1/DOucnjqBa4xTLwVu9bAll725aUFJXHHP2A1UZCsF.jpg"
                    alt="xxx">
                <div class="detail">
                    <span class="detailTitle">Title</span>
                    <span class="detailPrice">200</span>
                </div>
                <i class="fas fa-times"></i>
            </a>
        @endfor
    </div>
</div>
