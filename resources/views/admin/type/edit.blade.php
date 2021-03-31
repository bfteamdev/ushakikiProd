@extends('layout.default')
@section('content')
    <div class="card card-custom col-lg-7 mx-auto">
        <div class="card-header">
            <div class="row">
                <h3 class="card-title">
                    Modifier le sous-categorie : <b>{{ $type->name }}</b>
                </h3>
            </div>
        </div>
        <!--begin::Form-->
        <form class="form" method="POST" action="{{ route('sub-category.update', ['sub_category' => $type->id]) }}">
            @csrf
            @method("patch")
            <div class="card-body">
                @if (session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <div class="mb">
                    {{-- <h3 class="font-size-lg text-dark-75 font-weight-bold mb-10"></h3> --}}
                    <div class="mb-4 row">
                        <div class="form-group col-lg-12">
                            <label for="exampleSelect1">Categories <span class="text-danger">*</span></label>
                            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                <option value="">select category</option>
                                @foreach ($category as $item)
                                    @if (old('category_id'))
                                        <option value="{{ $item->id }}"
                                            {{ $item->id === (int) old('category_id') ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @else
                                        <option value="{{ $item->id }}"
                                            {{ $item->id === $type->category_id ? 'selected' : '' }}>{{ $item->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $errors->first('category_id') }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Nom <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Nom du type " name="name" value="{{ old('name') ?? $type->name }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <label>sub-category parent <span class="text-danger">*</span></label>
                            <select class="form-control @error('parent_id') is-invalid @enderror" name="parent_id">
                                <option value="">select parent</option>
                                @foreach ($parent as $items)
                                    @if (old('parent_id'))
                                        <option value="{{ $items->id }}" {{ $items->id === (int) old('parent_id') ? 'selected' : '' }}>{{ $items->name }}
                                        </option>
                                    @else
                                    <option value="{{ $items->id }}" {{ $items->id === $type->parent_id ? 'selected' : '' }}>{{ $items->name }}
                                    </option>
                                    @endif
                                @endforeach
                            </select>
                            @error('parent_id')
                                <div class="invalid-feedback">{{ $errors->first('parent_id') }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-6">
                        <a href="{{ route('sub-category.index') }}" class="btn btn-light-dark"><i
                                class="flaticon2-left-arrow-1"></i>Back</a>
                    </div>
                    <div class="col-lg-6 text-right">
                        <button type="submit" class="btn font-weight-bold btn-primary mr-2 col-3">Submit</button>
                    </div>
                </div>
            </div>
        </form>
        <!--end::Form-->
    </div>
@endsection
