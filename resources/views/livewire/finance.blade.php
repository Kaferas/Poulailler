<div>
    <div class="d-flex justify-center align-items-center bg-dark col-md-4 list-unstyled p-1">
        <li><a href="" wire:model="vente" class="col-5 text-white" wire:click.prevent="changeVente">Restants</a></li>
        <li><a href="" wire:model="operation" class="col-5 text-white" wire:click.prevent="changeOperation">Operation</a></li>
    </div>
        @if ($operation)
            <div class="row col-md-12">
                @livewire("operation")
               @if ($depenseForm)
                @livewire("depense")
               @endif
            </div>
        @endif

        @if ($vente)
            <div class=" d-inline-flex justify-center mt-3 h-50  col-md-12">
                <div class="col-md-4 h-50">
                    <div class="col-md-12 h-50 d-flex justify-content-around align-items-end ">
                        <span class="text text-dark">Montant Produit</span>
                    </div>
                    <div class="col-md-12 h-50 d-flex justify-content-around align-items-betweens text-light bg-success">
                        <h3>{{$total}} FBU</h3>
                    </div>
                </div>
                <div class="col-md-4 h-50">
                    <div class="col-md-12 h-25 d-flex justify-content-center align-items-end ">
                        <span class="text text-dark">Depenses </span>
                    </div>
                    <div class="col-md-12 h-50 d-flex justify-content-center align-items-end text-light bg-danger">
                        <h3>{{$totalDep}} FBU</h3>
                    </div>
                </div>
                <div class="col-md-4 h-50">
                    <div class="col-md-12 h-25 d-flex justify-content-center align-items-end ">
                        <span class="text text-dark">Montant Fabrications </span>
                    </div>
                    <div class="col-md-12 h-50 d-flex justify-content-center align-items-end text-light bg-warning">
                        <h3>0 FBU</h3>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <h3 class="text-center">Produits restants</h3>
                <table class="table table-striped">
                    <thead class="text-center">
                      <tr>
                        <th scope="col">Nom Produit</th>
                        <th scope="col">Prix Unitaire</th>
                        <th scope="col">Quantite</th>
                        <th scope="col">Categorie</th>
                        <th scope="col">Fournisseur</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                     @foreach ($products as $produit)
                     <tr>
                        <td>{{$produit->nomProduit}}</td>
                        <td>{{$produit->prixUnitaire}}</td>
                        <td>{{$produit->Quantite}}</td>
                        <td>{{$produit->categories->nameCat}}</td>
                        <td>{{$produit->fournisseurs->name}}&nbsp;{{$produit->fournisseurs->prenom}}</td>
                      </tr>
                     @endforeach
                    </tbody>
                  </table>
            </div>
        @endif
    </div>
</div>
