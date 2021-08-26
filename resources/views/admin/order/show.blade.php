@extends('layout.default')
@section('content')
    <div class="card">
        @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
        <form action="{{ route("order.update",['order'=>$order->id]) }}" method="post">
            @method("patch")
            @csrf
            <div class="card-header d-flex px-4 py-3 mt-3">
                <!--begin::Dropdown Menu-->
                <div class="mr-auto p-2">
                    <h3>Detaile du commande</h3>
                </div>
                <div class="form p-2 ">

                    <div class="form-group ">
                        <select name="status" class="form-control ">
                            <option value="">change status</option>
                            <option value="pending" {{ $order->status === "pending" ? "selected" : "" }}>pending</option>
                            <option value="unpaid" {{ $order->status === "unpaid" ? "selected" : "" }}>unpaid</option>
                            <option value="paid" {{ $order->status === "paid" ? "selected" : "" }}>paid</option>
                        </select>
                    </div>
                </div>
                <div class="form-group p-2">
                    <input type="submit" class="btn btn-primary" value="change status">
                </div>
                <!--end::Dropdown Menu-->
            </div>
        </form>
        <div class="card-body">
            <table class="table">
                <tbody class="border-left border-right border-top">
                    <tr>
                        <th class="border-right">orderReference</th>
                        <td> {{ $order->orderReference }} </td>
                    </tr>
                    <tr>
                        <th class="border-right">Nom & Prenom</th>
                        <td> {{ $order->user->firstName }} {{ $order->user->lastName }} </td>
                    </tr>
                    <tr>
                        <th class="border-right">Category</th>
                        <td>
                            @if ($order->annonce->category_id != null)
                                {{ $order->annonce->category->name }}
                                @else
                            {{ $order->annonce->type->name }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="border-right">Title</th>
                        <td>{{ $order->annonce->title }}</td>
                    </tr>
                    <tr>
                        <th class="border-right">Commune</th>
                        <td>{{ $order->annonce->commune }}</td>
                    </tr>
                    <tr>
                        <th class="border-right">Zone</th>
                        <td>{{ $order->annonce->zone }}</td>
                    </tr>
                    <tr>
                        <th class="border-right">Debut</th>
                        <td>{{ $order->annonce->created_at }}</td>

                    </tr>
                    <tr>
                        <th class="border-right">Fin</th>
                        <td>{{ $order->annonce->expired_at }}</td>

                    </tr>
                    <tr>
                        <th class="border-right">Price</th>
                        <td class="">{{ $order->annonce->price }} Fbu</td>
                    </tr>
                </tbody>
            </table>
            <div class="col-lg-3 mt-3">
                <a href="{{ route('order.index') }}" class="btn btn-dark font-weight-bold">Back</a>
            </div>
        </div>
    </div>

@endsection
