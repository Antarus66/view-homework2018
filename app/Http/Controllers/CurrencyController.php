<?php

namespace App\Http\Controllers;

use App\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // пусть сами имплементят это функционал
        $currencies = Currency::all();

        return view('currency-market', [
            'currencies' => $currencies,
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // пусть сами имплементят это функционал
        $currency = Currency::find($id);
        $lots = $currency->lots;

        return view('currency', [
            'currency' => $currency,
            'lots' => $lots,
        ]);
    }
}
