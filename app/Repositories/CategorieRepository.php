<?php
namespace App\Repositories;

use App\Models\Categorie;
use Illuminate\Support\Facades\DB;

class CategorieRepository extends RessourceRepository{

    public function __construct(Categorie $categorie)
    {
        $this->model = $categorie;
    }




}
