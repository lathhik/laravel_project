<?php

namespace App\Http\Controllers;

use App\Models\BlogApi;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function index()
    {

    }

    public function insert(Request $request)
    {
//        $data = [];
//        $data['title'] = $request->title;
//        $data['summary'] = $request->summary;
//        $data['details'] = $request->details;
//
//        return $data;

//        return $request->all();

        $insertData = $request->all();

        //1// Method one using DB Facade -- Insert data into table --

//        if (DB::table('blog_api', $insertData)->insert($insertData)) {
//            return response()->json(['status' => true, 'msg' => 'Data was added']);
//        }
//        return response()->json(['status' => false, 'msg' => 'Failed to add data']);

        //2// Method two using Eloquent -- '''''' --

        if (BlogApi::create($insertData)) {
            return response()->json(['status' => true, 'msg' => 'Data was inserted']);
        }
        return \response()->json(['status' => false, 'msg' => 'Failed to insert data']);

    }

    public function select()
    {
        //--- Using DB Facade --//
//        return DB::table('blog_api')->get();

        // --- Using Eloquent -- //
        return \response()->json(BlogApi::all());
    }

    public function update(Request $request, $id)
    {
        $id = (int)$id;
        if (BlogApi::where(['id' => $id])->update($request->all())) {
            return \response()->json(['status' => true, 'msg' => 'Data was updated']);
        }
        return \response()->json(['status' => false, 'msg' => 'Failed to update']);
    }

    public function delete($id)
    {
        $id = (int)$id;
        if (BlogApi::where(['id' => $id])->delete()) {
            return \response()->json(['status' => true, 'msg' => 'Data was deleted']);
        }
        return \response()->json(['status' => false, 'msg' => 'Failed to delete data']);
    }

}
