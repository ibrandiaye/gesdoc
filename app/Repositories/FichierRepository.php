<?php
namespace App\Repositories;

use App\Models\Fichier;
use Illuminate\Support\Facades\DB;

class FichierRepository extends RessourceRepository{

    public function __construct(Fichier $fichier)
    {
        $this->model = $fichier;
    }

    public function getByNom($nom)
    {
        return Fichier::with("categorie")
        ->where("nom","like","%".$nom."%")
        ->get();
    }


}
