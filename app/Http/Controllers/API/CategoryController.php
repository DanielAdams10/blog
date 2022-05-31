<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * To get all category data
     *
     * @author  DanielAdams
     * @create  26/05/2022
     * @return  Response object
    */
    public function index()
    {
        // DB::beginTransaction();

        $categories = Category::get(); // get object

        if($categories->isNotEmpty()) {
            return response()->json(['status' => 'OK', 'data' => $categories], 200);
        } else {
            return response()->json(['status' => 'NG', 'message' => 'Data is not found!'], 200);
        }
    }

    /**
     * To create category data
     *
     * @author  DanielAdams
     * @create  26/05/2022
     * @param   Request $request
     * @return  Response object
    */
    public function store(Request $request)
    {
        //insert data
        $insert = [
            'category_name' => $request->name,
            'created_emp' => $request->login_id,
            'updated_emp' => $request->login_id,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        //connect with database
        DB::beginTransaction();

        #get existing data
        $data = Category::where('category_name', $request->name)->get();

        if($data->isEmpty()) { //new category name is not same with existing one
            try {
                Category::insert($insert);

                DB::commit();

                return response()->json(['status' => 'OK', 'message' => 'Insert successfully'], 200);
            } catch (Exception $e) {
                DB::rollback();
                Log::debug($e->getMessage());;

                return response()->json(['status' => 'NG', 'message' => 'Fail to insert'], 200);
            }
        } else { //new category name is same with existing one
            return response()->json(['status' => 'NG', 'message' => 'Existing category name!!',], 200);
        }


    }

    /**
     * To get select data
     *
     * @author  DanielAdams
     * @create  26/05/2022
     * @param   $id
     * @return  Response object
    */
    public function show($id)
    {
        $category = Category::where('id', $id)->get()->toArray(); //get array

        if(!empty($category)) {
            return response()->json(['status' => 'OK', 'data' => $category], 200);
        } else {
            return response()->json(['status' => 'NG', 'message' => 'Data is not found!'], 200);
        }
    }

    /**
     * To update select data
     *
     * @author  DanielAdams
     * @create  26/05/2022
     * @param   Request $request $id
     * @return  Response object
    */
    public function update(Request $request, $id)
    {
        $update = [
            'category_name' => $request->name,
            'created_emp' => $request->login_id,
            'updated_emp' => $request->login_id,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        DB::beginTransaction();

        #get existing data
        $data = Category::where('category_name', $request->name)->get();
        $data_id = Category::where('id', $id)->get();

        if($data_id->isNotEmpty()) {
            if($data->isEmpty()) {
                try {
                    Category::where('id', $id)->update($update);
                    DB::commit();

                    return response()->json(['status' => 'OK', 'message' => 'Update successfully!'], 200);
                } catch (Exception $e) {
                    DB::rollBack();
                    Log::debug($e->getMessage());

                    return response()->json(['status' => 'NG', 'message' => 'Fail to update'], 200);
                }
            } else { //new category name is same with existing one
                return response()->json(['status' => 'NG', 'message' => 'Existing category name!!',], 200);
            }
        } else { //new category name is same with existing one
            return response()->json(['status' => 'NG', 'message' => 'Data is not found!!'], 200);
        }

    }

    /**
     * To delete select data
     *
     * @author  DanielAdams
     * @create  26/05/2022
     * @param   $id
     * @return  Response object
    */
    public function destroy($id)
    {
        DB::beginTransaction();
        $data = Category::where('id', $id)->get();

        if($data->isNotEmpty()) {
            try {
                Category::where('id', $id)->delete();
                DB::commit();

                return response()->json(['status' => 'OK', 'message' => 'Delete successfully!'], 200);
            } catch (Exception $e) {
                DB::rollBack();
                Log::debug($e->getMessage());

                return response()->json(['status' => 'NG', 'message' => 'Fail to delete'], 200);
            }
        } else { //new category name is same with existing one
            return response()->json(['status' => 'NG', 'message' => 'Data is not existing!!',], 200);
        }


    }
}
