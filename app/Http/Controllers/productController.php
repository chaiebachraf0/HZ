<?php
namespace App\Http\Controllers;

use App\Models\client;
use App\Models\commandeachat;
use App\Models\commandeclients;
use App\Models\facture;
use App\Models\facturef;
use App\Models\fournisseur;
use App\Models\paiement;
use App\Models\product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    public function getProducts(){
        return response()->json(product::all(), 200);
    }
    public function getProductById($id){
        $product = product::find($id);
        if(is_null($product)){
            return response()->json(['message'=>'Product Not Found'],404);
        }
        return response()->json($product, 200);
    }
    public function AddProduct(Request $request){
        $product = product::create($request->all());
        return response($product,201);
    }
    public function updateProduct(Request $request,$id){
        $product = product::find($id);
        if(is_null($product)){
            return response()->json(['message'=>'Product Not Found'],404);
        }
        $product->update($request->all());
        return response()->json($product, 200);
    }
    public function deleteProduct(Request $request,$id){
        $product = product::find($id);
        if(is_null($product)){
            return response()->json(['message'=>'Product Not Found'],404);
        }
        $product->delete();
        return response()->json(null, 204);
    }
    public function nombreproduits(){
        $List=[
            $nomnbre_produit = product::count(),
            $nomnbre_facturef = facturef::count(),
            $nomnbre_fournisseur = fournisseur::count(),
            $nomnbre_client = client::count(),
            $nomnbre_facturec= facture::count(),
           /*  $nomnbre_commandef= commandeachat::count(),
            $nomnbre_commandec= commandeclients::count(), */


        ];
        return response()->json($List);
    }


    public function dashbord(){


        $anne=Carbon::now()->addDay(365)->format('Y-m-d');
        $mois= Carbon::now()->addDay(30)->format('Y-m-d');

        $semaine= Carbon::now()->addDay(7)->format('Y-m-d');
        $today= Carbon::now()->format('Y-m-d');

        $fact000 = DB::table('factures')->where([
            ['date_creation', '>=',$today],
            ['date_creation', '<=',$anne]
    
        ])
        ->get();
        $fva=[];
        $sommea=0;
        foreach($fact000 as $e){

           $sommea+= $e->Montant_TTC ;
        
           
       }
       array_push($fva,$sommea);

           $fact001 = DB::table('facturefs')->where([
            ['date_creation', '>=',$today],
            ['date_creation', '<=',$anne]
    
        ])
        ->get();
        $faa=[];
        $sommeaa=0;
        foreach($fact001 as $e){

           $sommeaa+= $e->Montant_TTC ;
        
           
       }
       array_push($faa,$sommeaa);




        $fact00 = DB::table('factures')->where([
            ['date_creation', '>=',$today],
            ['date_creation', '<=',$mois]
    
        ])
        ->get();
        $fvm=[];
        $sommeak=0;
        foreach($fact00 as $e){

           $sommeak+= $e->Montant_TTC ;
        
           
       }
       array_push($fvm,$sommeak);

           $fact01 = DB::table('facturefs')->where([
            ['date_creation', '>=',$today],
            ['date_creation', '<=',$mois]
    
        ])
        ->get();
        $fam=[];
        $sommean=0;
        foreach($fact01 as $e){

           $sommean+= $e->Montant_TTC ;
        
           
       }
       array_push($fam,$sommean);

        
        $fact0 = DB::table('factures')->where([
            ['date_creation', '>=',$today],
            ['date_creation', '<=',$semaine]
    
        ])
        ->get();
        $fvs=[];
        $sommeab=0;
        foreach($fact0 as $e){

           $sommeab+= $e->Montant_TTC ;
        
           
       }
       array_push($fvs,$sommeab);



           $fact1 = DB::table('facturefs')->where([
            ['date_creation', '>=',$today],
            ['date_creation', '<=',$semaine]
    
        ])
        ->get();
        $fas=[];
        $sommeac=0;
        foreach($fact1 as $e){

           $sommeac+= $e->Montant_TTC ;
        
           
       }
       array_push($fas,$sommeac);




     
     
         $fact2 = DB::table('facturefs')->where
            ('date_creation', '=', $today)
     
         
      
         ->get();
         $faj=[];
         $sommeal=0;
         foreach($fact2 as $e){

            $sommeal+= $e->Montant_TTC ;
         
            
        }
        array_push($faj,$sommeal);


         $fact3 = DB::table('factures')->where
            ('date_creation', '=', $today)
    
    
     
        ->get();
        $fvj=[];
        $sommev=0;
        foreach($fact3 as $e){

           $sommev+= $e->Montant_TTC ;
        
           
        }
        array_push($fvj,$sommev);
          
         return response()->json(array($fvj,$fvs,$fvm,$fva,$faj,$fas,$fam,$faa));
            

 
} 

