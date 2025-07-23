@extends('welcome')
@section('title', '| fichier')


@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">

                                <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}" >ACCUEIL</a></li>
                                <li class="breadcrumb-item active ">LISTE DES fichierS</li>

                                </ol>
                            </div>
                              Gestion fichier

                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif


    @if ($errors->has('licence'))
        <div class="alert alert-danger">
            {!!  $errors->first('licence') !!}</a>
        </div>
    @endif

<div class="col-12">
    <div class="card ">
        <div class="card-header">
            LISTE DES fichierS
            <div class="float-right">
                <a href="{{ route('fichier.create') }}" class="btn btn-primary">Ajouter un fichier</a>
            </div>
        </div>
            <div class="card-body">

                <table id="datatable-buttons" class="table table-bordered table-responsive-md table-striped text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Categorie</th>
                            <th>NOM </th>
                            <th>Description</th>
                            <th>Document</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($fichiers as $fichier)
                        <tr>
                            <td>{{ $fichier->id }}</td>
                            <td><span class="badge badge-{{ $fichier->categorie->badge }}">{{ $fichier->categorie->nom}}</span></td>
                            <td>{{ $fichier->nom}}</td>
                             <td>{{ $fichier->description}}</td>
                            <td><a href="{{ asset('document/'.$fichier->document) }}" class="logo-large">Voir fichier</a></td>

                            <td>

                                <a href="{{ route('fichier.edit', $fichier->id) }}" role="button" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <form method="POST"
                                    action="{{ route('fichier.destroy', $fichier->id) }}"
                                    style="display:inline;"
                                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>


                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
    </div>
</div>

@endsection
