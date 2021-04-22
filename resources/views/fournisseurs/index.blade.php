
@extends('products.layout')
@section('content')
        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <h2>Listes des fournisseurs</h2>
         <!--   <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Laravel 7 CRUD </h2>
                        <a class="btn info" href="{{ route('fournisseurs.create') }}"> Ajouter un Fournisseur</a>
                    </div>
                    <div class="pull-right">

                    </div>
                </div>
            </div> -->
            <button class="open-button" onclick="openForm()">Ajouter un fournisseur</button>
    <table class="">
        <tr>
            <th>No</th>
            <th>Reference</th>
            <th>Nom</th>
            <th>Adresse</th>
            <th >Action</th>
        </tr>
        @php $i =1; @endphp
        @foreach ($fournisseurs as $fournisseur)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $fournisseur->referenceFournisseur }}</td>
            <td>{{ $fournisseur->nom }}</td>
            <td>{{ $fournisseur->adresse }}</td>
            <td>
                <form action="{{ route('fournisseurs.destroy',$fournisseur->id) }}" method="POST">

                    <a class="btn success" href="{{ route('fournisseurs.show',$fournisseur->id) }}">Show</a>

                    <a class="btn default" href="{{ route('fournisseurs.edit',$fournisseur->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {{--/ Affichage paginate num +5 --}}
          {{ $fournisseurs->links() }}
      </div>

  

<div class="form-popup" id="myForm">
<form action="{{ route('fournisseurs.store') }}" method="POST" class="form-container">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Reference:</strong>
                <input type="text" name="referenceFournisseur" class="form-control" placeholder="Reference Fournisseur" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom:</strong>
                <input type="text" class="form-control" name="nom" placeholder="Nom Fournisseur" required>
            </div>
        </div>

         <div class="col-xs-12 col-sm-12 col-md-12">
             <div class="form-group">
                 <strong>Adresse:</strong>
                 <input type="text" class="form-control"  name="adresse" placeholder="Adresse Fournisseur">
             </div>
         </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn warning">Ajouter</button>                
             <button type="button" class="btn cancel" onclick="closeForm()">Fermer</button>
        </div>
    </div>

</form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>


@endsection
