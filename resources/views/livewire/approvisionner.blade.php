<div class="row col-md-12">
    <div class="container col-md-3 mt-4 border border-dark p-4">
        <h3 class="text text-primary">Approvisionner</h3>
        <h6 class="d-flex justify-content-around align-items-center mt-3">
            <div>
                <label for="">matiere Premiere</label>
                <input type="radio" name="cat" id="" value="premiere" wire:model="rubrique" wire:change="trigger">
            </div>
            <div>
                <label for="">produit Fini</label>
                <input type="radio" name="cat" id="" value="fini" wire:model="rubrique" wire:change="trigger">
            </div>
            @error('rubrique')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror

        </h6>
        <div class="row ">
            <div class="form-group col-md-6">
                <label for="">Produit:</label>
                    @if($rubrique == "premiere")
                    <select name="" id="" class="form-control" wire:model="produit" wire:change="triggerHistory">
                        <option value=""></option>
                        @foreach($produits as $pro)
                        <option value="{{$pro->id}}">{{$pro->nomProduit}}</option>
                        @endforeach
                    </select>
                    @elseif($rubrique == "fini")
                    <select name="" id="" class="form-control" wire:model="produit" wire:change="triggerHistory">
                        <option value=""></option>
                        @foreach($produits as $pro)
                        <option value="{{$pro->id}}">{{$pro->nom_devis}}</option>
                        @endforeach
                    </select>
                    @endif
                    @error('produit')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group col-md-5">
                <label for="">Quantite:</label>
                <input type="text" name="" id="" class="form-control" wire:model="qty">
                @error('qty')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
        </div>
        <div class="row container ">
            <div class="form-group col-md-6">
                <label for="">Prix Unitaire:</label>
                <input type="text" name="" id="" class="form-control" wire:model="price">
                @error('price')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            {{$rubrique}}
            <div class="form-group col-md-6">
               @if($rubrique== "premiere" )
               <label for="">Categorie:</label>
               <select name="" id="" class="form-control" wire:model="categorie">
                   <option value=""></option>
                  @foreach($categories as $cat)
                  <option value="{{$cat->id}}">{{$cat->nameCat}}</option>
                  @endforeach
               </select>
               @error('categorie')
               <div class="alert alert-danger">{{$message}}</div>
           @enderror
               @endif
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <button class="btn btn-success" wire:click.prevent="save">Approvisionner</button>
        </div>
    </div>
    <div class="col-md-8 row mt-4">
      <div class="col-md-6 border-top-0 border-bottom-0 border-left-0 border border-secondary">
          <table class="table">
                 <h4 class="d-flex justify-content-start text text-success">Dernièrement Stocké>></h4>
                 <thead>
                <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prix</th>
                <th scope="col">Quantite</th>
                <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody >
                <tr class="text-center">
                <td id="nomnouveau" ></td>
                <td id="prixnouveau" ></td>
                <td id="quantitenouveau"></td>
                <td id="datenouveau"></td>
            </tr>
            </tbody>
        </table>
      </div>
      <div  class="col-md-6   border-top-0 border-bottom-0 border border-secondary">
          <table class="table">
              <h4 class="text text-danger"><< Précedement Stocké</h4>
            <thead>
                <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prix</th>
                <th scope="col">Quantite</th>
                <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody >
                <tr class="text-center">
                <td id="nomancien" ></td>
                <td id="prixancien" ></td>
                <td id="quantiteancien"></td>
                <td id="dateancien" ></td>
            </tr>
            </tbody>
        </table>
      </div>
    </div>
</div>
<script>
    document.addEventListener("whaoou",event=>{
        let data=event.detail[0];
        let newlydata=event.detail[1];
        console.log(newlydata);

        document.getElementById("nomancien").innerHTML=data.nomProduit || "";
        document.getElementById("prixancien").innerHTML=data.prixUnitaire || "";
        document.getElementById("quantiteancien").innerHTML= data.Quantite;
        let trueDa=parseInt(new Date(data.created_at).getDate()+1) +" - "+ parseInt(new Date(data.created_at).getMonth()+1) +" - "+new Date(data.created_at).getFullYear()
        document.getElementById("dateancien").innerHTML=trueDa || "";

        document.getElementById("nomnouveau").innerHTML=data.nomProduit || "";
        document.getElementById("prixnouveau").innerHTML=newlydata.prixUnite || "";
        document.getElementById("quantitenouveau").innerHTML=newlydata.quantite || "";
        let trueDate=parseInt(new Date(data.updated_at).getDate()+1) +" - "+ parseInt(new Date(data.updated_at).getMonth()+1) +" - "+new Date(data.updated_at).getFullYear()
        document.getElementById("datenouveau").innerHTML=trueDate;
    })
</script>
