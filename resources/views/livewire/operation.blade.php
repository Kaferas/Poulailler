<div class="row col-md-12">
    <div class="col-md-5">
        @if($modif)
        <div class="d-flex justify-content-between">
            <h2 class="text text-danger mt-2">Editer Operation</h2>
            <button class="btn btn-success p-2 mt-2" wire:click.prevent="allCategories">Categories</button>
        </div>
        <form action="" method="post" class="border border-dark p-3 mt-3" wire:submit.prevent="save">
     <div class="container">
        <div class="form-group">
            <label for="">Nom Demandeur:</label>
            <input type="text" name="" id="" class="form-control" wire:model="nomDemandeur">
            @error("nomDemandeur")
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Motif:</label>
            <input type="text" name="" id="" class="form-control" wire:model="motif">
            @error('motif')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
     </div>
        <div class=" container form-group">
            <label for="">Montant</label>
            <input type="number" name="" id="" class="form-control" wire:model="montant">
            @error('montant')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="container form-group">
            <label for="">Recettes</label>
            <input type="radio" name="specif" id="" value="recette" wire:model="specif"  wire:change="changement">
            <label for="">Depenses</label>
            <input type="radio" name="specif" id="" value="depense" wire:model="specif"  wire:change="changement">
        </div>
        <div class="container row">
            <div class="col-md-9">
                <label for="">Type Depense:</label>
                <input type="hidden" wire:model="etat">
              
                @if ($specif == 'recette')
                <select name="" id="" class="form-control" wire:model="depense">
                    <option value="">Choisissez Depense</option>
                    @foreach ($depenses as $dep)
                    <option value="{{$dep->id}}">{{ $dep->nomDepense }}</option>
                    @endforeach
                </select>
             
                @else
                <select name="" id="" class="form-control" wire:model="depense">
                    <option value="">Choisissez Depense</option>
                    @foreach ($depenses as $dep)
                    <option value="{{$dep->id}}">{{ $dep->nomDepense }}</option>
                    @endforeach
                </select>
                @endif
                @error('depense')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
            </div>
            <div>
                <button class="btn btn-success p-1" wire:click.prevent="$emit('popin',[1,'{{$specif}}'])">{{ucfirst($specif)}}+ </button>
            </div>
        </div>
        <div class="container mt-2">
            <button  type="submit" class="btn btn-primary">Enregistrer</button>
            <button  type="submit" class="btn btn-secondary" wire:click.prevent="dernierOperation">Dernier operation</button>
        </div>
    </form>
    @else
    <div class="d-flex justify-content-between w-100">
        <h2 class="text text-primary mt-2">Nouveau Operation</h2>
        <button class="btn btn-success p-2 mt-2" wire:click.prevent="allCategories">Categories</button>
    </div>
    <form action="" method="post" class="border border-dark p-3 mt-3" wire:submit.prevent="save">
     <div class="container">
        <div class="form-group">
            <label for="">Nom Demandeur:</label>
            <input type="text" name="" id="" class="form-control" wire:model="nomDemandeur">
            @error("nomDemandeur")
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Motif:</label>
            <input type="text" name="" id="" class="form-control" wire:model="motif">
            @error('motif')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
     </div>
        <div class=" container form-group">
            <label for="">Montant</label>
            <input type="number" name="" id="" class="form-control" wire:model="montant">
            @error('montant')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="container form-group">
            <label for="">Recettes</label>
            <input type="radio" name="specif" id="" value="recette" wire:model="specif" wire:change="changement">
            <label for="">Depenses</label>
            <input type="radio" name="specif" id="" value="depense" wire:model="specif"  wire:change="changement">
        </div>
        <div class="container row">
            <div class="col-md-9">
                <label for="">Type Depense:</label>
                <input type="hidden" wire:model="etat">
          
                @if ($specif == 'recette')
                <select name="" id="" class="form-control" wire:model="depense">
                    <option value="">Choisissez Depense</option>
                    @foreach ($depenses as $dep)
                    <option value="{{$dep->id}}">{{ $dep->nomDepense }}</option>
                    @endforeach
                </select>
            
                @else
                <select name="" id="" class="form-control" wire:model="depense">
                    <option value="">Choisissez Depense</option>
                    @foreach ($depenses as $dep)
                    <option value="{{$dep->id}}">{{ $dep->nomDepense }}</option>
                    @endforeach
                </select>
                @endif
                @error('depense')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
            </div>
            <div>
                <button class="btn btn-success p-1" wire:click.prevent="$emit('pop',[1,'{{$specif}}'])">{{ucfirst($specif)}}+</button>
            </div>
        </div>
        <div class="container mt-2">
            <button  type="submit" class="btn btn-primary">Enregistrer</button>
            <button  type="submit" class="btn btn-secondary" wire:click.prevent="dernierOperation">Dernier operation</button>
        </div>
    </form>
       @endif
    </div>
    {{-- {{$motif}} --}}
    @if($dernier)
       <div class="col-md-6 mt-4 align-center">
        <h2 class="text text-primary">Dernier Operation</h2>
        <table class="table">
            <thead>
              <tr>
                <th scope="col" class="text text-primary">#</th>
                <th scope="col">Motif</th>
                <th scope="col">Montant</th>
                <th scope="col">Type Depense</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($derniers as $dernier)
                <tr>
                    <th scope="row" class="text text-primary">{{$loop->index+1}}</th>
                    <td>{{$dernier->motif}}</td>
                    <td>{{$dernier->montant}}</td>
                    <td>{{$dernier->depenses->nomDepense}}</td>
                    <td><a href="" wire:click.prevent="changeModif({{$dernier->id}})" class="btn btn-primary">Modifier</a></td>
                </tr>
              @endforeach
            </tbody>
            {{$derniers->links()}}
        </table>
       </div>
    @endif
    @if ($allinOne)
    <div class="col-md-6 mt-4 align-center">
        <h2 class="text text-primary">Tous les Categories </h2>
        <!-- <a class="btn btn-success d-flex-inline justify-content-end" onclick="printDiv('data')">Print</a> -->
        <table class="table">
            <thead>
              <tr>
                <th scope="col" class="text text-primary">#</th>
                <th scope="col">Nom Categorie</th>
                <th scope="col">Type</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody  id="data">
              @foreach ($allDepenses as $cat)  
              <tr >
                    <th scope="row" class="text text-primary">{{$loop->index+1}}</th>
                    <td>{{$cat->nomDepense}}</td>
                    <td>{{$cat->etat}}</td>
                    <td><a href="" class="btn btn-primary" wire:click.prevent="$emit('editDepense',[{{$cat->id}},'{{$cat->etat}}'])">Modifier</a></td>
                </tr>
              @endforeach
            </tbody>
        </table>
        {{$allDepenses->links()}}
       </div>
    @endif
</div>

