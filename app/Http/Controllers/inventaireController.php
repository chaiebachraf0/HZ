<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\inventaire;
use App\Models\productinv;
use Illuminate\Http\Request;
class inventaireController extends Controller
{
    public function DetailsProduits($id){
        $product = product::find($id);
        $List=[
            $product->name,
            $product->Enstock,
        ];
        return response()->json($List);
    }
    public function index()
    {
            $inventaire = inventaire::all();
            return response()->json(
                $inventaire
            , 200);
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inventaire = new inventaire();
        $inventaire->id_product = $request->id_product;
        $inventaire->Nom_product = $request->Nom_product;
        $inventaire->note = $request->note;
        $inventaire->Enstock = $request->Enstock;
        $inventaire->quanaj = $request->quanaj;
        $inventaire->date_creation = $request->date_creation;
        // $facture->Taxe_Applique = $request->Taxe_Applique;
        // $facture->ListProduct = $request->ListProduct;
        /*$facture->ListProduct = []; */
            $inventaire->save();
            foreach ($request->ListProduct as $prod) {
            $listproduct = new productinv();
            $listproduct->Enstock=$prod["Enstock"];
            $listproduct->Libelle=$prod["Libelle"];
            $listproduct->id_product=$prod["id_product"];
            $listproduct->save();
        }
        return response()->json('Inventaire enregistré');
    }
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventaire = inventaire::find($id);
        return response()->json($inventaire);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventaire = inventaire::find($id);
        return response()->json($inventaire);
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
        $inventaire = inventaire::find($id);
        $inventaire->id_product = $request->id_product;
        $inventaire->Nom_product = $request->Nom_product;
        $inventaire->note = $request->note;
        $inventaire->Enstock = $request->Enstock;
        $inventaire->quanaj = $request->quanaj;
        $inventaire->date_creation = $request->date_creation;
        $inventaire->save();
        return response()->json('Inventaire updated');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventaire = inventaire::find($id);
        $inventaire->delete();
        return response()->json('deleted');
    }
}
