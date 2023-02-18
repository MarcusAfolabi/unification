<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }
    public function index(Request $request)
    {
        if ($request->products) {
            $products = Product::where('position', 'like', '%' . $request->product . '%')
                ->orWhere('company', 'like', '%' . $request->product . '%')->latest()->paginate(30);
        } else {
            $products = Product::latest()->paginate(30);
        }
        $recentpros = Product::all();
        $role = Auth::user()->role;

        if ($role == 'admin') {
            return view('products.list', compact('products', 'recentpros'));
        } else {
            $my_products = Product::select('id', 'name', 'price', 'type', 'image', 'currency', 'slug')->where('user_id', auth()->user()->id)->latest()->get();
            return view('products.index', compact('my_products', 'recentpros'));
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => 'required|unique:products|max:255',
            "type" => 'required',
            "currency" => 'required',
            "price" => 'required|numeric|min:0',
            "category" => 'required',
            "stock" => 'required|string',
            "brand" => 'required',
            "image" => 'required|image|max:2048',
            "image1" => 'required|image|max:2048',
        ]);

        $product = Product::create([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name'), '-'),
            'user_id' => Auth::user()->id,
            'type' => $request->input('type'),
            'currency' => $request->input('currency'),
            'price' => $request->input('price'),
            'category' => $request->input('category'),
            'stock' => $request->input('stock'),
            'brand' => $request->input('brand'),
            'description' => $request->input('description'),
            'image' => 'storage/' . $request->file('image')->store('productImages', 'public'),
            'image1' => 'storage/' . $request->file('image1')->store('productImages', 'public'),
        ]);

        return redirect(route('products.index'))->with('status', 'Product Created Successfully. We ensure it is valid before we publish');
    }

    public function show(Product $product)
    {
        DB::table('products')->increment('views');
        $sideproducts = Product::latest()->take(10)->get();
        $sidepros = Product::latest()->take(10)->get();
        return view('products.show', compact('product', 'sideproducts', 'sidepros'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            "name" => 'required|max:255',
            "type" => 'required',
            "currency" => 'required',
            "price" => 'required',
            "category" => 'required',
            "stock" => 'required',
            "brand" => 'required',
            "image" => 'sometimes|image',
            "image1" => 'sometimes|image',
        ]);

        $name = $request->input('name');
        $slug = Str::slug($name, '-');
        $type = $request->input('type');
        $currency = $request->input('currency');
        $price = $request->input('price');
        $category = $request->input('category');
        $stock = $request->input('stock');
        $brand = $request->input('brand');
        $description = $request->input('description');

        $image = '';
        if ($request->hasFile('image')) {
            $image = 'storage/' . $request->file('image')->store('productImages', 'public');
        }

        $image1 = '';
        if ($request->hasFile('image1')) {
            $image1 = 'storage/' . $request->file('image1')->store('productImages', 'public');
        }

        $product->name = $name;
        $product->slug = $slug;
        $product->type = $type;
        $product->currency = $currency;
        $product->price = $price;
        $product->category = $category;
        $product->stock = $stock;
        $product->brand = $brand;
        $product->description = $description;
        $product->image = $image;
        $product->image1 = $image1;

        $product->save();

        return redirect(route('products.index'))->with('status', 'Product Updated Successfully. We ensure it is valid before we publish');
    }
    public function destroy(Product $product)
    {
        // Delete the associated image files from storage
        Storage::disk('public')->delete([
            str_replace('storage/', '', $product->image),
            str_replace('storage/', '', $product->image1),
        ]);

        // Delete the product record from the database
        $product->delete();
        return redirect()->back()->with('status', 'Product Delete Successfully.');
    }
}