public function dashbordfacture(){

    $nomnbre_facturea = facturef::count();
    $nomnbre_facturev = facture::count();
    $nombrefactachatpaye = DB::table('facturefs')->where('Etat', '=','payé')->get()->count(); 
    $nombrefactventepaye = DB::table('factures')->where('Etat', '=','payé')->get()->count(); 
    $nombrefactachatnonpaye = DB::table('facturefs')->where('Etat', '=','non payé')->get()->count(); 
    $nombrefactventenonpaye = DB::table('factures')->where('Etat', '=','non payé')->get()->count(); 
    $nombrefactachatppaye = DB::table('facturefs')->where('Etat', '=','patiellement payé')->get()->count(); 
    $nombrefactventeppaye = DB::table('factures')->where('Etat', '=','patiellement payé')->get()->count(); 
   

    $factt0 = DB::table('facturefs')->get();
    $factatotal=[];
    $sommea=0;
    foreach($factt0 as $e){

       $sommea+= $e->Montant_TTC ;
    
       
   }
   //facture achat total
   array_push($factatotal,$sommea);

   $factv2p = DB::table('factures')->get();
   $factvtotal=[];
   $sommev=0;
   foreach($factv2p as $e){

      $sommea+= $e->Montant_TTC ;
   
      
  }
  //facture vente total
  array_push($factvtotal,$sommev);
 
  


   
   $facta2p = DB::table('facturefs')->where
  ('Etat', '=','payé')->get(); 
  $sommep=0;
  $factapaye=[];
  foreach($facta2p as $e){

     $sommep+= $e->Montant_TTC ;
  
     
 }
 //facture dachat payé total
 array_push($factapaye,$sommep);


 $factv2p = DB::table('factures')->where
 ('Etat', '=','payé')->get(); 
 $sommep=0;
 $factvpaye=[];
 foreach($factv2p as $e){

    $sommep+= $e->Montant_TTC ;
 
    
}
 //facture vente payé total

array_push($factvpaye,$sommep);


/* $factv2np = DB::table('factures')->where
('Etat', '=','payé')->get(); 
$sommep=0;
foreach($factv2np as $e){
    
    $sommep+= $e->Montant_TTC ;
    
    
} */




/*   $pai= DB::table('paiements')->where('id_facture', $id)->get();
*/
$factvnpaye=[];

/* $k = facturef::select('Montant_TTC')->where('Etat','=','non payé')->get();
 */
$k = DB::table('facturefs')->where
  ('Etat', '=','non payé')->get(); 

/*   $paiement = paiement::find($k);
 */
  $sommep=0;
  foreach($k as $e){

    $sommep+= $e->Montant_TTC;
 
    
}
 array_push($factvnpaye,$sommep);
 

/*   return response()->json($sommep,200);
 */

  
$factanpaye=[];

/* $k = facturef::select('Montant_TTC')->where('Etat','=','non payé')->get();
 */
$k = DB::table('factures')->where
  ('Etat', '=','non payé')->get(); 

/*   $paiement = paiement::find($k);
 */
  $sommep=0;
  foreach($k as $e){

    $sommep+= $e->Montant_TTC;
 
    
}
 array_push($factanpaye,$sommep);
 return response()->json(array($factanpaye,$factvnpaye,$factapaye,$factvpaye,$factatotal,$factvtotal, $nomnbre_facturea,$nomnbre_facturev,$nombrefactachatpaye,$nombrefactventepaye,$nombrefactachatnonpaye,$nombrefactventenonpaye,$nombrefactachatppaye,$nombrefactventeppaye));
 

 

}

public function endette(){
    $fournisseur = DB::table('fournisseurs')->get();

    

/*     return response()->json($k,200);
 */

}




}
