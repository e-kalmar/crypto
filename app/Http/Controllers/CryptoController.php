<?php

namespace App\Http\Controllers;

use App\Models\Crypto;
use Illuminate\Http\Request;
use Codenixsv\CoinGeckoApi\CoinGeckoClient;
use App\Models\Favorites;
use Auth;

class CryptoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    protected $metaData = array();


    public function index()
    {
        $user_id = Auth::user()->id;
        $data = array();
        $client = new CoinGeckoClient();
        $coins_list = $client->coins()->getMarkets('usd');
        $coins_description = $client->coins();
        Crypto::truncate();

        foreach ($coins_list as $key => $coin) {
            $crypto = new Crypto();
            $crypto->rank = $coin['market_cap_rank'];
            $crypto->name = $coin['name'];
            $crypto->price = $coin['current_price'];
            $crypto->target  = 'USD';
            $crypto->image  = $coin['image'];
            $crypto->ath = $coin['ath'];
            $crypto->id_gecko = $coin['id'];
            $crypto->save();
            $key++;
        }
        
        $coins = Crypto::leftJoin('favorites', 'cryptos.name', '=', 'favorites.crypto_name')
                        ->select('cryptos.*', 'favorites.crypto_name')
                        ->paginate(25);
                        // var_dump(json_encode($coins));die;        
                            
        return view('admin.crypto.index', ['coins' => $coins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        var_dump($this->metaData);
//        $inputs = \request()->validate([
//            'rank',
//            'name',
//            'price',
//            'target',
//            'image',
//            'ath'
//        ]);
//
//        $crypto = new Crypto();
//
//
//
//
//        Crypto::create($inputs);
//
//        return redirect()->route('crypto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $crypto = Crypto::find($id);
        $client = new CoinGeckoClient();

        $coin_data = $client->coins()->getCoin($crypto->id_gecko);
        // $result = $client->coins()->getCoin($crypto->name);

        // var_dump($coin_data['description']['en']);die;
        return view('admin.crypto.show',['crypto'=>$crypto, 'description' => $coin_data['description']['en'], 'logo' => $crypto->image]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
