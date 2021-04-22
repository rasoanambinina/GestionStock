
@extends('products.layout')
@section('content')
        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Laravel 7 CRUD </h2>
                        <a class="btn btn-success" href="{{ route('fournisseurs.create') }}"> Ajouter un Fournisseur</a>
                    </div>
                    <div class="pull-right">

                    </div>
                </div>
            </div>

    <table class="table table-striped">
        <tr>
            <th>No</th>
            <th>Reference</th>
            <th>Nom</th>
            <th>Adresse</th>
            <th width="280px">Action</th>
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

                    <a class="btn btn-info" href="{{ route('fournisseurs.show',$fournisseur->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('fournisseurs.edit',$fournisseur->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
      </div>

            {{--/ Affichage paginate num +5 --}}
          {{ $fournisseurs->links() }}
@endsection
