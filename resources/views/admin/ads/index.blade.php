@extends('layout.default')
@section('content')
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Ads list
                    <div class="text-muted pt-2 font-size-sm">Annonce</div>
                </h3>
            </div>
            {{-- <div class="card-toolbar">
                <a href="{{ route('ads.create') }}" class="btn btn-primary font-weight-bolder">Create a ads </a>
            </div> --}}
        </div>
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success') }}
                </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Client</th>
                        <th scope="col">Category</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="d-flex">
                            <a href="" class="btn btn-primary" style="padding: 8px 10px;">
                                <i class="flaticon-eye p-0"></i></i>
                            </a>
                            <form action="" method="post"
                                style="display: inline-block;">
                                @method("delete")
                                @csrf
                                <button type="submit" class="btn btn-danger" style="padding: 8px 10px;" onclick="return(confirm('do you want to delete this ad?'))">
                                    <i class="flaticon2-trash p-0"></i>
                                </button>
                            </form>
                        </td>


                    </tr>
                </tbody>
            </table>
        </div>    
@endsection
