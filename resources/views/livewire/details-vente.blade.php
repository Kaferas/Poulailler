<div>
    @if($idClient)
    {{-- {{dd($details)}} --}}
   <div class="d-flex justify-content-between align-items-center">
    <h2 class="mt-3">Client : <span class="text text-primary">{{$acheteur->nomClient}}&nbsp{{$acheteur->prenomClient}}</span></h2>
    @if ($acheteur->etat == 0)
    <button class="btn btn-success p-1" wire:click.prevent="activer({{$idClient}})">Activer</button>
    @endif
   </div>
   <table class="table">
    <thead>
      <tr class="text-center bg-dark text-light">
          <th scope="col">Date</th>
        <th scope="col">Produit</th>
        <th scope="col">Prixunitaire</th>
        <th scope="col">Quantite</th>
        <th scope="col">Rabais</th>
      </tr>
    </thead>
    {{-- <h5 class="text-center mt-3 ">Achats du : <span class="text text-primary">{{date('d/m/Y  h:m:s',strtotime($one->created_at))}} </span></h5> --}}

    <tbody>
                @foreach ($details as $one)
                <tr class="text-center">
                    <td>{{date("Y-m-d",strtotime($one['created_at']))}}</td>
                <td scope="row">{{$one->produits->nomProduit}}</td>
                <td>{{$one['montantUnit']}} FBU</td>
                <td>{{$one['qty']}}</td>
                <td>{{$one['rabais']}} %</td>
              </tr>
              @endforeach
            </tbody>
          </table>

        <h1 class="text text-success text-center m-4"><span>Total:  {{$details->sum('totalAmount')}} FBU</span></h1>
    @endif
</div>
