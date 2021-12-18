<div class="col-md-6 ">
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
        </div>
    </form>
</div>
