@extends('layout.default')
@section('content')
<div class="col-lg-10 mx-auto">


    <div class="card">
        <div class="card-header">
            <h2>Edit Announce</h2>
        </div>
        <form action="">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="title">Title</label>
                        <input type="text" name="title"  class="form-control"  value="{{ old('title') }}">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="category">Category</label>
                        <select name="category" id="" class="form-control">
                            <option value="">category</option>
                        </select>
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="client">Client</label>
                        <input type="text" name="client" class="form-control" value="{{ old('client') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="sartDate">sartDate</label>
                        <input type="text" name="startDate"  class="form-control"  value="{{ old('startDate') }}">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="endDate">endDate</label>

                        <input type="text" name="endDate"  class="form-control"  value="{{ old('endDate') }}">

                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="status">Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="">pending announced</option>
                            <option value="">announced</option>
                            <option value="">Expired</option>
                            <option value="">pending delete</option>
                            <option value="">delete</option>


                        </select>
                    
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="price">Price</label>

                        <input type="text" name="price"  class="form-control"  value="{{ old('price') }}">

                    </div>

                </div>
                
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-6">
                        <a href="{{ route('ads.index') }}" class="btn btn-light-dark"><i
                                class="flaticon2-left-arrow-1"></i>Back</a>
                    </div>
                    <div class="col-lg-6 text-right">
                        <button type="submit" class="btn font-weight-bold btn-primary mr-2 col-3">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection