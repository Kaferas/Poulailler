<div>
    <div class="container">
        <div class="form-group jumbotron p-1 container d-flex justify-content-center">
            <div class="col-md-2">
                <label for="">Type: </label>
            <select name="" id="" class="form-control" wire:model="table">
                <option value="clients">Clients</option>
                <option value="produits">Produits</option>
                <option value="depenses">Depenses</option>
                <option value="ventes">Ventes</option>
                <option value="categories">Categories</option>
            </select>
            </div>
            @if ($table == "ventes")
            <div class="col-md-3">
                <label for="">Achete par:</label>
                    <select name="" id="" class="form-control" wire:model="client">
                        <option value=""></option>
                        @foreach ($clients as $cli)
                        <option value="{{$cli->id}}">{{$cli->nomClient}}&nbsp;{{$cli->prenomClient}}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            @if ( $table == "ventes" || $table == "depenses")
                <div class="col-md-6 row">
                    <div class="form-group">
                        <label for="">Du</label>
                        <input type="date" name="" id="" class="form-control" value="{{ date('d/m/Y') }}" wire:model="du">
                    </div>
                    <div class="form-group">
                        <label for="">Au</label>
                        <input type="date" name="" id="" class="form-control" value="{{ date('d/m/Y') }}" wire:model="au">
                    </div>
                </div>
            @endif
            {{-- @if ($table == "ventes")
            <div class="col-md-2">
                <label for="">Etat:</label>
                    <select name="" id="" class="form-control" wire:model="etat">
                        <option value="Chris">Vendu</option>
                        <option value="Jean">Fabrication</option>
                    </select>
                </div>
            @endif --}}
        </div>
        <button class="btn btn-success p-1 d-flex justify-content-end" onclick="printDiv('doc')">🖨 Print</button>

        @if (isset($data))
        @if ($table == "clients")
        <div id="doc">
            {{-- {{$data}} --}}
                <table class="table" >
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">Adresse</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $one)
                        <tr class="text-center">
                            <th scope="row">{{$loop->index+1}}</th>
                            <td>{{$one->nomClient}}</td>
                            <td>{{$one->prenomClient}}</td>
                            <td>{{$one->telClient}}</td>
                            <td>{{$one->adressClient}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
                @elseif ($table == "produits")
                <div id="doc">

                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">CodeProduit</th>
                                <th scope="col">NomProduit</th>
                    <th scope="col">PrixUnitaire</th>
                    <th scope="col">Categorie</th>
                    <th scope="col">Quantite</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $produit)
                    <tr class="text-center">
                        <th scope="row">{{$produit->codeProduit}}</th>
                        <td>{{$produit->nomProduit}}</td>
                        <td>{{$produit->prixUnitaire}}</td>
                        <td>{{$produit->catId}}</td>
                        <td>{{$produit->Quantite}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            @elseif($table == "depenses")
            <div id="doc">

                <table class="table" id="doc">
                    <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Libelle</th>
                        <th scope="col">Type</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $depense)
                    <tr class="text-center">
                        <td>{{$loop->index+1}}</td>
                        <td>{{$depense->nomDepense}}</td>
                        <td>{{$depense->etat}}</td>
                        <td>{{date("Y-m-d",strtotime($depense->created_at))}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            @elseif($table == "ventes")
            <div id="doc">

                <table class="table" id="doc">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            {{-- <th scope="col">Produit</th> --}}
                            <th scope="col">prixUnitaire</th>
                    <th scope="col">Quantite</th>
                    <th scope="col">Total</th>
                    <th scope="col">Rabais</th>
                    <th scope="col">Client</th>
                    {{-- <th scope="col">Date</th> --}}
                </tr>
                </thead>
                <tbody>
                  @foreach ($data as $vente)
                  <tr class="text-center">
                      <th scope="row">{{$loop->index+1}}</th>
                      {{-- <th scope="row">{{$vente->produits->nomProduit}}</th> --}}
                      <td>{{$vente->montantUnit}}</td>
                      <td>{{$vente->qty}}</td>
                      <td>{{$vente->totalAmount}}</td>
                      <td>{{$vente->rabais}}</td>
                      {{-- <td>{{$vente->clients->nomClient}}{{$vente->clients->prenomClient}}</td> --}}
                      <td>{{date("Y-m-d",strtotime($vente->created_at))}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            @else
            <div id="doc">

                <table class="table" id="doc">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                    <th scope="col">NomCategorie</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $cate)
                  <tr class="text-center">
                    <th scope="row">{{$loop->index+1}}</th>
                    <th scope="row">{{$cate->nameCat}}</th>
                  </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
            @endif
            @endif
        </div>
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
        a.document.write('<body class="text-center">');
        a.document.write(divContents);
        a.document.write('</body>');
        a.document.close();
        a.print();
    }
    console.log("recu")
</script>
