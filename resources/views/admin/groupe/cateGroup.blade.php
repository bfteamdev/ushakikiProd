<div class="example-preview">
    <div class="row">
        <div class="col-4">
            <ul class="nav flex-column nav-pills">
                {{-- {{ dd() }} --}}
                @foreach ($item->categories as $category)
                    <li class="nav-item mb-2">
                        <a class="nav-link {{ $item->categories[0]->id === $category->id ? 'active' : '' }}"
                            id="home-tab-{{ $category->id }}" data-toggle="tab" href="#home-{{ $category->id }}">
                            <span class="nav-icon"><i class="flaticon2-chat-1"></i></span>
                            <span class="nav-text">{{ $category->name }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-8 border-1">
            <div class="tab-content" id="myTabContent5">
                @foreach ($categories as $catgry)
                    <div class="tab-pane fade {{ $categories[0]->id === $catgry->id ? 'show active' : '' }}"
                        id="home-{{ $catgry->id }}" role="tabpanel" aria-labelledby="home-tab-{{ $catgry->id }}">
                        <div class="d-flex align-items-end">
                            <h2 class="text-muted text-uppercase">Sub-category of : &nbsp;</h2>
                            <h4><b>{{ $catgry->name }}</b></h4>
                        </div>
                        <ul class="list-group">
                            @foreach ($catgry->type as $subCat)
                                <li class="list-group-item"> {{ $subCat->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
