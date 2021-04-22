
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
                        <a class="btn btn-success" href="{{ route('materiels.create') }}"> Ajouter un materiel</a>
                    </div>
                    <div class="pull-right">

                    </div>
                </div>
            </div>
            <br>

            <br>

    <table class="table table-striped">
        <tr>
            <th>No</th>
            <th>Reference</th>
            <th>Nom</th>
            <th width="280px">Action</th>
        </tr>
        @php $i =1; @endphp
        @foreach ($materiels as $materiel)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $materiel->referenceMateriel }}</td>
            <td>{{ $materiel->nom }}</td>
            <td>
                <form action="{{ route('materiels.destroy',$materiel->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('materiels.show',$materiel->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('materiels.edit',$materiel->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
            {{--/ Affichage paginate num +5 --}}
          {{ $materiels->links() }}
    </div>
@endsection
