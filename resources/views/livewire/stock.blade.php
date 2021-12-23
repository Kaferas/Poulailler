<div>
    <div class="bg-dark d-flex justify-center list-unstyled align-items-end col-md-5 ml-5 p-1">
        @if(Gate::allows("is-admin"))
        <li><a  class="text-white col-md-4 text-center" href="" wire:model="aproduit" wire:click.prevent="ajPro">Ajout Produit</a></li>
        @endif
        <li><a href="" class="text-white col-md-4 text-center" wire:model="vproduit" wire:click.prevent="changePro">Vente Produit</a></li>
        <li class="text-center"><a href="" class="text-white col-md-4 " wire:model="vproduit" wire:click.prevent="vfabrication">Vente Fabrication</a></li>
    </div>
    @if($aproduit)
      @if($edition)
      <div class="row">
        <div class="container col-md-5 mt-3 border border-danger">
            <h2 class="text text-danger">Editer Produit</h2>
             <form action="" method="post" class="p-3" wire:submit.prevent="save">
                 <div class="row border-dark">
                     <div class="form-group mr-1">
                         <label for="">Code Produit</label>
                         <input type="text" name="" wire:model="codePro" id="" class="form-control" disabled>

                     </div>
                     <div class="form-group">
                         <label for="">Nom Produit</label>
                         <input type="text" name="" id="" class="form-control" wire:model="nomPro">

                         @error('nomPro')
                         <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                     </div>
                 </div>
                 <div class="row">
                     <div class="form-group">
                         <label for="">Prix Unitaire:</label>
                         <input type="number" name="" id="" class="form-control" wire:model="priUnit">

                         @error('priUnit')
                         <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                     </div>

                     <div class="row">
                         <div class="form-group ml-3">
                             <label for="">Categorie:</label>
                             <select name="" id="" class="form-control col-md-12" wire:model="categorieid">
                                 <option value="">Choose Categorie</option>
                                 @foreach ($categories as $cat)
                                     <option value="{{$cat->id}}">{{$cat->nameCat}}</option>
                                 @endforeach
                             </select>

                             @error('categorieid')
                             <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror

                         </div>
                         <div class="form-group  ml-1">
                             <div class="btn btn-success p-1" wire:click="displaymodal">+</div>
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="form-group mr-1">
                         <label for="">Quantite:</label>
                         <input type="number" name="" id="" class="form-control" wire:model="qty">

                         @error('qty')
                         <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                     </div>
                    <div class="row">
                     <div class="form-group ml-3">
                         <label for="">Fournisseur:</label>
                         <select name="" id="" class="form-control col-md-12" wire:model="fournisseursId">
                             <option value="">Choose Founisseur</option>
                             @foreach ($fournisseurs as $fourni)
                                 <option value="{{$fourni->id}}">{{$fourni->name}}&nbsp{{ $fourni->prenom}}</option>
                             @endforeach
                         </select>

                     </div>
                     <div class="form-group  ml-1">
                         <div class="btn btn-success p-1 " data-toggle="modal" data-target="#exampleModal" wire:click="displaymodalF">+</div>
                     </div>
                    </div>
                 </div>
                 <div class="row">
                     <button type="submit" class="btn btn-warning p-2">Editer</button>
                     <div class="btn btn-secondary p-2 ml-1" wire:model="afficherPro" wire:click.prevent="affProduit">Afficher Produits</div>
                 </div>

             </form>
         </div>
         @if($categorie)
             @livewire("categorie")
         @endif
         @if($fournisseur)
             @livewire("fournisseur")
         @endif
         @if($afficherPro)
           <div class="col-md-6">
             <h2 class="mb-4">Produit Disponibles</h2>
             <input type="text" name="" id="" class="form-control col-md-6" placeholder="Rechercher Ici ..." wire:model="search">
             <table class="table">
                 <thead>
                   <tr>
                     <th scope="row">CodeProduit</th>
                     <td>Nom</td>
                     <td>PrixUnitaire</td>
                     <td>Quantite Restant</td>
                     <td>Action</td>
                   </tr>
                 </thead>
                 <tbody>
                   @foreach ($toutPro as $pro)
                   <tr>
                     <td>{{$pro->codeProduit}}</td>
                     <td>{{$pro->nomProduit}}</td>
                     <td>{{$pro->prixUnitaire}}</td>
                     <td>{{$pro->Quantite}}</td>
                     <td>
                         <button class="btn btn-danger ">Desactiver</button>
                         <button class="btn btn-primary">Modifier</button>
                     </td>
                   </tr>
                   @endforeach
                 </tbody>
             </table>
             {{$toutPro->links()}}
           </div>
         @endif
        <div class="col-md-6">

        </div>
    </div>
      @else
      <div class="row">
        <div class="container col-md-5 mt-3 border border-dark">
            <h2 class="text text-primary">Nouveau Produit</h2>
             <form action="" method="post" class="p-3" wire:submit.prevent="save">
                 <div class="row border-dark">
                     <div class="form-group mr-1">
                         <label for="">Code Produit</label>
                         <input type="text" name="" wire:model="codePro" id="" class="form-control" disabled>

                     </div>
                     <div class="form-group">
                         <label for="">Nom Produit</label>
                         <input type="text" name="" id="" class="form-control" wire:model="nomPro">

                         @error('nomPro')
                         <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                     </div>
                 </div>
                 <div class="row">
                     <div class="form-group">
                         <label for="">Prix Unitaire:</label>
                         <input type="number" name="" id="" class="form-control" wire:model="priUnit">

                         @error('priUnit')
                         <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                     </div>

                     <div class="row">
                         <div class="form-group ml-3">
                             <label for="">Categorie:</label>
                             <select name="" id="" class="form-control col-md-12" wire:model="categorieid">
                                 <option value="">Choose Categorie</option>
                                 @foreach ($categories as $cat)
                                     <option value="{{$cat->id}}">{{$cat->nameCat}}</option>
                                 @endforeach
                             </select>

                             @error('categorieid')
                             <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror

                         </div>
                         <div class="form-group  ml-1">
                             <div class="btn btn-success p-1" wire:click="displaymodal">+</div>
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="form-group mr-1">
                         <label for="">Quantite:</label>
                         <input type="number" name="" id="" class="form-control" wire:model="qty">

                         @error('qty')
                         <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                     </div>
                    <div class="row">
                     <div class="form-group ml-3">
                         <label for="">Fournisseur:</label>
                         <select name="" id="" class="form-control col-md-12" wire:model="fournisseursId">
                             <option value="">Choose Founisseur</option>
                             @foreach ($fournisseurs as $fourni)
                                 <option value="{{$fourni->id}}">{{$fourni->name}}&nbsp{{ $fourni->prenom}}</option>
                             @endforeach
                         </select>

                     </div>
                     <div class="form-group  ml-1">
                         <div class="btn btn-success p-1 " data-toggle="modal" data-target="#exampleModal" wire:click="displaymodalF">+</div>
                     </div>
                    </div>
                 </div>
                 <div class="row">
                     <button type="submit" class="btn btn-primary p-2">Enregistrer</button>
                     <div class="btn btn-secondary p-2 ml-1" wire:model="afficherPro" wire:click.prevent="affProduit">Afficher Produits</div>
                 </div>

             </form>
         </div>
         @if($categorie)
             @livewire("categorie")
         @endif
         @if($fournisseur)
             @livewire("fournisseur")
         @endif
         @if($afficherPro)
           <div class="col-md-6">
             <h2 class="mb-4">Produit Disponibles</h2>
             <input type="text" name="" id="" class="form-control col-md-6" placeholder="Rechercher Ici ..." wire:model="search">
             <table class="table">
                 <thead>
                   <tr>
                     <th scope="row">CodeProduit</th>
                     <td>Nom</td>
                     <td>PrixUnitaire</td>
                     <td>Quantite Restant</td>
                     <td>Action</td>
                   </tr>
                 </thead>
                 <tbody>
                   @foreach ($toutPro as $pro)
                   <tr>
                     <td>{{$pro->codeProduit}}</td>
                     <td>{{$pro->nomProduit}}</td>
                     <td>{{$pro->prixUnitaire}}</td>
                     <td>{{$pro->Quantite}}</td>
                     <td>
                         <button class="btn btn-danger ">Desactiver</button>
                         <button class="btn btn-primary" wire:click.prevent="selectItem({{$pro->id}})">Modifier</button>
                     </td>
                   </tr>
                   @endforeach
                 </tbody>
             </table>
             {{$toutPro->links()}}
           </div>
         @endif
        <div class="col-md-6">

        </div>
    </div>
      @endif
    @endif
    @if($vproduit)
       @livewire("vente")
    @endif
    @if($vfabr)
       @livewire("vente-fabrication")
    @endif
</div>
