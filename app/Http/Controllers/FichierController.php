<?php

namespace App\Http\Controllers;

use App\Models\Fichier;
use App\Repositories\CategorieRepository;
use App\Repositories\FichierRepository;
use Illuminate\Http\Request;

class FichierController extends Controller
{
       protected $fichierRepository;
       protected $categorieRepository;
    public function __construct(FichierRepository $fichierRepository,CategorieRepository $categorieRepository)
    {
        $this->fichierRepository = $fichierRepository;
        $this->categorieRepository = $categorieRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fichiers = $this->fichierRepository->getAll();
        $categories = $this->categorieRepository->getAll();
        return view('fichier.index',compact('fichiers','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $categories = $this->categorieRepository->getAll();
        return view ('fichier.add',compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
        'nom' => 'required',
        'description' => 'required',
        'categorie_id' => 'required',
        'doc' => 'required|mimes:pdf,doc,docx',
        ], );
        if($request->doc)
        {
            $imageName = time().'.'.$request->doc->extension();
            $request->doc->move(public_path('document'), $imageName);
            $request->merge(['document'=>$imageName]);
        }



        $fichier = $this->fichierRepository->store($request->all());
        return redirect('fichier');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $fichier = $this->fichierRepository->getById($id);
        return view('fichier.show',compact('fichier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = $this->categorieRepository->getAll();
        $fichier = $this->fichierRepository->getById($id);
        return view('fichier.edit',compact('fichier','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

         if($request->doc)
        {
            $this->validate($request, [
                'doc' => 'required|mimes:pdf,doc,docx',
                ] );
            $imageName = time().'.'.$request->doc->extension();
            $request->doc->move(public_path('document'), $imageName);
            $request->merge(['document'=>$imageName]);
        }
        $this->fichierRepository->update($id, $request->all());
        return redirect('fichier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->fichierRepository->destroy($id);
        return redirect('fichier');
    }

    public function getByName(Request $request)
    {
        $fichiers = $this->fichierRepository->getBCategorie($request->nom);
        $categories = $this->categorieRepository->getAll();
        return view('home',compact('fichiers','categories'));
    }

    public function allFichier()
    {
        $fichiers = $this->fichierRepository->getAll();
        $categories = $this->categorieRepository->getAll();
        return view('home',compact('fichiers','categories'));
    }
}
