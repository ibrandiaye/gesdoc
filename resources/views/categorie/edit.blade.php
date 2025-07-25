{{-- \resources\views\permissions\create.blade.php --}}
@extends('welcome')

@section('title', '| Modifier Département')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">ACCUEIL</a></li>
                        <li class="breadcrumb-item active">Modifier un categorie</li>


                        </ol>
                    </div>
                     Gestion Document

                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <form method="POST" action="{{ route('categorie.update', $categorie->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
             <div class="card ">
                        <div class="card-header text-center">FORMULAIRE DE MODIFICATION D'UN categorie</div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @endif
                                @endif
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nom </label>
                                            <input type="text" name="nom"  value="{{ $categorie->nom }}" class="form-control"required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Sigle </label>
                                            <input type="text" name="sigle"  value="{{ $categorie->sigle }}" class="form-control"required>
                                        </div>
                                    </div>
                                         <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Badge</label>
                                            <select class="form-control" name="badge" required="">
                                            <option value=""  >Selectionner</option>
                                            <option value="success" {{ $categorie->badge=="success" ? "selected" : " "  }}>success</option>
                                            <option value="warning" {{ $categorie->badge=="warning" ? "selected" : " "  }}>warning</option>
                                            <option value="danger" {{ $categorie->badge=="danger" ? "selected" : " "  }}>danger</option>
                                              <option value="info" {{ $categorie->badge=="info" ? "selected" : " "  }}>info</option>
                                            <option value="primary" {{ $categorie->badge=="primary" ? "selected" : " "  }}>primary</option>
                                        </select>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <div class="row float-right ">

                                    <button type="submit" class="btn btn-primary btn btn-lg "> MODIFIER</button>
                                </div>


                            </div>
                        </div>
        </form>


@endsection

