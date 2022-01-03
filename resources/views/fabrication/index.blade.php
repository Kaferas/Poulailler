@extends("layouts.template")


@section("value")
<div class="container row col-md-12">
    <div class=" col-md-6">
        @if (Session::has('message'))
            <div class="alert alert-danger text-center">{{Session::get('message')}}</div>
        @endif
        <h2 class="text text-primary">Nouveau Commande</h2>
        <form action="{{route("devis")}}" method="post" class="col-md-10 border border-dark p-4">
            @csrf
            <div class="form-group">
                <label for="">Nom Devis:</label>
                <input type="text" name="nameDev" id="" class="form-control">
                @error('nameDev')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
                <input type="hidden" name="code">
            </div>

            <div class="form-group">
                <label for="" class="text text-primary">Quantite:</label>
                <input type="number" name="clientId" id="" class="form-control">
                @error('clientId')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group " id="order">
                <div class="row">
                    <label for="" class="text text-primary d-block">DRESSER DEVIS: &nbsp;</label>
                <div id="frame">
                    <input type="button" value="+" class="addBtn btn btn-primary p-1">
                  </div>
                </div>
            </div>
            <div class="form-group">
                <button  type="submit" class="btn btn-success">Enregistrer Commande</button>
            </div>
        </form>

    </div>
    <div class="col-md-6">
        <h3 class="text text-warning">Commande en Cours</h3>
        <table class="table">
            <thead>
              <tr>
                  <th scope="col">Quantite</th>
                <th scope="col">Nom Commande</th>
                <th scope="col">Date Commande</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($commande as $one)
                <tr>
                    <td>{{$one->quantite}}</td>
                    <td>{{$one->nom_devis}}</td>
                    <td>{{date('d/m/Y',strtotime($one->created_at   ))}}</td>
                    <td>
                        <a class="btn btn-md btn-primary p-1 text-light" href="{{route('detailsDevis',$one->id)}}">Voir Details</a>
                        <a class=" btn btn-md btn-success p-1 text-light" @if ($one->etat == 1) disabled @endif href="{{route('finaliser',$one->id)}}">Finaliser</a>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
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
        newBtn.setAttribute("placeholder","Materiel a utiliser");
        montant.setAttribute("type","number");
        montant.setAttribute("name","montant[]");
        montant.setAttribute("placeholder","Montant equivalant");
        newBtn.style.width="200px";
        // newBtn.style.display=" inline-block";
        montant.style.width="200px";
        // montant.style.display="inline-block";
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
