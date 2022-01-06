<div>
    @if (Session::has('message'))
    <div class="alert alert-success">
        {{Session::get('message')}}
    </div>
@endif
    <div class="container row m-4">

      @if($modForm)
      <div class="col-md-6">
        <form action="" method="POST" class="border border-dark p-3 mb-4" wire:submit.prevent="save">
            <h2 class="text text-danger mb-3">Modifier Vente Fabrication</h2>
            <div class="form-group">
                <label for="" class="text text-danger">Produit:</label>
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
            <div class="row d-flex justify-content-around">
                <div class="form-group">
                    <label for="" class="text text-primary">Vendre:</label>
                    <input type="radio" name="etat" id="" value="vendu"  wire:model="etat" @if ($etat == "vendu")
                        checked
                    @endif>
                </div>
                <div class="form-group">
                    <label for="" class="text text-primary">Reparation</label>
                    <input type="radio" name="etat" id=""  value="reparation" wire:model="etat" @if ($etat == "reparation")
                    checked
                @endif>
                </div>
                @error('etat')
                    <div class="alert alert-danger mt-1 col-md-12">{{ $message }}</div>
                @enderror
            </div>
            <div class="container row">
                <div class="form-group">
                    <label for="" class="text text-danger">Prix Fabrication:</label>
                    <input type="text" name="" id="" class="form-control" disabled wire:model="fabPrix">
                    @error('fabPrix')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
                </div>

                <div class="form-group">
                    <label for="" class="text text-danger">Prix Vente:</label>
                    <input type="text" name="" id="" class="form-control ml-3 col-md-12" wire:model="fabVente">
                    @error('fabVente')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
                </div>
            </div>
            <div class="ml-1 row">
                <div class="form-group ">
                    <label for="" class="text text-danger">Quantite:</label>
                    <label for="" class="text text-danger">
                       <ul>
                           <li>
                               En Stock {{$limit}}:
                           </li>
                           <li>
                               En Reparation {{$reparation}}
                           </li>
                       </ul>
                    </label>
                    <input type="tex" name="quantite" id="" class="form-control" wire:model="qty" min="0" max={{$limit}} placeholder="Quantite Voulue">
                    @error('qty')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
                </div>
                <div class="form-group col-md-6 ">
                    <label for="" class="text text-danger">Client:</label>
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
                <button type="submit" class="btn btn-success col-md-4">Modifier Vente</button>
                <button  class="btn btn-secondary col-md-4" wire:click.prevent="afficherDernier">Derniers Ventes</button>
            </div>
        </form>
    </div>
      @else
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
            <div class="row d-flex justify-content-around">
                <div class="form-group">
                    <label for="" class="text text-primary">Vendre:</label>
                    <input type="radio" name="etat" id="" value="vendu"  wire:model="etat">
                </div>
                <div class="form-group">
                    <label for="" class="text text-primary">Reparation</label>
                    <input type="radio" name="etat" id=""  value="reparation" wire:model="etat">
                </div>
                @error('etat')
                    <div class="alert alert-danger mt-1 col-md-12">{{ $message }}</div>
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
                    <input type="tex" name="quantite" id="" class="form-control" wire:model="qty" min="0" max={{$limit}} placeholder="Quantite Voulue">
                    <label for="" class="text text-danger">
                        <ul>
                            <li>
                                En Stock: {{$limit}}
                            </li>
                            <li>
                                En Reparation: {{$reparation}}
                            </li>
                        </ul>
                    </label>
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
                <button  class="btn btn-secondary col-md-4" wire:click.prevent="afficherDernier">Derniers Ventes</button>
            </div>
        </form>
    </div>
      @endif
        @if ($dernier)
        <div class="col-md-6">
            <h2 class="text text-primary">Derniers Fabrications</h2>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Produit</th>
                    <th scope="col">Prix Fabrication</th>
                    <th scope="col">Prix Vente</th>
                    <th scope="col">Quantite</th>
                    <th scope="col">Client</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($all as $fabrication)
                <tr>
                 <td scope="row">{{$fabrication->produits->nom_devis}}</td>
                 <td>{{$fabrication->prixFab}}</td>
                 <td >{{$fabrication->prixvente}}</td>
                 <td>{{$fabrication->quantite}}</td>
                 <td>{{$fabrication->clients->nomClient}}&nbsp;{{$fabrication->clients->prenomClient}}</td>
                 <td><a href="" class="btn btn-primary" wire:click.prevent="modFabric({{$fabrication->id}})">Modifier</a></td>
               </tr>
                 @endforeach
                </tbody>
            </table>
        {{$all->links()}}
           </div>
        @endif
    </div>
</div>
