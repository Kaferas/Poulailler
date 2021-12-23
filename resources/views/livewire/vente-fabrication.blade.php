<div>
    @if (Session::has('message'))
    <div class="alert alert-success">
        {{Session::get('message')}}
    </div>
@endif
    <div class="container row m-4">

        <div class="col-md-6">
            <form action="" method="POST" class="border border-dark p-3 mb-4" wire:submit.prevent="save">
                <h2 class="text text-primary mb-3">Vente Fabrication</h2>
                <div class="form-group">
                    <label for="">Produit:</label>
                    <select name="" id="" class="form-control col-md-11" wire:model="produit" wire:change="triggerPrice">
                       <option value="">Choisissez Produit</option>
                        @foreach ($fabProd as $onePro)
                       <option value="{{$onePro->id}}" @if ($onePro->quantite < 1)
                           disabled class="text text-danger"
                       @endif>{{$onePro->nom_devis}}</option>
                       @endforeach
                    </select>
                    @error('produit')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="container row">
                    <div class="form-group">
                        <label for="">Prix Fabrication:</label>
                        <input type="text" name="" id="" class="form-control" disabled wire:model="fabPrix">
                        @error('fabPrix')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Prix Vente:</label>
                        <input type="text" name="" id="" class="form-control ml-3 col-md-12" wire:model="fabVente">
                        @error('fabVente')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    </div>
                </div>
                <div class="ml-1 row">
                    <div class="form-group ">
                        <label for="">Quantite:</label>
                        <label for="" class="text text-danger">En Stock {{$limit}}:</label>
                        <input type="tex" name="quantite" id="" class="form-control" wire:model="qty" min="1" max={{$limit}} placeholder="Quantite Voulue">
                        @error('qty')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    </div>
                    <div class="form-group col-md-6 ">
                        <label for="">Client:</label>
                        <select name="" id="" class="form-control" wire:model="client">
                            <option value="">Choisissez Client</option>
                            @foreach ($clients as $one)
                            <option value="{{$one->id}}">{{$one->nomClient}}&nbsp;{{$one->prenomClient}}</option>
                            @endforeach
                        </select>
                        @error('client')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success col-md-4">Vendre</button>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            
        </div>
    </div>
</div>
