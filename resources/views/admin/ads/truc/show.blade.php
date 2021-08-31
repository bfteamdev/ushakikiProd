@extends('layout.default')
@section('content')
    @section('activeTruc') active @endsection
    <div class="card card-custom col-lg-10 mx-auto  example example-compact">
        @section("titre") View {{ $truc->title }} @endsection
        @include('admin.ads.header')
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <form action="{{ route('ads.truc.update',['id'=>$truc->id]) }}" method="post">
            @csrf
            @method('patch')
            <div class="example-preview">
                <div class="card-body">

                    <div class="row">
                        
                        <div class="form-group col-lg-12">
                            <h3>Ad information</h3>
                        <hr>
                            <label for="">Client</label>
                            <select name="user_id" class="form-control select2 @error('user_id')
                                                                            is-invalid
                                            @enderror" id="kt_select2_1">
                                <option value="">Select User</option>
                                @foreach ($user as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id === $truc->user_id ? 'selected' : '' }}>
                                        {{ $item->username }}

                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <div class="invalid-feedback">
                                    {{ $errors->first('user_id') }}
                                </div>
                            @enderror
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="">Titre</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                value="{{ $truc->title }}">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="">categorie</label>
                            @if ($truc->type_id != null)
                                <select name="category_id" id="" class="form-control @error('category_id')
                                                                                                is-invalid
                                                             @enderror">
                                    <option value="">selection la categorie</option>
                                    @foreach ($group as $item)
                                        <optgroup label="{{ $item->name }}">
                                            @foreach ($item->categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}
                                                </option>
                                                @foreach ($category->type as $type)
                                                    <option value="{{ $type->id }}"
                                                        {{ $type->id === $truc->type_id ? 'selected' : '' }}>
                                                        {{ $type->name }}</option>
                                                @endforeach

                                            @endforeach
                                  @endforeach
                                    </optgroup>
                                </select>
                            @else
                                <select name="category_id" id="" class="form-control @error('category_id')
                                                                                             is-invalid
                                                         @enderror">
                                    <option value="">selection la categorie</option>
                                    @foreach ($group as $item)
                                        <optgroup label="{{ $item->name }}">
                                            @foreach ($item->categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id === $truc->category_id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                    @endforeach

                                    </optgroup>
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('category_id') }}
                                    </div>
                                @enderror
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="">Commune</label>
                            <input type="text" name="commune" class="form-control @error('commune') is-invalid @enderror"
                                value="{{ $truc->commune }}">
                            @error('commune')
                                <div class="invalid-feedback">
                                    {{ $errors->first('commune') }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="">Zone</label>
                            <input type="text" name="zone" class="form-control @error('zone') is-invalid @enderror"
                                value="{{ $truc->zone }}">
                            @error('zone')
                                <div class="invalid-feedback">
                                    {{ $errors->first('zone') }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="">Created_at</label>
                            <input type="date" name="created_at"
                                class="form-control @error('created_at') is-invalid @enderror"
                                value="{{ $truc->created_at->format('Y-m-d') }}" disabled>
                            @error('created_at')
                                <div class="invalid-feedback">
                                    {{ $errors->first('created_at') }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="">Expired_at</label>
                            <input type="date" name="expired_at"
                                class="form-control @error('expired_at') is-invalid @enderror"
                                value="{{ $truc->expired_at->format('Y-m-d') }}" disabled>
                            @error('expired_at')
                                <div class="invalid-feedback">
                                    {{ $errors->first('expired_at') }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label for="">Price</label>
                            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror"
                                value="{{ $truc->price }}" disabled>
                            @error('price')
                                <div class="invalid-feedback">
                                    {{ $errors->first('price') }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label for="">description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                id="kt_autosize_1" rows="3">{{ $truc->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label class="col-3 col-form-label">Status</label>
                            <div class="col-3">
                                <span class="switch switch-outline switch-icon switch-success">
                                    <label>
                                        <input type="hidden" name="statu" value="inactive" class="disables">
                                        <input type="checkbox" name="statu" value="active"
                                            {{ $truc->statu === 'active' ? 'checked' : '' }} class="disables">
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="separator separator-dashed my-8"></div>
                    <hr  class="my-4">
                    <h3>Features</h3>
                    <hr size=2 align=center width="100%">
                    <div class="row borderFeatures" style="border-radius: 8px 0px 0px 8px;">
                        @if (sizeof($features) === 3 )
                        @foreach ($features as $feature)

                        <div class="form-group col-lg-4">
                            <label for="">{{ $feature->field->name }}</label>
                            <input type="{{ $feature->field->type }}" name="value[{{  $feature->id }}]"
                                class="form-control @error('value') is-invalid @enderror"
                                value="{{ $feature->value }}" >
                            @error('value')
                                <div class="invalid-feedback">
                                    {{ $errors->first('value') }}
                                </div>
                            @enderror
                        </div>
                        @endforeach
                            
                        @elseif( sizeof($features) === 6 )
                              @foreach ($features as $feature)

                        <div class="form-group col-lg-4">
                            <label for="">{{ $feature->field->name }}</label>
                            <input type="{{ $feature->field->type }}" name="value[{{  $feature->id }}]"
                                class="form-control @error('value') is-invalid @enderror"
                                value="{{ $feature->value }}" >
                            @error('value')
                                <div class="invalid-feedback">
                                    {{ $errors->first('value') }}
                                </div>
                            @enderror
                        </div>
                        @endforeach
                        @else
                          @foreach ($features as $feature)
                        <div class="form-group col-lg-3">
                            <label for="">{{ $feature->field->name }}</label>
                            <input type="{{ $feature->field->type }}" name="value[{{  $feature->id }}]"
                                class="form-control @error('value') is-invalid @enderror"
                                value="{{ $feature->value }}" >
                            @error('value')
                                <div class="invalid-feedback">
                                    {{ $errors->first('value') }}
                                </div>
                            @enderror
                        </div>
                        @endforeach
                        @endif
                    </div>  
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary font-weight-bold mr-2">Update</button>
                        <a href="{{ route('ads.truc') }}" class="btn btn-dark font-weight-bold mr-2">Back</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
    <script>
        //........................Clients...................
        // Class definition
        var KTSelect2 = function() {
            // Private functions
            var demos = function() {
                // basic
                $('#kt_select2_1').select2({
                    placeholder: "Select a Client"
                });
                // loading data from array
                var data = [{
                    id: 0,
                    text: 'Enhancement'
                }, {
                    id: 1,
                    text: 'Bug'
                }, {
                    id: 2,
                    text: 'Duplicate'
                }, {
                    id: 3,
                    text: 'Invalid'
                }, {
                    id: 4,
                    text: 'Wontfix'
                }];
                // loading remote data
                function formatRepo(repo) {
                    if (repo.loading) return repo.text;
                    var markup = "<div class='select2-result-repository clearfix'>" +
                        "<div class='select2-result-repository__meta'>" +
                        "<div class='select2-result-repository__title'>" + repo.full_name + "</div>";
                    if (repo.description) {
                        markup += "<div class='select2-result-repository__description'>" + repo.description +
                            "</div>";
                    }
                    markup += "<div class='select2-result-repository__statistics'>" +
                        "<div class='select2-result-repository__forks'><i class='fa fa-flash'></i> " + repo
                        .forks_count + " Forks</div>" +
                        "<div class='select2-result-repository__stargazers'><i class='fa fa-star'></i> " + repo
                        .stargazers_count + " Stars</div>" +
                        "<div class='select2-result-repository__watchers'><i class='fa fa-eye'></i> " + repo
                        .watchers_count + " Watchers</div>" +
                        "</div>" +
                        "</div></div>";
                    return markup;
                }

                function formatRepoSelection(repo) {
                    return repo.full_name || repo.text;
                }

                $("#kt_select2_6").select2({
                    placeholder: "Search for git repositories",
                    allowClear: true,
                    ajax: {
                        url: "https://api.github.com/search/repositories",
                        dataType: 'json',
                        delay: 250,
                        data: function(params) {
                            return {
                                q: params.term, // search term
                                page: params.page
                            };
                        },
                        processResults: function(data, params) {
                            // parse the results into the format expected by Select2
                            // since we are using custom formatting functions we do not need to
                            // alter the remote JSON data, except to indicate that infinite
                            // scrolling can be used
                            params.page = params.page || 1;

                            return {
                                results: data.items,
                                pagination: {
                                    more: (params.page * 30) < data.total_count
                                }
                            };
                        },
                        cache: true
                    },
                    escapeMarkup: function(markup) {
                        return markup;
                    }, // let our custom formatter work
                    minimumInputLength: 1,
                    templateResult: formatRepo, // omitted for brevity, see the source of this page
                    templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
                });

                // custom styles
            }
            var modalDemos = function() {
                $('#kt_select2_modal').on('shown.bs.modal', function() {
                    // basic
                    $('#kt_select2_1_modal').select2({
                        placeholder: "Select a client"
                    });

                });
            }
            // Public functions
            return {
                init: function() {
                    demos();
                    modalDemos();
                }
            };
        }();

        // Initialization
        jQuery(document).ready(function() {
            KTSelect2.init();
        });
        var KTAutosize = function() {

            // Private functions
            var demos = function() {
                // basic demo
                var demo1 = $('#kt_autosize_1');
                var demo2 = $('#kt_autosize_2');

                autosize(demo1);

                autosize(demo2);
                autosize.update(demo2);
            }
            return {
                // public functions
                init: function() {
                    demos();
                }
            };
        }();
        jQuery(document).ready(function() {
            KTAutosize.init();
        });
    </script>
@endsection
