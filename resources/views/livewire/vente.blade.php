<div class="row">
    <div class="col-md-6 mt-3 pl-4">
        <h2 class="text text-primary">Section Vente</h2>
        <form action="" method="post" class="border border-dark p-4">
           <div class="row">
            <div class="form-group col-md-5">
                <label for="">Choisisssez Produit</label>
                <select name="" id="" class="form-control border border-dark" wire:model="produit" wire:change="triggerProduct">
                    <option value="">Choisissez Produit</option>
                    @foreach ($produits as $pro)
                    <option value="{{$pro->id}}">{{$pro->nomProduit}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group ">
                <label for="">Montant Produit:</label>
                <input type="number" name="" id="" class="form-control col-md-10 border border-dark" disabled wire:model="prixunitaire">
            </div>
           </div>
            <div class="row">
                <div class="form-group pl-3 col-md-4">
                    <label for="">Quantite:</label>
                    <input type="number" name="" id="" class="form-control border border-dark" wire:model="qty" wire:change="calcultotal" max="{{$maxQty}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="">Montant Total:</label>
                    <input type="number" name="" id="" class="form-control  border border-dark" wire:model="totalMount">
                </div>
                <div class="form-group col-md-4">
                    <label for="">Rabais (%)</label>
                    <input type="number" name="" id="" class="form-control  border border-dark" >
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="">Client:</label>
                    <select name="" id="" class="form-control border border-dark">
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-success p-1 mr-3" wire:click.prevent="addClient">+</button>
                </div>
                <div class="form-group">
                   <label for="">Mode Paiement</label>
                   <input type="radio"  id="" value="Cash"  name="modePaie">
                   <label for="" class="text text-primary">Cash</label>
                   <input type="radio"  id="" value="Cheque" name="modePaie">
                   <label for="" class="text text-primary">Cheque</label>
                   <input type="radio" id="" value="Credit" name="modePaie">
                   <label for="" class="text text-primary">Credit</label>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary col-md-5">Vendre</button>
            </div>
        </form>
    </div>
    @if ($client)
        @livewire("client")
    @endif
</div>
