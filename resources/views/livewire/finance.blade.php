<div>
    <div class="d-flex justify-center align-items-center bg-dark col-md-4 list-unstyled p-1">
        <li><a href="" wire:model="vente" class="col-5 text-white" wire:click.prevent="changeVente">Ventes</a></li>
        <li><a href="" wire:model="operation" class="col-5 text-white" wire:click.prevent="changeOperation">Operation</a></li>
    </div>
        @if ($operation)
            <p>Operation</p>
            <div class="jumbotron col-lg-6">
                <h3 class="mb-3">Nouveau Produit</h3>
            <form action="" method="post" class="col- p-0 ">
                <div class="form-group">
                    <label for="" class="text text-primary">Code Produit</label>
                    <input type="text" name="npro" id="" class="form-control col-lg-6 border-dark h-25">
                </div>
                <div class="form-group">
                    <label for="" class="text text-primary">Nom Produit</label>
                    <input type="text" name="npro" id="" class="form-control col-lg-6 border-dark h-25">
                </div>
                <div class="form-group">
                    <label for="" class="text text-primary">Quantite</label>
                    <input type="number" name="qty" id="" class="form-control col-lg-6 border-dark h-25">
                </div>
                <div class="form-group">
                    <label for="" class="text text-primary">Categorie</label>
                    <select name="" id="" class="form-control col-lg-6 border-dark h-25">
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="" class="text text-primary">Prix unitaire</label>
                    <input type="text" name="priceunit" id="" class="form-control col-lg-6 border-dark h-25">
                </div>
            </form>
        </div>
        @endif

        @if ($vente)
            <div class=" d-inline-flex justify-center mt-3 h-50  border border-dark">
                <div class="col-md-12 h-50 d-flex justify-content-center align-items-end ">
                    <span class="text text-primary">Montant En caisse</span>
                </div>
                <div class="col-md-12 h-50 d-flex justify-content-center align-items-end text-light bg-success">
                    <h3>{{$total}} FBU</h3>
                </div>
            </div>
        @endif
    </div>
</div>
