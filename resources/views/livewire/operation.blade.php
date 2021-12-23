<div class="row col-md-12">
    <div class="col-md-5">
        <h2 class="text text-primary mt-2">Nouveau Operation</h2>
        <form action="" method="post" class="border border-dark p-3 mt-3" wire:submit.prevent="save">
    
            <div class="form-group">
                <label for="">Motif:</label>
                <input type="text" name="" id="" class="form-control" wire:model="motif">
                @error('motif')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Montant</label>
                <input type="number" name="" id="" class="form-control" wire:model="montant">
                @error('montant')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-9">
                    <label for="">Type Depense:</label>
                    <select name="" id="" class="form-control" wire:model="depense">
                        <option value="">Choisissez Depense</option>
                        @foreach ($depenses as $dep)
                        <option value="{{$dep->id}}">{{ $dep->nomDepense }}</option>
                        @endforeach
                    </select>
                    @error('depense')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
                </div>
                <div>
                    <button class="btn btn-success p-1" wire:click.prevent="$emit('pop',1)">+</button>
                </div>
            </div>
            <div class="mt-2">
                <button  type="submit" class="btn btn-primary">Enregistrer</button>
                <button  type="submit" class="btn btn-secondary" wire:click.prevent="dernierOperation">Dernier operation</button>
            </div>
        </form>
    </div>
    {{-- {{$motif}} --}}
    @if($dernier)
       <div class="col-md-6">
        <h2 class="text text-primary">Dernier Operation</h2>
        <table class="table">
            <thead>
              <tr>
                <th scope="col" class="text text-primary">#</th>
                <th scope="col">Motif</th>
                <th scope="col">Montant</th>
                <th scope="col">Type Depense</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($derniers as $dernier)
                <tr>
                    <th scope="row" class="text text-primary">{{$loop->index+1}}</th>
                    <td>{{$dernier->motif}}</td>
                    <td>{{$dernier->montant}}</td>
                    <td>{{$dernier->depenses->nomDepense}}</td>
                </tr>
              @endforeach
            </tbody>
            {{$derniers->links()}}
        </table>
       </div>
    @endif
</div>
