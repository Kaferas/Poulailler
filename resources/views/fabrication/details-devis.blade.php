@extends("layouts.template")

@section("value")
<h4 class="text-center m-4"><i>Materiels Utilises par la Commande</i></h4>
    <h2 class="text-center text text-primary mb-4">Details Devis</h2>
    <table class="table text-center">
        <thead>
          <tr class="text text-primary">
            <th scope="col">Article</th>
            <th scope="col">Materiel</th>
            <th scope="col">Montant</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($details as $detail)
          <tr>
            <th scope="row">{{$loop->index+1}}</th>
            <td>{{$detail->nomMateriel}}</td>
            <td>{{$detail->montantMateriel}} F</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <h1 class="text text-success text-center">Total Besoin: {{$details->sum('montantMateriel')}} FBU</h1>
@endsection
