@extends('layout.app')

@section('content')
    <div class="container my-3">
        <div class="container choiseCategory px-0">
            <h2>Detail du commande a poste</h2>
        </div>
        <div class="container postCard">
            <div class="row choiseCategory col-lg-6 mx-auto">
                <div class="col-lg-12">
                    <table class="table">
                        <tbody class="border-left border-right border-top" >
                            <tr align="center">
                                <th class="border-top" colspan="2">Detaile sur la commande a paye</th>
                            </tr>
                            <tr>
                                <th class="border-right">Nom & Prenom</th>
                                <td  align="center">{{ session()->get('adsInfo')['user_id']['nom'] . ' ' . session()->get('adsInfo')['user_id']['prenom'] }}
                                </td>
                            </tr>
                            <tr>
                                <th class="border-right">Category</th>
                                <td align="center">
                                    @if (session()->get('adsInfo')['category'])
                                        {{ session()->get('adsInfo')['category']->name }}
                                    @else
                                        {{ session()->get('adsInfo')['type']->name }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="border-right">Title</th>
                                <td align="center">{{ session()->get('adsInfo')['title'] }}</td>
                            </tr>
                            <tr>
                                <th class="border-right">Commune</th>
                                <td align="center">{{ session()->get('adsInfo')['commune'] }}</td>
                            </tr>
                            <tr>
                                <th class="border-right">Zone</th>
                                <td align="center">{{ session()->get('adsInfo')['zone'] }}</td>
                            </tr>
                            <tr>
                                <th class="border-right">Debut</th>
                                <td align="center">{{ session()->get('adsInfo')['startDate'] }}</td>

                            </tr>
                            <tr>
                                <th class="border-right">Fin</th>
                                <td align="center">{{ session()->get('adsInfo')['endDate'] }}</td>

                            </tr>
                            <tr>
                                <th class="border-right">Total a paye</th>
                                <td align="center" class="">{{ session()->get('adsInfo')['amount'] }} Fbu</td>
                            </tr>
                            <tr align="center">
                                <th class="border-top" colspan="2">Le paiment se fait avec AFRIPAY OU ECOCASH clique sur le button au desous</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-12">
                    <form action="https://afripay.africa/checkout/index.php" class="col-lg-12" method="post" id="afripayform">
                        <input type="hidden" name="amount" value="{{ session()->get('adsInfo')['amount'] }}">
                        <input type="hidden" name="currency" value="BIF">
                        <input type="hidden" name="comment" value="Order 122">
                        <input type="hidden" name="client_token" value="{{ session()->get('adsInfo')['client_token_encode'] }}">
                        <input type="hidden" name="return_url" value="{{ session()->get('adsInfo')['return_url'] }}">
                        <input type="hidden" name="firstname" value="{{ session()->get('adsInfo')['user_id']['nom'] }}">
                        <input type="hidden" name="lastname" value="{{ session()->get('adsInfo')['user_id']['prenom'] }}">
                        <input type="hidden" name="street" value="">
                        <input type="hidden" name="city" value="">
                        <input type="hidden" name="state" value="">
                        <input type="hidden" name="zip_code" value="">
                        <input type="hidden" name="country" value="">
                        <input type="hidden" name="email" value="">
                        <input type="hidden" name="phone" value="">
                        <input type="hidden" name="app_id" value="f34f048013f2119350a1eaad60b684c7">
                        <input type="hidden" name="app_secret" value="JDJ5JDEwJHJhWS92">
                        <p class=" text-center">
                            <input type="image" src="https://afripay.africa/logos/pay_with_afripay.png"
                                alt="Pay with AfriPay" onclick="document.afripayform.submit();">
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"
        rel="preload" as="script">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"
        rel="preload" as="script">
    </script>
@endsection
@section('footer')
    @include('layout.partials.include.footer')
@endsection

@section('script')

@endsection
