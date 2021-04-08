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
                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Category name "
                    name="name" value="{{ old('name') ?? $category->name }}">
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
                        <div class="modal fade" id="exampleModalCustomScrollable" tabindex="-1" role="dialog"
                            aria-labelledby="staticBackdrop" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" style="max-width: 1324px" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Icons list</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
