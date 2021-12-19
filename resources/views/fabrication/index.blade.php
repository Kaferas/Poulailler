@extends("layouts.template")


@section("value")
<div>
    <div class="container">
        <h2 class="text text-primary">Nouveau Commande</h2>
        <form action="" method="post" class="col-md-6 border border-dark p-4">
            <div class="form-group">
                <label for="" class="text text-priamry">CLIENT:</label>
                <div id="frame">
                    <input type="button" value="+" class="addBtn btn btn-primary p-1">
                  </div>
                <select name="" id="" class="form-control">
                    <option value="">Choisissez Client</option>
                    @foreach ($clients as $client)
                        <option value="{{$client->id}}">{{$client->nomClient}}&nbsp{{$client->prenomClient}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group " id="order">
            </div>
            <div class="form-group">
                <button class="btn btn-success">Enregistrer Commande</button>
            </div>
        </form>

    </div>
</div>
<script>
     function appendBtn(){
         var container=document.createElement("div");
         container.classList.add="row";
          var newBtn = document.createElement("input");
          var montant = document.createElement("input");
        newBtn.setAttribute("type","text");
        newBtn.setAttribute("name","commande[]");
        newBtn.setAttribute("placeholder","Votre Motif Ici");
        montant.setAttribute("type","number");
        montant.setAttribute("name","montant[]");
        montant.setAttribute("placeholder","Votre Montant Ici");
        newBtn.style.width="200px";
        newBtn.style.display=" inline-block";
        montant.style.width="200px";
        montant.style.display="inline-block";
        newBtn.style.margin="10px";
        newBtn.classname = "addBtn";
        container.appendChild(newBtn)
        container.appendChild(montant)
        document.getElementById("order").appendChild(container);
      }

      document.getElementsByClassName("addBtn")[0].addEventListener("click",function(){
          appendBtn()
      })
</script>
@endsection
