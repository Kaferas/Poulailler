<div class="row col-md-6">
    <div class="border border-primary mt-3 col-md-12">
            <div class="m-2">
                <a href="" class="btn btn-dark mt-2 p-1" wire:model="recherche" wire:click.prevent='changeSearch'>Rechercher</a>
                <a href="" class="btn btn-danger mt-2 p-1" wire:model="recherche" wire:click.prevent='fermerSearch'>Fermer</a>
                <h2>Ajout Client</h2>
                <form action="" method="post" wire:submit.prevent="save" >
                    <div class="row ">
                        <div class="form-group mr-3 col-md-6">
                            <label for="">Nom Client:</label>
                            <input type="text" name="" id="" class="form-control col-md-12  border border-dark" wire:model="noClient">
                            @error('noClient')
                                <div class="alert alert-danger mt-1 col-md-12">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group  col-md-6">
                            <label for="">Prenom Client:</label>
                            <input type="text" name="" id="" class="form-control col-md-12 border border-dark" wire:model="preClient">
                            @error('preClient')
                            <div class="alert alert-danger mt-1 col-md-12">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row ">
                        <div class="form-group mr-3 col-md-6">
                            <label for="">Adress Client:</label>
                            <input type="text" name="" id="" class="form-control col-md-12 border border-dark" wire:model="adClient">
                            @error('adClient')
                            <div class="alert alert-danger mt-1 col-md-12">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-5">
                            <label for="">Numero Telephone:</label>
                            <input type="text" name="" id="" class="form-control col-md-12 border border-dark" wire:model="telClient">
                            @error('telClient')
                            <div class="alert alert-danger mt-1 col-md-12">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row col-md-10 mb-2">
                            <label for="">Carte Identite Nationale:</label>
                            <input type="text" name="" id="" class="form-control col-md-10 p-2 border border-dark" wire:model="cniClient">
                            @error('cniClient')
                            <div class="alert alert-danger mt-1 col-md-12">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="form-group">
                            <button type="submit" class="btn btn-primary col-md-8">Ajouter Client</button>
                    </div>
                </form>
            </div>
            <div class=" row mt-4 border">
                @if ($recherche)
                    @livewire("details-client")
                @endif
            </div>
    </div>

</div>

