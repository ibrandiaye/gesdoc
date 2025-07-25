<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plateforme de Consultation de Documents</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Style personnalisé */
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://source.unsplash.com/random/1920x1080/?documents');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
        }

        .document-card {
            transition: transform 0.3s;
            height: 100%;
        }

        .document-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .category-badge {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        footer {
            background-color: #343a40;
            color: white;
        }

        .search-box {
            max-width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body data-bs-spy="scroll" data-bs-target="#navbar">



    <!-- Documents Section -->
    <section id="documents" class="py-5 bg-light">
        <div class="container">
            <form action="{{ route('byname') }}">
                @csrf
                <div class="section-header text-center mb-5">
                    <h2 class="fw-bold">COPINA</h2>
                    <p class="text-muted">Parcourez nos derniers documents ajoutés</p>
                </div>
                <div class="input-group mb-3">
                    <select class="form-control form-control-lg" name="nom" required>
                        <option value="">Rechercher par groupes d’affinités ou thématiques ...</option>
                        @foreach($categories as $key => $value)
                            <option value="{{ $value->id }}">{{ $value->nom }} ({{ $value->sigle }})</option>
                        @endforeach
                    </select>
{{--                     <input type="text" class="form-control form-control-lg" name="nom" placeholder="Rechercher un document...">
 --}}                    <button type="submit" class="btn btn-primary" type="button">
                        <i class="fas fa-search"></i> Rechercher
                    </button>
                </div>
            </form>
            <div class="row g-4">
                <!-- Document Card 3 -->
                @foreach ($fichiers as $fichier)
                    <div class="col-md-6 col-lg-4">
                        <div class="card document-card">
                            <div class="position-relative">
                                {{-- <img src="https://source.unsplash.com/random/600x400/?study" class="card-img-top" alt="Document"> --}}
                                <span class="badge bg-{{ $fichier->categorie->badge  }}  category-badge">{{ $fichier->categorie->sigle  }}</span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $fichier->nom }}</h5>
                                <p class="card-text text-muted">{{ $fichier->description }}.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">Ajouté le {{ $fichier->created_at }}</small>
                                    <a href="{{ asset('document/'.$fichier->document) }}" class="btn btn-sm btn-outline-primary" target="_blank">Consulter</a>
                                </div>
                            </div>
                        </div>
                </div>
                @endforeach


                <!-- Plus de documents peuvent être ajoutés ici -->
            </div>
{{--
            <div class="text-center mt-5">
                <a href="#" class="btn btn-primary btn-lg">
                    <i class="fas fa-book me-2"></i> Voir tous les documents
                </a>
            </div> --}}
        </div>
    </section>





    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
