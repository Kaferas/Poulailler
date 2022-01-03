<div class="col-md-5">
    @if($modif)
    <h2 class="text text-danger">Editer {{ucfirst($nomDepense)}}</h2>
        <form action="" method="post" class="border border-dark p-3" wire:submit.prevent="save">
            <div class="form-group">
                <input type="hidden" name="" wire:model="etat">
            <label for="" class="text text-danger">Nom :</label>
                <input type="text" name="" id="" class="form-control" wire:model="nomDepense">
                @error('nomDepense')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="submit" value="Modifier" class="btn btn-danger">
            </div>
        </form>

    @else
    <h2 class="text text-primary">Nouveau {{ucfirst($etat)}}</h2>
        <form action="" method="post" class="border border-dark p-3" wire:submit.prevent="save" id="edit">
            <div class="form-group">
                <input type="hidden" name="" wire:model="etat">
            <label for="">Nom {{ucfirst($etat)}} :</label>
                <input type="text" name="" id="" class="form-control" wire:model="nomDepense">
                @error('nomDepense')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="submit" value="Enregistrer" class="btn btn-primary">
            </div>
        </form>

    @endif
</div>

