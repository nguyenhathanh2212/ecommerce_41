<?php

namespace App\Http\Controllers\Ecommerce;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryInterface;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $category = $this->categoryRepository->findOrFail($id);
            $products = $this->categoryRepository->getProducts($id, config('setting.num10'));

            return view('ecommerce.category.index', compact('category', 'products'));
        } catch (Exception $e) {
            return view('templates.ecommerce.404');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeViewMode(Request $request)
    {
        try {
            $products = $this->categoryRepository->getProducts($request->id, $request->number, $request->order);

            if ($request->mode == config('setting.list')) {
                return view('ecommerce.category.grid', compact('products'));
            } else {
                return view('ecommerce.category.list', compact('products'));
            }
        } catch (Exception $e) {
            return trans('lang.notFound');
        }
    }

    public function showBy(Request $request)
    {
        try {
            $products = $this->categoryRepository->getProducts($request->id, $request->number, $request->order);

            if ($request->mode == config('setting.list')) {
                return view('ecommerce.category.list', compact('products'));
            } else {
                return view('ecommerce.category.grid', compact('products'));
            }
        } catch (Exception $e) {
            return trans('lang.notFound');
        }
    }
}
