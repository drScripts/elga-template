<?php

namespace App\Http\Controllers;

use App\Product;
use App\Version;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function __construct()
    {
    }

    /**
     * Get all products.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProducts()
    {
        $res = Product::get();

        return response()->json($res);
    }

    /**
     * Get product by id.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function getProductById($id)
    {
        $res = Product::find($id);

        if (!$res) {
            return response()->json([
                "message" =>  "product not found",
            ], 404);
        }


        return response()->json($res);
    }

    /**
     * Create product.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createProduct(Request $request)
    {
        $res = Product::create([
            "name" => $request->input("name"),
            "price" => $request->input("price"),
        ]);

        return response()->json($res);
    }

    /**
     * Update the given product.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProduct(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                "message" =>  "product not found",
            ], 404);
        }


        $product->update([
            "name" => $request->input("name"),
            "price" => $request->input("price")
        ]);

        $product = Product::find($id);


        return response()->json($product);
    }

    /**
     * Delete product by id.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteProduct($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                "message" =>  "product not found",
            ], 404);
        }

        $res = $product->delete();

        return response()->json($res);
    }





    /**
     * Get all version.
     *
     * @return \Illuminate\Http\Response
     */
    public function getVersions()
    {
        $res = Version::get();

        return response()->json($res);
    }

    /**
     * Get version by id.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function getVersionById($id)
    {
        $res = Version::find($id);

        if (!$res) {
            return response()->json([
                "message" =>  "version not found",
            ], 404);
        }


        return response()->json($res);
    }

    /**
     * Create version.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createVersion(Request $request)
    {
        $res = Version::create([
            "version" => $request->input("version"),
        ]);

        return response()->json($res);
    }

    /**
     * Update the given product.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function updateVersion(Request $request, $id)
    {
        $version = Version::find($id);

        if (!$version) {
            return response()->json([
                "message" =>  "version not found",
            ], 404);
        }


        $version->update([
            "name" => $request->input("name"),
            "price" => $request->input("price")
        ]);

        $version = Version::find($id);


        return response()->json($version);
    }

    /**
     * Delete version by id.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteVersion($id)
    {
        $version = Version::find($id);

        if (!$version) {
            return response()->json([
                "message" =>  "vers$version not found",
            ], 404);
        }

        $res = $version->delete();

        return response()->json($res);
    }
}
