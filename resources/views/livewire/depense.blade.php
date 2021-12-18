    <div class="col-md-3">
        <h2 class="text text-primary">Creer Depense</h2>
        <form action="" method="post" class="border border-dark p-3" wire:submit.prevent="save">
            <div class="form-group">
                <label for="">Nom Depense:</label>
                <input type="text" name="" id="" class="form-control" wire:model="nomDepense">
                @error('nomDepense')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="submit" value="Enregistrer" class="btn btn-primary">
            </div>
        </form>
    </div>

