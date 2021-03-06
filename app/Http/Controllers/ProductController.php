<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    protected $request;
    protected $repository;

    public function __construct(Request $request, Product $product)
    {
        $this->request = $request;
        $this->repository = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(20);

        return view('index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->only('name', 'description', 'price');

        //Product::create($product);        

        if($request->hasFile('image') && $request->image->isValid())
        {
            $imagePath = $request->image->store('products');

            $data['image'] = $imagePath;
        }

        $this->repository->create($data);

        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
                
        if(!$product = $this->repository->find($id))
        {
            return redirect()->back();
        }

        return view('show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$product = $this->repository->find($id))
        {
            return redirect()->back();
        }

        return view('edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        if(!$product = $this->repository->find($id))
        {
            return redirect()->back();
        }

        $data = $request->all();

        if($request->hasFile('image') && $request->image->isValid())
        {
            if($product->image && Storage::exists($product->image))
            {
                Storage::delete($product->image);
            }
            $imagePath = $request->image->store('products');

            $data['image'] = $imagePath;
        }

        $product->update($data);

        //return redirect()->route('products.show', $product->id);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                
        if(!$product = $this->repository->find($id))
        {
            return redirect()->back();
        }

        if($product->image && Storage::exists($product->image))
        {
            Storage::delete($product->image);
        }

        $product->delete();

        return redirect()->route('products.index');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $products = $this->repository->search($request->filter);

        return view('index', ['products' => $products, 'filters' => $filters]);
    }
}
