<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Config;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class productController extends Controller
{
    function __construct()
    {
        // $this->middleware('role_or_permission:Product access|Product create|Product edit|Product delete', ['only' => ['index']]);
        // $this->middleware('role_or_permission:Product create', ['only' => ['create','store']]);
        // $this->middleware('role_or_permission:Product edit', ['only' => ['edit','update']]);
        // $this->middleware('role_or_permission:Product delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::select('*');
        $products->orderBy('id', 'desc');
        $products = $products->paginate(8);
        return view('Backend.products.index', compact('products',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $configs = Config::all();
        return view('Backend.products.add', compact('configs','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($_REQUEST);
        $objproduct = new Product;
        $objproduct->name = $request->name;
        $objproduct->price = $request->price;
        $objproduct->category_id = $request->category_id;
        $objproduct->config_id = $request->config_id;
        $objproduct->quantity = $request->quantity;
        $objproduct->color = $request->color;
        $objproduct->description = $request->description;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extention;
            $file->move('assets/images/products/', $fileName);
            $objproduct->image = $fileName;
        }
        $objproduct->save();
        return redirect()->route('product.index')->with('message', ' product ' . $request->name . ' Addedd');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view(
            'Backend.products.show',
            ['product' => Product::findOrFail($id)]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('Backend.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->quantity = $request->quantity;
        $product->color = $request->color;
        $product->description = $request->description;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extention;
            $file->move('assets/images/products/', $fileName);
            $product->image = $fileName;
        }
        $product->save();
        return redirect()->route('product.index')->with('message', ' product ' . $request->name . ' Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $product = Product::findOrFail($id);
        $product->destroy($id);
    }
    public function trashed()
    {
        $products = Product::onlyTrashed()->get();
        return view('Backend.products.softdelete', compact('products'));
    }
    public function restore($id)
    {
        $products = Product::withTrashed()->find($id);
        try {
            $products->restore();
            return redirect()->route('products.trashed')->with('message', 'restore' . ' ' . $products->name . ' ' .  'success');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('products.trashed')->with('message', 'restore' . ' ' . $products->name . ' ' .  'error');
        }
        return view('Backend.products.softdelete', compact('products'));
    }
    public function forceDelete($id)
    {
        $products = Product::onlyTrashed()->findOrFail($id);
        try {
            $products->forceDelete();
            return redirect()->route('products.trashed')->with('message', 'delete' . ' ' . $products->name . ' ' .  'success');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('products.trashed')->with('message', 'delete ' . ' ' . $products->name . ' ' .  'error');
        }
        return view('Backend.products.softdelete', compact('products'));
    }
    public function getProducts($id){
        if($id!=0){
            $products = Category::find($id)->products()->select('id', 'name')->get()->toArray();
        }else{
            $products = Product::all()->toArray();
        }
        return response()->json($products);
    }
}
