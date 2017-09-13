<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
	/**
	 * @SWG\Get(
	 *   path="/product",
	 *   summary="Get all products",
	 *   operationId="getProducts",
	 *   @SWG\Response(response=200, description="Success"),
	 * )
	 */
    public function index()
    {
        return Product::all();
    }

	/**
	 * @SWG\Post(
	 *   path="/product",
	 *   summary="Add a product",
	 *   operationId="addProduct",
	 *   @SWG\Parameter(
	 *     name="name",
	 *     in="formData",
	 *     description="Product name",
	 *     required=true,
	 *     type="string"
	 *   ),
	 *   @SWG\Parameter(
	 *     name="description",
	 *     in="formData",
	 *     description="Product description",
	 *     required=true,
	 *     type="string"
	 *   ),
	 *   @SWG\Response(response=200, description="Success"),
	 * )
	 */
    public function store(Request $request)
    {
        $product = Product::create($request->all());

        return $product;
    }

	/**
	 * @SWG\Get(
	 *   path="/product/{id}",
	 *   summary="Get product by id",
	 *   operationId="getProduct",
	 *   @SWG\Parameter(
	 *     name="id",
	 *     in="path",
	 *     description="Product id.",
	 *     required=true,
	 *     type="integer"
	 *   ),
	 *   @SWG\Response(response=200, description="Success"),
	 *   @SWG\Response(response=404, description="No record")
	 * )
	 */
    public function show(Product $product)
    {
        return $product;
    }

	/**
	 * @SWG\Put(
	 *   path="/product/{id}",
	 *   summary="Update a product",
	 *   operationId="updateProduct",
	 *   @SWG\Parameter(
	 *     name="id",
	 *     in="path",
	 *     description="Product id.",
	 *     required=true,
	 *     type="integer"
	 *   ),
	 *   @SWG\Parameter(
	 *     name="name",
	 *     in="formData",
	 *     description="Product name",
	 *     required=false,
	 *     type="string"
	 *   ),
	 *   @SWG\Parameter(
	 *     name="description",
	 *     in="formData",
	 *     description="Product description",
	 *     required=false,
	 *     type="string"
	 *   ),
	 *   @SWG\Response(response=200, description="Success"),
	 * )
	 */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
    }

	/**
	 * @SWG\Delete(
	 *   path="/product/{id}",
	 *   summary="Delete product by id",
	 *   operationId="deleteProduct",
	 *   @SWG\Parameter(
	 *     name="id",
	 *     in="path",
	 *     description="Product id.",
	 *     required=true,
	 *     type="integer"
	 *   ),
	 *   @SWG\Response(response=200, description="Success"),
	 *   @SWG\Response(response=404, description="No record")
	 * )
	 */
    public function destroy(Product $product)
    {
        $product->delete();
    }
}
