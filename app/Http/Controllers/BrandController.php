<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;


class BrandController extends Controller
{

    public function index(): Response
    {
      $products = Product::all();

      return response(view('brand', ['brands' => $brands]));

    }


    public function create(): Response
    {
        return response(view('brands.create'));
    }


    public function store(StoreBrandRequest $request): RedirectResponse
    {
      if (Brand::create($request->validated())) {
          return redirect(route('index'))->with('success', 'Added!');
      }

    }


    public function edit(string $id): Response
    {
      $brand = Brand::findOrFail($id);

      return response(view('brands.edit', ['brand' => $brand]));
    }


    public function show($id)
    {
        //
    }


  public function update(UpdateBrandRequest $request, string $id): RedirectResponse
  {
      $product = Product::findOrFail($id);

      if ($product->update($request->validated())) {
          return redirect(route('index'))->with('success', 'Updated!'); 
      }
  }


  public function destroy(string $id): RedirectResponse
  {
      $product = Product::findOrFail($id);

      if ($product->delete()) {
          return redirect(route('index'))->with('success', 'Deleted!');
      }

      return redirect(route('index'))->with('error', 'Sorry, unable to delete this!');
  }

}
