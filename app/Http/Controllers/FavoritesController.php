<?php

namespace App\Http\Controllers;

use App\Models\Favorites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        // var_dump($v);die;
        // Favorites::where('crypto_name', $inputs['crypto_name'])->where('user_id', $user->id)
        $user = Auth::user();
        $inputs['user_id'] = $user->id;
        $inputs['crypto_name'] = $request->cryptoName;
        // $favExist = Favorites::where('crypto_name', $inputs['crypto_name'])->where('user_id', $user->id)->count();
        $favExist = Favorites::where([['crypto_name', $inputs['crypto_name']],['user_id', $user->id]])->count();

        if ( $favExist > 0 ) {
            Favorites::where('crypto_name', $inputs['crypto_name'])->where('user_id', $user->id)->delete();
        } else {
            Favorites::create($inputs);
        }
        // return ->with('message','Data added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function watchlist()
    {
        //
        $user = Auth::user();
        $favorites = Favorites::leftJoin('cryptos', 'favorites.crypto_name', '=', 'cryptos.name')
                                ->select('cryptos.*', 'favorites.crypto_name')
                                ->where('user_id', $user->id)->get();
        // echo $favorites;
        return view('admin.crypto.watchlist', ['favorites'=>$favorites]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
