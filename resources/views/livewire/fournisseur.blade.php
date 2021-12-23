<div class="col-md-6">
    <h2 class="text text-primary">Nouveau Fournisseur</h2>
   <form action="" method="post" wire:submit.prevent="save" >
    <div class="border border-dark col-md-10 p-3">
        <div class="form-group p-1">
            <label for="">Nom</label>
            <input type="text" name="" id="" class="form-control col-md-6 border border-dark" wire:model="nomFourni">
            @error('nomFourni')
            <div class="alert alert-danger mt-1 col-md-6">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group p-1">
            <label for="">Prenom</label>
            <input type="text" name="" id="" class="form-control col-md-6 border border-dark" wire:model="contFourni">
            @error('contFourni')
            <div class="alert alert-danger mt-1 col-md-6">{{ $message }}</div>
            @enderror
        </div>
       <div class="row col-md-12">
        <div class="form-group p-1">
            <label for="">Adress</label>
            <input type="text" name="" id="" class="form-control col-md-10 border border-dark" wire:model="adressFourni">
            @error('adressFourni')
            <div class="alert alert-danger mt-1 col-md-6">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group p-1">
            <label for="">CNI</label>
            <input type="text" name="" id="" class="form-control col-md-8 border border-dark" wire:model="cniFourni">
            @error('cniFourni')
            <div class="alert alert-danger mt-1 col-md-6">{{ $message }}</div>
            @enderror
        </div>
       </div>
        <div class="form-group p-1">
            <label for="">Phone</label>
            <input type="text" name="" id="" class="form-control col-md-6 border border-dark" wire:model="PhoneFourni">
            @error('PhoneFourni')
            <div class="alert alert-danger mt-1 col-md-6">{{ $message }}</div>
            @enderror
        </div>
            <button type="submit" class="btn btn-primary mt-2">Enregistrer</button>
    </div>
   </form>
</div>
