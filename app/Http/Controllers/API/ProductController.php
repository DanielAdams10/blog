<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

/**
 * After overtime request list
 *
 * @author  DanielAdams
 * @create  25/05/2022
 */

class ProductController extends Controller
{
    /**
     * To create product data
     *
     * @author  DanielAdams
     * @create  25/05/2022
     * @param   Request $request
     * @return  Response object
     */
    public function create(Request $request)
    {
        $insert = [
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
            'created_emp' => $request->login_id,
            'updated_emp' => $request->login_id,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        DB::beginTransaction();
        $products =Product::where('name', $request->name)->exists();

        if($products) {
            return response()->json(['status' => 'NG', 'message' => 'Product name is already taken!'], 200);
        } else {
            try {
                #save products table
                Product::insert($insert);

                DB::commit();
                return response()->json(['status' => 'OK', 'message' => 'Created successfully'], 200);
            } catch (Exception $e) {
                DB::rollBack();
                Log::debug($e->getMessage());
                return response()->json(['status' => 'NG', 'message' => 'Fail to save!'], 200);
            }
        }

    }

    /**
     * To get all product data
     *
     * @author  DanielAdams
     * @create  25/05/2022
     * @return  Response object
    */

    public function index()
    {
        #get all data from `products` table
        $products = Product::get();
        // dd($products);

        #check products is exists or not
        if(!empty($products)) {
            return response()->json(['status' => 'OK', 'data' => $products], 200);
        } else {
            return response()->json(['status' => 'NG', 'message' => 'Data is not found!'], 200);
        }
    }

    /**
     * To update selected data
     *
     * @author  DanielAdams
     * @create  26/05/2022
     * @param   Request $request, $id
     * @return  Response object
    */

    public function update(Request $request, $id)
    {
        $update = [
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
            'updated_emp' => $request->login_id,
            'updated_at' => now(),
        ];

        DB::beginTransaction();

        $product_exists = Product::where('id', $id)->exists();
        $product_name = Product::where('name', $request->name)->get();

        if($product_exists) {
            if($product_name->isEmpty()) {
                try {
                    Product::where('id', $id)->update($update);
                    DB::commit();

                    return response()->json(['status'=> 'OK', 'message' => 'Update Successful!'], 200);
                } catch (Exception $e){
                    DB::rollback();
                    Log::debug($e->getMessage());

                    return response()->json(['status' => 'NG', 'message' => 'Fail to update!'], 200);
                }
            } else {
                return response()->json(['status' => 'NG', 'message' => 'Product name is already existing!'], 200);
            }
        } else {
            return response()->json(['status' => 'NG', 'message' => 'Data is not found!'], 200);
        }
    }

    /**
     * To delete selected data
     *
     * @author  DanielAdams
     * @create  26/05/2022
     * @param   $id
     * @return  Response object
    */
    public function delete($id)
    {
        DB::beginTransaction();
        $products = Product::where('id',$id)->get();


        if($products->isNotEmpty()) {
            try {
                Product::where('id', $id)->delete();
                DB::commit();

                return response()->json(['status' => 'OK', 'message' => 'Delete successfully!'], 200);
            } catch (Exception $e) {
                DB::rollBack();
                Log::debug($e->getMessage());

                return response()->json(['status' => 'NG', 'message' => 'Fail to delete!'], 200);
            }
        } else {
            return response()->json(['status' => 'NG', 'message' => 'Data is not found!'], 200);
        }
    }

    public function view($id) {
        $product = Product::where('id', $id)->get();

        if($product->isNotEmpty()) {
            return response()->json(['status' => 'OK', 'message' => $product ], 200);
        } else {
            return response()->json(['status' => 'NG', 'message' => 'Data not found!1'], 200);
        }
    }
}
