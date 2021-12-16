<div>
    @if($idClient)
    {{-- {{dd($details)}} --}}
    <h4 class="mt-3">Client : <span class="text text-primary">{{$acheteur->nomClient}}&nbsp{{$acheteur->prenomClient}}</span></h4>
    @foreach ($details as $one)
    <h3 class="text-center mt-3 ">Achats du : <span class="text text-primary">{{date('d/m/Y  h:m:s',strtotime($one->created_at))}} </span></h3>
        <table class="table">
            <thead>
              <tr class="text-center">
                <th scope="col">Produit</th>
                <th scope="col">Prixunitaire</th>
                <th scope="col">Quantite</th>
                <th scope="col">Rabais</th>
              </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                <th scope="row">{{$one->produit->nomProduit}}</th>
                <td>{{$one['montantUnit']}}</td>
                <td>{{$one['qty']}}</td>
                <td>{{$one['rabais']}}</td>
              </tr>
            </tbody>
          </table>
        @endforeach
        
        <h1 class="text text-success text-center m-4"><span>Total:  {{$details->sum('totalAmount')}} FBU</span></h1>
    @endif
</div>
