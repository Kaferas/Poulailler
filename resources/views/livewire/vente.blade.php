<div class="row col-md-12">
    <div class="col-md-6 mt-3 pl-4">
        @if (isset($message))
            <div class="alert alert-success">{{$message}}</div>
        @endif
        <h2 class="text text-primary">Section Vente</h2>
        <form action="" method="post" class="border border-dark p-4" wire:submit.prevent="save">
           <div class="row">
            <div class="form-group col-md-5">
                <label for="">Choisisssez Produit</label>
                <select name="" id="" class="form-control border border-dark" wire:model="produit" wire:change="triggerProduct">
                    <option value="">Choisissez Produit</option>
                    @foreach ($produits as $pro)
                    <option value="{{$pro->id}}">{{$pro->nomProduit}}</option>
                    @endforeach
                </select>
                @error('produit')
                <div class="alert alert-danger mt-1 col-md-12">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-5">
                <label for="">Montant Produit:</label>
                <input type="number" name="" id="" class="form-control col-md-10 border border-dark" disabled wire:model="prixunitaire">
                @error('prixunitaire')
                <div class="alert alert-danger mt-1 col-md-12">{{ $message }}</div>
                @enderror
            </div>
           </div>
            <div class="row">
                <div class="form-group pl-3 col-md-4">
                    <label for="">Quantite:</label>
                    <input type="number" name="" id="" class="form-control border border-dark" wire:model="qty" wire:change="calcultotal" max="{{$maxQty}}">
                    @error('qty')
                    <div class="alert alert-danger mt-1 col-md-12">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="">Montant Total:</label>
                    <input type="number" name="" id="" class="form-control  border border-dark" wire:model="totalMount">
                    @error('totalMount')
                    <div class="alert alert-danger mt-1 col-md-12">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="">Rabais (%)</label>
                    <input type="number" name="" id="" class="form-control  border border-dark" wire:model="rabais" wire:change="recalcule">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="">Client:</label>
                    <select name="" id="" class="form-control border border-dark" wire:model="clientslist">
                       <option value="" >Choisissez Client</option>
                        @foreach ($clients as $cli)
                            <option value="{{$cli->id}}">{{$cli->nomClient}}&nbsp{{$cli->prenomClient}}</option>
                        @endforeach
                    </select>

                    @error('clientslist')
                    <div class="alert alert-danger mt-1 col-md-12">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-success p-1 mr-3" wire:click.prevent="addClient">+</button>
                </div>
                <div class="form-group">
                   <label for="">Mode Paiement</label>
                   <input type="radio"  id="" value="Cash"  name="modePaie"  wire:model="paymethod">
                   <label for="" class="text text-primary">Cash</label>
                   <input type="radio"  id="" value="Cheque" name="modePaie" wire:model="paymethod">
                   <label for="" class="text text-primary">Cheque</label>
                   <input type="radio" id="" value="Credit" name="modePaie" wire:model="paymethod">
                   <label for="" class="text text-primary">Credit</label>
                </div>

                @error('paymethod')
                <div class="alert alert-danger mt-1 col-md-12">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-primary col-md-5">Vendre</button>
                <button class="btn btn-secondary" wire:click.prevent="afficherPro">Derniers Ventes</button>
            </div>
        </form>
    </div>
    @if ($client)
        @livewire("client")
    @endif
    @if($allPro)
       <div class="col-md-6">
        <h2 class="text text-primary">Derniers Ventes</h2>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Produit</th>
                <th scope="col">Quantite</th>
                <th scope="col">Client</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($reports as $report)
            <tr>
             <th scope="row">{{$report->produits->nomProduit}}</th>
             <td>{{$report->qty}}</td>
             <td>{{$report->clients->nomClient}}</td>
           </tr>
             @endforeach
            </tbody>
        </table>
        {{-- {$links}} --}}
       </div>
    @endif
</div>
