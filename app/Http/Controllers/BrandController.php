<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreBrandRequest; 
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use App\Models\Product;


class BrandController extends Controller
{

    public function index(): Response
    {
        $brands = Brand::all(); 
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


    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('brands.edit', compact('brand'));
    }


    public function show($id)
    {
        //
    }


  public function update(Request $request, $id)
  {
      $request->validate([
          'name' => 'required|string|max:255',
      ]);

      $brand = Brand::findOrFail($id);
      $brand->update($request->all());

      return redirect()->route('brands.index')->with('success', 'Brand updated successfully');
  }


  public function destroy($id)
  {
      $brand = Brand::findOrFail($id);
      if ($brand->delete()) {
          return redirect()->route('brands.index')->with('success', 'Brand deleted successfully');
      } else {
          return redirect()->route('brands.index')->with('error', 'Failed to delete brand');
      }
  }


}






