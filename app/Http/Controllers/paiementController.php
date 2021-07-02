<?php

namespace App\Http\Controllers;

use App\Models\paiement;
use Illuminate\Http\Request;

class paiementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paiement = paiement::all();
        return response()->json(
            $paiement
        , 200);
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
        $paiement = new paiement();
        $paiement->reste = $request->reste;
        $paiement->paye = $request->paye;
        $paiement->date_reglement = $request->date_reglement;
        $paiement->date_echenace = $request->date_echenace;
        $paiement->save();
        return response()->json('List saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    $k = paiement::select('id')->where('id_facture',$id)->first();

    $paiement = paiement::find($k);

    return response()->json($paiement);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function edit(paiement $paiement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $paiement = paiement::find($id);
        $paiement->reste = $request->reste;
        $paiement->paye = $request->paye;
        $paiement->date_reglement = $request->date_reglement;
        $paiement->date_echenace = $request->date_echenace;
        $paiement->save();
        return response()->json('List saved');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $paiement = paiement::find($id);
        $paiement->delete();
        return response()->json('deleted');
    }
}
