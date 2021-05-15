<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Items;

class ItemController extends Controller
{

    public function index(Request $request)
    {

        return Items::all();
    }

    public function selectOne($id)
    {

        return Items::findOrFail($id);
    }

    public function add(Request $request)
    {

        $this->validate($request,[

            'baslik' => "required",
            'icerik' => "required",
            'durum' => 'required'

        ]);

        $input = $request->all();
        Items::create($input);

        return response()->json([

            'res' => true,
            'message' => "Başarıyla Eklendi."

        ]);



    }

    public function update($id, Request $request)
    {

        $this->validate($request,[

            'baslik' => "required",
            'icerik' => "required",
            'durum' => 'required'

        ]);

        $input = $request->all();
        $veri = Items::find($id);
        $veri->update($input);

        return response()->json([

            'res' => true,
            'message' => "Başarıyla Güncellendi."

        ]);


    }
      
    public function delete($id)
    {
        Items::destroy($id);
        return response()->json([

            'res' => true,
            'message' => "Başarıyla Silindi."

        ]);

    }
}
