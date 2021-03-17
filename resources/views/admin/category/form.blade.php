<div class="card-body">
    @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session()->get('error') }}
        </div>
    @endif
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="example-preview">
        <!-- Tab link -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#categorie">
                    <span class="nav-icon"><i class="flaticon2-chat-1"></i></span>
                    <span class="nav-text">{{ $category->name ? 'Update category' : 'Create a category' }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#caracteristique" aria-controls="profile">
                    <span class="nav-icon"><i class="flaticon2-layers-1"></i></span>
                    <span
                        class="nav-text">{{ !empty($category->features[0]) ? 'Update the feature' : 'Add features' }}</span>
                </a>
            </li>
        </ul>
        <!-- ENd Tab link -->
        <div class="tab-content mt-5" id="myTabContent">
            <!-- Tab 1 -->
            <div class="tab-pane fade show active" id="categorie" role="tabpanel" aria-labelledby="home-tab">
                <div class="mb">
                    <div class="mb-4 row">
                        <div class="form-group col-lg-6">
                            <label for="exampleSelect1">Groupe <span class="text-danger">*</span></label>
                            <select class="form-control @error('groupe_id') is-invalid @enderror" name="groupe_id">
                                <option value="">select the group</option>
                                @foreach ($groupe as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id === $category->groupe_id ? 'selected' : '' }}>{{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('groupe_id')
                                <div class="invalid-feedback">{{ $errors->first('groupe_id') }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Category name " name="name" value="{{ old('name') ?? $category->name }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-12 ">
                            <label>Icon <span class="text-danger">*</span></label>
                            <div class="row">
                                <div class="col-lg-2">
                                    <button type="button" class="btn btn-success w-100" data-toggle="modal"
                                        data-target="#exampleModalCustomScrollable">
                                        Icons
                                    </button>
                                    <div class="modal fade" id="exampleModalCustomScrollable" tabindex="-1"
                                        role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" style="max-width: 1324px"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Icons lists</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <i aria-hidden="true" class="ki ki-close"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div data-scroll="true" data-height="738">
                                                        @include('admin.icons.icons')
                                                        <div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-primary font-weight-bold"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="text" class="form-control col-lg-10 @error('icon') is-invalid @enderror"
                                    placeholder="Icon " name="icon" value="{{ old('icon') ?? $category->icon }}">
                                @error('icon')
                                    <div class="invalid-feedback">{{ $errors->first('icon') }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-lg-12 ">
                        <label>Price <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror"
                            placeholder="Category price" name="price" value="{{ old('price') ?? $category->price }}"
                            min="0">
                        @error('price')
                            <div class="invalid-feedback">{{ $errors->first('price') }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <!----------------- ENd Tab 1 ------------------------>
            @if (!empty($category->features[0]))
                <!-- Tab 2 -->
                <div class="tab-pane fade" id="caracteristique" role="tabpanel" aria-labelledby="profile-tab">
                    <div id="kt_repeater_1">
                        <div class="form-group row" id="kt_repeater_1" style="margin-bottom: 10px;">
                            <div data-repeater-list="features" class="col-lg-12">
                                @foreach ($category->features as $item)
                                    <div data-repeater-item class="form-group row align-items-center"
                                        style="margin-bottom: 10px;">
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control" placeholder="Feature name"
                                                name="name" value="{{ old('name') ?? $item->name }}" />
                                            <div class="d-md-none mb-2"></div>
                                        </div>
                                        <div class="col-lg-4">
                                            <select class="form-control" name="type">
                                                <option value="">Type</option>
                                                <optgroup label="Selection le type d'info">
                                                    <option value="text"
                                                        {{ $item->type === 'text' ? 'selected' : '' }}>Text</option>
                                                    <option value="check"
                                                        {{ $item->type === 'check' ? 'selected' : '' }}>Check
                                                    </option>
                                                    <option value="number"
                                                        {{ $item->type === 'number' ? 'selected' : '' }}>Number
                                                    </option>
                                                    <option value="file"
                                                        {{ $item->type === 'file' ? 'selected' : '' }}>File</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            @else
                <!-- Tab 2 -->
                <div class="tab-pane fade" id="caracteristique" role="tabpanel" aria-labelledby="profile-tab">
                    <div id="kt_repeater_1">
                        <div class="form-group row" id="kt_repeater_1" style="margin-bottom: 10px;">
                            <div data-repeater-list="features" class="col-lg-12">
                                <div data-repeater-item class="form-group row align-items-center"
                                    style="margin-bottom: 10px;">
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" placeholder="Feature name" name="name"
                                            value="{{ old('name') }}" />
                                        <div class="d-md-none mb-2"></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <select class="form-control" name="type">
                                            <option value="">Type</option>
                                            <optgroup label="Selection le type d'info">
                                                <option value="text">Text</option>
                                                <option value="check">Check</option>
                                                <option value="number">Number</option>
                                                <option value="file">File</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <a href="javascript:;" data-repeater-delete=""
                                            class="btn btn-sm font-weight-bolder btn-light-danger">
                                            <i class="la la-trash-o"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <a href="javascript:;" data-repeater-create=""
                                    class="btn btn-sm font-weight-bolder btn-light-primary">
                                    <i class="la la-plus"></i>Add
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!------------------ ENd Tab 2 ------------------------>
        </div>
    </div>
</div>
@section('scripts')
    <script>
        // Class definition
        var KTFormRepeater = function() {

            // Private functions
            var demo1 = function() {
                $('#kt_repeater_1').repeater({
                    initEmpty: false,

                    defaultValues: {
                        'text-input': 'foo'
                    },

                    show: function() {
                        $(this).slideDown();
                    },

                    hide: function(deleteElement) {
                        $(this).slideUp(deleteElement);
                    }
                });
            }

            return {
                // public functions
                init: function() {
                    demo1();
                }
            };
        }();

        jQuery(document).ready(function() {
            KTFormRepeater.init();
        });

    </script>
@endsection
