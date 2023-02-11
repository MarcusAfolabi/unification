<?php

namespace App\Http\Controllers;

// use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
// use App\Notifications\NewPostNotification;
// use Illuminate\Support\Facades\Notification;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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
            return view('products.indexAdmin', compact('products', 'recentpros'));
        } else {
            return view('products.index', compact('products', 'recentpros'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Product $product)
    {
        $product = Product::all();
        $role = Auth::user()->role;

        if ($role == 'admin') {
            return view('products.admin');
        }

        if ($product->where('user_id' === 'user_id')->count() <= 10) {
            return view('products.create');
        } else {
            return redirect(route('products.index'))->with('status', 'You can not add more than 10 product');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user = User::all();
        $request->validate([
            "name" => 'required|unique:products|max:255',
            "type" => 'required',
            "currency" => 'required',
            "price" => 'required',
            "category" => 'required',
            "stock" => 'required',
            "brand" => 'required',
            "image" => 'required',
            "image1" => 'required',
        ]);
        $name = $request->input('name');
        $slug = Str::slug($name, '-');
        $user_id = Auth::user()->id;
        $type = $request->input('type');
        $currency = $request->input('currency');
        $price = $request->input('price');
        $category = $request->input('category');
        $stock = $request->input('stock');
        $brand = $request->input('brand');
        $description = $request->input('description');

        $image = 'storage/' . $request->file('image')->store('productImages', 'public');
        $image1 = 'storage/' . $request->file('image1')->store('productImages', 'public');

        $product = new Product();
        $product->name = $name;
        $product->slug = $slug;
        $product->user_id = $user_id;
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
        // Notification::send($user, new NewPostNotification($product));

        return redirect(route('products.index'))->with('status', 'Product Created Successfully. We ensure it is valid before we publish');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        DB::table('products')->increment('views');
        $sideproducts = Product::latest()->take(10)->get();
        $sidepros = Product::latest()->take(10)->get();
        return view('products.show', compact('product', 'sideproducts', 'sidepros'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function status($id)
    {
        $product = Product::select('status')->where('id', '=', $id)->first();

        if ($product->status == '1') {
            $status = '0';
        } else {
            $status = '1';
        }

        $values = array('status' => $status);
        Product::where('id', $id)->update($values);

        return redirect()->back()->with('status', 'Status Updated');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
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
            "image" => 'required',
            "image1" => 'required',
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

        $image = 'storage/' . $request->file('image')->store('productImages', 'public');
        $image1 = 'storage/' . $request->file('image1')->store('productImages', 'public');

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('status', 'Product Delete Successfully.');
    }
}
