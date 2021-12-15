<div  class="row col-md-6 mt-5">
    <div>
        <div class="form-group">
           <form action="" method="post" wire:submit.prevent="save">
            <label for="">Name Categorie</label>
            <input type="text" name="" id="" class="form-control border border-dark" wire:model="catName" value="@old("catName")">
            @error('catName')
                 <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary mt-2">Enregistrer</button>
           </form>
        </div>
    </div>
</div>
