<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="{{asset("img/icon.png")}}" sizes="16x16">
    <link rel="stylesheet" href="{{asset("css/facture.css")}}">
    <title>Receipt</title>
</head>
<body>
    <div class="facture mt-4 mb-4">
        <div id="data" class="d-flex flex-column justify-content-center align-items-center">
            <div class="facture_head">
                <p>FACTURE</p>
            </div>
            <div class="name">
                <h2>PMIC</h2>
                <span>PMIC BUSSINESS S.A </span>
            </div>
            <ul>
                <li>Commerce General</li>
                <li>KIGOBE Avenue Mudwedwe</li>
                <li>BP 1523 Bujumbura-Burundi </li>
                <li>NIF 4738358954906 </li>
                <li>Telephone: 22 84 89 54 </li>
            </ul>
            <div class="facture_identifier">
                <p class="identifier">
                    <span id="bold">Date :</span>
                    <span>{{date('l d F Y')}}</span>
                </p>
                <p class="identifier">
                    <span id="bold">Client :</span>
                    @if($id->ClientId)
                    <span>{{$id->clients->nomClient}}&nbsp;{{$id->clients->prenomClient}}</span>
                    @else
                    <span>Client</span>
                    @endif
                </p>
                <p class="identifier">
                    <span id="bold">Assujeti TVA :</span>
                    <span>Oui</span>
                </p>

                <p class="identifier">
                    <span id="bold">Residant a:</span>
                </p>
                <p class="identifier">
                    <span id="bold">Payment :</span>
                    <span >{{$id->paymethod}}</span>
                </p>
            </div>
            <div class="items">
                <table>
                    <thead>
                        <th>ITEMS</th>
                        <th>QTY</th>
                        <th>PU HTVA</th>
                        <th>PT HTVA</th>
                    </thead>
                    <tbody>
                        <tr style="text-align:center">
                            <td>{{$id->produits->nomProduit}}</td>
                            <td>{{$id->qty }}</td>
                            <td>{{$id->montantUnit}}</td>
                            <td>{{$id->montantUnit*$id->qty}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>

                            </td>
                            <td>
                                <table>
                                    <thead>
                                        <th>PT TVAC</th>
                                    </thead>
                                    <tbody>
                                        <tr style="text-align:center">
                                            <td>{{$id->montantUnit*$id->qty}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="total">
                <p class="d-flex justify-content-around">
                    <span id="bold">TOTAL GENERAL </span>
                    <span class="text text-success" style="font-size:1.4em"><b>{{$id->montantUnit*$id->qty}}FBU</b></span>
                </p>

            </div>
            <div class="thanks">
                <b>MERCI / THANK YOU </b>
                <p>SVP Verifier les marchandises  avant de quitter le magasin , Les marchandises vendues ne sont ni remises ni echangees</p>
            </div>
            <div class="footer">
                <span>9/3/2020</span>
                <span>{{Auth::user()->name}}</span>
                <span>
                    {{date_default_timezone_set('Africa/Bujumbura') ? date('h:m:s A') : "" }}
                </span>
            </div>
        </div>
        <div class="print d-flex justify-content-around mt-2">
            <button class="btn btn-success col-md-3 p-2" onclick="printDiv('data')">Print</button>
            <a  href="{{route('stocks')}}" class="btn btn-primary col-md-3 p-2">Go back</a>
        </div>
    </div>
    <script>
        function printDiv(el) {
            var divContents = document.getElementById(el).innerHTML;
            var a = window.open('', '', 'height=auto, width=30vw');
            a.document.write('<html>');
            a.document.write('<head>');
            a.document.write('<link rel="stylesheet" href="{{asset("css/facture.css")}}"/>');
            a.document.write('</head>');
            a.document.write('<body>');
            a.document.write(divContents);
            a.document.write('</body>');
            a.document.close();
            a.print();
        }
        console.log("recu")
    </script>
</body>

</html>


