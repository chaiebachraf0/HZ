<?php
namespace App\Http\Controllers;

use App\Models\client;
use App\Models\facture;
use App\Models\fournisseur;
use App\Models\product;
use Illuminate\Http\Request;
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
            $nomnbre_facture = facture::count(),
            $nomnbre_client = client::count(),
            $nomnbre_fournisseur = fournisseur::count(),


        ];

        return response()->json($List);  
    }
}
