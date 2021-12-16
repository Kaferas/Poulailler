<div class="">
    <div class="form-group ">
        <input type="text" name="" id="" class="border border-dark form-control col-md-7 col-xs-3 ml-2" placeholder="Chercher Client Ici " wire:model="search">
    </div>
    <table class="table ">
        <thead>
          <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Adress</th>
            <th scope="col">Phone</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($allClients as $single)
            <tr>
                <th scope="row">{{$single->nomClient}}</th>
                <td>{{$single->prenomClient}}</td>
                <td>{{$single->adressClient}}</td>
                <td>{{$single->telClient}}</td>
                <td>
                    <button class="btn btn-warning col-sm-5">Modifier</button>
                    <button class="btn btn-primary col-sm-5" wire:click="$emit('seeMore',{{$single->id}})">Voir plus</button>                       
                    <button class="btn btn-danger col-sm-6">Desactiver</button>
                </td>
              </tr>
            @endforeach
        </tbody>
    </table>
</div>
