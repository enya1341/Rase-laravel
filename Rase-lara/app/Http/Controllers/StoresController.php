<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoresController extends Controller
{

    public function storeget()
    {
            $items = DB::table('stores')->get();
            Log::debug($items);
            return response()->json([
                'message' => 'Store got successfully',
                'data' => $items
            ], 200);
            $items = DB::table('values')->get();


    }

    public function storedata($store_id)
    {
            $items = DB::table('stores')->where('id', $store_id)->get();
            return response()->json([
                'message' => 'Storedata got successfully',
                'data' => $items
            ], 200);
    }


    public function storeImagePost($store_id ,Request $request)
    {

        //見やすいので事前に定義しておく
        $disk = Storage::disk('s3');

        //postされてきた画像
        $image = $request->image;


        //putFileというのは、画像を保存して、その保存したパス（バケット以下を返してくれる関数、第一引数ディレクトリ名、第二引数画像データ、第３引数公開・非公開）
        $path = $disk->put("store", $image,'public');

        $databefore = DB::table('stores')->where('id', $store_id)->first();

        //$pathには保存してあるパスが返っていることがわかる
        //なのでデータベースに$pathを保存することで呼び出せるようになる
        $param = [
            'name' => $databefore->name,
            'region' => $databefore->region,
            'genre' => $databefore->genre,
            'overview' => $databefore->overview,
            'image' => $path
        ];
        // $databefore -> image = $path;

        // $databefore->save();

        DB::table('stores')->where('id', $store_id)->update($param);

        $dataafter = DB::table('stores')->where('id', $store_id)->first();

        $data = DB::table('stores')->get();


        return response()->json([
            'message' => 'Storeadmin store created successfully',
            'data' => $path,
            'storedata' => $data,
            'image' => $image,
            'request' => $databefore,
            'request2' => $dataafter,
        ], 200);
    }
    

    public function post(Request $request)
    {
        $param = [
            'name' => $request->name,
            'region' => $request->region,
            'genre' => $request->genre,
            'overview' => $request->overview,
            'image' => '1.jpg'
        ];
        DB::table('stores')->insert($param);
        $storedata = DB::table('stores')->where('name', $request->name)->where('overview', $request->overview)->get();
        $param_store = [
            "storeAdmin_store_id" => $storedata[0]->id,
        ];
        DB::table('users')->where('email', $request->email)->update($param_store);

        return response()->json([
            'message' => 'Storeadmin store created successfully',
            'data' => $storedata,
            'storedata' => $storedata[0]->id,
        ], 200);
    }

    public function put($store_id,Request $request)
    {
       

        $param = [
            'name' => $request->name,
            'region' => $request->region,
            'genre' => $request->genre,
            'overview' => $request->overview,
            'image' => '1.png'
        ];
        DB::table('stores')->where('id', $store_id)->update($param);
        $storedata = DB::table('stores')->where('id', $store_id)->get();
        return response()->json([
            'message' => 'Storeadmin store updated successfully',
            'data' => $storedata,
            'test' => $store_id,
            'request' => $request->file('image')
        ], 200);
    }

}
