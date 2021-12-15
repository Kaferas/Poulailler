<div class="col-md-5 border border-primary">
    <div >
        <h2>Ajout Client</h2>
        <form action="" method="post" wire:submit.prevent="save">
            <div class="row col-md-12">
                <div class="form-group mr-3">
                    <label for="">Nom Client:</label>
                    <input type="text" name="" id="" class="form-control col-md-12  border border-dark" wire:model="noClient">
                    @error('noClient')
            <div class="alert alert-danger mt-1 col-md-12">{{ $message }}</div>
            @enderror
                </div>
                <div class="form-group">
                    <label for="">Prenom Client:</label>
                    <input type="text" name="" id="" class="form-control col-md-12 border border-dark" wire:model="preClient">
                    @error('preClient')
                    <div class="alert alert-danger mt-1 col-md-12">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row col-md-12">
                <div class="form-group mr-3">
                    <label for="">Adress Client:</label>
                    <input type="text" name="" id="" class="form-control col-md-12 border border-dark" wire:model="adClient">
                    @error('adClient')
                    <div class="alert alert-danger mt-1 col-md-12">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Numero Telephone:</label>
                    <input type="text" name="" id="" class="form-control col-md-12 border border-dark" wire:model="telClient">
                    @error('telClient')
                    <div class="alert alert-danger mt-1 col-md-12">{{ $message }}</div>
                    @enderror
                </div>
                </div>
                <div class="form-group">
                    <label for="">Carte Identite Nationale:</label>
                    <input type="text" name="" id="" class="form-control col-md-12 border border-dark" wire:model="cniClient">
                    @error('cniClient')
                    <div class="alert alert-danger mt-1 col-md-12">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary col-md-12">Ajouter Client</button>
                </div>
            </div>
        </form>
    </div>
</div>
