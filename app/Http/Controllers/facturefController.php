<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\facturef;
use App\Models\fournisseur;
use App\Models\ListProductAchat;
use App\Models\product;

class facturefController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function DetailsFournisseurs($id){
        $fournisseur = fournisseur::find($id);
        return response()->json($fournisseur);
    }
    public function DetailsProduits($id){
        $product = product::find($id);
        $List=[
            $product->name,
            $product->TVA,
            $product->pricev,
            $product->typetaxe
        ];
        return response()->json($List);
    }
    public function cherchefournisseur($id){

/*         $fournisseur= Fournisseur::where('id', '=', $id)->first();
 *//*         return   $fournisseur = DB::table('Fournisseur')->where('id', '=', $id)->get();
 */
 /*       if(DB::table('Fournisseur')->where('id',$id)->exists()){
        $fournisseur = DB::table('Fournisseur')->where('id', $id)->first();
        dd($fournisseur->NAME);
        return $fournisseur->NAME;
      } */
/*             $query = DB::table('Fournisseur')->select('Name');
 */

/*              return $fournisseur= Fournisseur::where('id', '=', $id)->first();
 */
    }
    public function chercheproduit($id){

/*         if(DB::table('Produit')->where('id',$id)->exists()){
            $produit = DB::table('Produit')->where('id', $id)->first();
            $List=[
                $produit->Libellé,
                $produit->TVA,
                $produit->PRIX_VENTE
            ];
            dd($List);
            return $List;


    } */
    }


/* public function calcul_tva(){
 *//*     $this->produit = new Produit();
 */
   // $tva =Produit::pluck('TVA', 'id')->all();
   // $ht = Produit::pluck('PRIX_ACHAT','id')->all();

/*    $prduit = Produit::all();

   foreach($prduit as $p){
       $calcul = $p->TVA * $p->PRIX_ACHAT;
       echo($calcul);
       echo ('<br>');
       return response()->json(
        $calcul
    , 200);

   } */

/*     dd($calcul);
 */
/* }
 */

    public function index()
    {
       // $Facture = Facture::with(relations:'getFournisseur')->get();
        //dd($Facture);

            $facturef = facturef::all();
            return response()->json(
                $facturef
            , 200);

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $facturef = new facturef();
        $facturef->id_fournisseur = $request->id_fournisseur;
        $facturef->Ref_Facture = $request->Ref_Facture;
        $facturef->Montant_TTC = $request->Montant_TTC;
        $facturef->Montant_TVA = $request->Montant_TVA;
        $facturef->Etat = $request->Etat;
        $facturef->Total_HT = $request->Total_HT;
        $facturef->date_echeance = $request->date_echeance;
        // $facture->quantite_entre = $request->quantite_entre;
        $facturef->Nom_fournisseur = $request->Nom_fournisseur;
        $facturef->note = $request->note;
        $facturef->Timbre_fiscale = $request->Timbre_fiscale;
        // $facture->Libelle = $request->Libelle;
        $facturef->date_creation = $request->date_creation;
        // $facture->Taxe_Applique = $request->Taxe_Applique;
        // $facture->ListProduct = $request->ListProduct;
/*         $facture->ListProduct = [];
 */
        $facturef->save();
        foreach ($request->ListProduct as $prod) {
            $listproduct = new ListProductAchat();
            $listproduct->quantite=$prod["quantite"];
            $listproduct->Libelle=$prod["Libelle"];
            $listproduct->id_product=$prod["id_product"];
            $listproduct->id_facture=$facturef->id;
            $listproduct->save();
        }
        return response()->json('Facture saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $facturef = facturef::find($id);
        return response()->json($facturef);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facturef = facturef::find($id);
        return response()->json($facturef);
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
        $facturef = facturef::find($id);
        $facturef->id_fournisseur = $request->id_fournisseur;
        $facturef->Ref_Facture = $request->Ref_Facture;
        $facturef->id_product = $request->id_product;
        $facturef->Montant_TTC = $request->Montant_TTC;
        $facturef->Montant_TVA = $request->Montant_TVA;
        $facturef->Etat = $request->Etat;
        $facturef->Total_HT = $request->Total_HT;
        $facturef->date_echeance = $request->date_echeance;
        $facturef->quantite_entre = $request->quantite_entre;
        $facturef->Nom_fournisseur = $request->Nom_fournisseur;
        $facturef->note = $request->note;
        $facturef->Timbre_fiscale = $request->Timbre_fiscale;
        $facturef->Libelle = $request->Libelle;
        $facturef->date_creation = $request->date_creation;
        $facturef->Taxe_Applique = $request->Taxe_Applique;
        $facturef->save();
        return response()->json('Facture updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facturef = facturef::find($id);
        $facturef->delete();
        return response()->json('deleted');
    }

   /* public function getfacturedata (Request $request, $id){

        $facturesdetails = Facture::where('id', $id)->first();
        if(isset($facturesdetails)) {
            return response()->json([
                'status' =>true,
                'message' => 'sucess',
                'company'     => $facturesdetails,
            ], 200);
        } else {
            return response()->json([
                'status' =>false,
                'message' => 'can \'t find a registered company',
            ], 400);
        }
    }*/
}
