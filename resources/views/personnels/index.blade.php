
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
                <a class="btn btn-success" href="{{ route('personnels.create') }}"> Ajouter un Personnel</a>
            </div>
            <div class="pull-right">

            </div>
        </div>

    </div>
            <br/>
    <table class="table table-striped">
        <tr>
            <th>No</th>
            <th>Reference</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Numéro CIN</th>
            <th>Téléphone</th>
            <th>Adresse</th>
            <th>Fonction</th>
            <th width="280px">Action</th>
        </tr>
        @php $i =1; @endphp
        @foreach ($personnels as $personnel)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $personnel->referencePersonnel }}</td>
            <td>{{ $personnel->nom }}</td>
            <td>{{ $personnel->prenom }}</td>
            <td>{{ $personnel->numCIN }}</td>
            <td>{{ $personnel->telephone }}</td>
            <td>{{ $personnel->adresse }}</td>
            <td>{{ $personnel->fonction }}</td>
            <td>
                <form action="{{ route('personnels.destroy',$personnel->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('personnels.show',$personnel->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('personnels.edit',$personnel->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
            {{--/ Affichage paginate num +5 --}}
          {{ $personnels->links() }}
    </div>
@endsection
