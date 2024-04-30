<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GiftsController extends Controller
{

    public function gifts(){

        $allGifts = $this -> getGifts();

        return view('gifts.all-gifts', compact('allGifts'));
    }

    protected function getGifts(){
        //LEMBRAR DE IMPORTAR O DB!!
        $gifts = DB::table('gifts')
        ->select('gifts.*', 'users.name as usname')
        ->join('users', 'users.id', '=', 'gifts.user_id')
        ->get();

       // dd($gifts);

        return $gifts;
    }

    public function viewGift($id){

        $gift = DB::table('gifts') -> where('id', $id) -> first();

        return view('gifts.gift_view', compact('gift'));

    }

    public function deleteGift($id) {

        DB::table('gifts') -> where('id', $id) -> delete();

        //dd($id);
      return redirect() -> back();

      }
}
