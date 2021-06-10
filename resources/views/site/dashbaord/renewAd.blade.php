@extends('layout.app')
@section('adsActive') active @endsection
@section('renew') active @endsection
@section('style')
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" rel="preload" as="style">
@endsection
@section('content')
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        @if (session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{ session()->has('error') }}
            </div>
        @endif
        <div class="d-flex flex-row my-5">
            @include('site.dashbaord.sidebar')
            <div class="flex-row-fluid col-lg-12">
                <div class="card card-custom">
                    <div class="card-header py-3">
                        @include('site.dashbaord.header')<br>
                        {{-- <h2 class=" text-center">Edit Ad</h2> --}}
                    </div>
                    <form action="" method="post">
                        @csrf
                        @method('patch')
                        
                        <div class="card-body">
                           
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="">Title</label>
                                    <input type="text"  name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $add->title }}" disabled>
                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{ $errors->first('title') }}
                                        </div>
                                    @enderror
                                </div>
                           
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="h2Step">Delai de voitre annonce</label>
                                    <div class="row mb-4"
                                        style="display: flex;height: 100%;justify-content: center;align-items: center">
                                        <div class="col-12">
                                            <div class="border py-4">
                                                <div
                                                    style="display: flex;height: 100%;justify-content: space-evenly;align-items: center;">
                                                    <div class="mb-0">
                                                        <input class="form-check-input" type="radio"
                                                            name="expired_at" id="exampleRadios1" value="7" checked>
                                                        <label class="form-check-label ml-3" for="exampleRadios1">
                                                            7 Jours
                                                        </label>
                                                    </div>
                                                    <div class="mb-0">
                                                        <input class="form-check-input" type="radio"
                                                            name="expired_at" id="exampleRadios2" value="15">
                                                        <label class="form-check-label ml-3" for="exampleRadios2">
                                                            15 Jours
                                                        </label>
                                                    </div>
                                                    <div class="mb-0">
                                                        <input class="form-check-input" type="radio"
                                                            name="expired_at" id="exampleRadios3" value="30">
                                                        <label class="form-check-label ml-3" for="exampleRadios3">
                                                            30 Jours
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                            @if ($add->category->groupe->name === "immobiliers" || $add->category->groupe->name ==="voiture" || $add->category->groupe->name ==="service")
                            <form action="https://afripay.africa/checkout/index.php" method="post" id="afripayform">
                                <input type="hidden" name="amount" value="200" >
                                <input type="hidden" name="currency" value="BIF" >
                                <input type="hidden" name="comment" value="Order 122">
                                <input type="hidden" name="client_token" value="" >
                                <input type="hidden" name="return_url" value="" >
                                <input type="hidden" name="firstname" value="" >
                                <input type="hidden" name="lastname" value="" >                                
                                <input type="hidden" name="street" value="" >
                                <input type="hidden" name="city" value="" >
                                <input type="hidden" name="state" value="" >
                                <input type="hidden" name="zip_code" value="" >
                                <input type="hidden" name="country" value="" >
                                <input type="hidden" name="email" value="" >
                                <input type="hidden" name="phone" value="" >
                                <input type="hidden" name="app_id" value="f34f048013f2119350a1eaad60b684c7">
                                <input type="hidden" name="app_secret" value="JDJ5JDEwJHJhWS92">
                                <div class="mt-4">
                                <input type="image" src="https://afripay.africa/logos/pay_with_afripay.png" alt="Pay with AfriPay" onclick="document.afripayform.submit();">
                                </div>
                                </form>
                            @endif                       
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('dashboard.ads') }}" class="btn btn-light-dark font-weight-bold mr-2">Back</a>
                            <button type="submit" class="btn btn-light-primary font-weight-bold mr-2">Renew</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript">
        function readURL(input) {
            debugger
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.blah').each(function() {
                        $(this).attr('src', e.target.result);
                    });
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }
        // debugger
        let imgs = document.querySelectorAll(".file");
        // $(".image").change(function() {
        //     debugger
        //     readURL(this);
        // });
        imgs.forEach((item) => {
            item.addEventListener("change", function(e) {
                debugger
                readURL(this);
            })
        })

    </script>
@endsection
