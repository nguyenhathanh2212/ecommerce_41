<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductInterface;
use App\Repositories\Category\CategoryInterface;
use App\Repositories\Picture\PictureInterface;
use App\Repositories\Comment\CommentInterface;
use App\Traits\ProcessPicture;
use App\Http\Requests\Admin\ProductRequest;
use Exception;
use Auth;
use DB;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    use ProcessPicture;

    protected $productRepository;
    protected $categoryRepository;
    protected $pictureRepository;
    protected $commentRepository;

    public function __construct(
        ProductInterface $productRepository,
        CategoryInterface $categoryRepository,
        PictureInterface $pictureRepository,
        CommentInterface $commentRepository
    ) {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->pictureRepository = $pictureRepository;
        $this->commentRepository = $commentRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $products = $this->productRepository->paginateProducts();
            
            return view('admin.product.index', compact('products'));
        } catch (Exception $e) {
            return view('templates.admin.404');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $parentCategries = $this->categoryRepository->getIdParents();
            $subCategries = $this->categoryRepository->getIdFirstSubCategories($this->categoryRepository->getParents()->first()->id);

            return view('admin.product.add', compact('parentCategries', 'subCategries'));
        } catch (Exception $e) {
            return view('templates.admin.404');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $product = $request->only(
                    'category_id',
                    'name',
                    'preview',
                    'description',
                    'quanlity',
                    'price',
                    'discount_percent'
                );
                $product['user_id'] = Auth::user()->id;
                $product['status'] = config('setting.true');
                $newProduct = $this->productRepository->create($product);
                $namePictures = $this->storePictureProduct($request, $newProduct->id);
                $newProduct->pictures()->createMany($namePictures);
            });

            return redirect()->route('admin.product.index')->with('success', trans('lang.addSuccess'));
        } catch (Exception $e) {
            return redirect()->route('admin.product.index')->with('error', trans('lang.addError'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        try {
            DB::transaction(function () use ($id) {
                $product = $this->productRepository->findOrFail($id);
                $product->users()->detach();
                $product->comments()->delete();
                $product->pictures()->delete();
                $product->delete();
            });

            return redirect()->route('admin.product.index')->with('success', trans('lang.delSuccess'));
        } catch (Exception $e) {
            return redirect()->route('admin.product.index')->with('error', trans('lang.delError'));
        }
    }

    public function search(Request $request)
    {
        try {
            $products = $this->productRepository->search($request->text);
            
            return view('admin.product.contentindex', compact('products'));
        } catch (Exception $e) {
            return trans('lang.notFound');
        }
    }

    public function paginate(Request $request)
    {
        try {
            if ($request->text) {
                $products = $this->productRepository->search($request->text);
            } else {
                $products = $this->productRepository->paginateProducts();
            }
            
            return view('admin.product.contentindex', compact('products'));
        } catch (Exception $e) {
            return trans('lang.notFound');
        }
    }

    public function getSubCategories(Request $request)
    {
        try {
            $subCategries = $this->categoryRepository->getSubCategories($request->parentId)->pluck('name', 'id');

            return [
                'subCategries' => $subCategries,
            ];
        } catch (Exception $e) {
            return trans('lang.notFound');
        }
    }

    public function delete(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                foreach ($request->idProducts as $id) {
                    $this->productRepository->findOrFail($id)->users()->detach();
                }
                $this->commentRepository->whereIn('product_id', $request->idProducts)->delete();
                $this->pictureRepository->whereIn('product_id', $request->idProducts)->delete();
                $this->productRepository->whereIn('id', $request->idProducts)->delete();
            });

            $request->session()->flash('success', trans('lang.delSuccess'));
        } catch (Exception $e) {
            $request->session()->flash('error', trans('lang.delError'));
        }
    }

    public function createImportFile()
    {
        try {
            $parentCategries = $this->categoryRepository->getIdParents();
            $subCategries = $this->categoryRepository->getIdFirstSubCategories($this->categoryRepository->getParents()->first()->id);

            return view('admin.product.addfile', compact('parentCategries', 'subCategries'));
        } catch (Exception $e) {
            return view('templates.admin.404');
        }
    }

    public function importFile(Request $request){

        try {
            if (!$request->has('file')) {
                throw new Exception();                    
            }
            
            DB::transaction(function () use ($request) {
                Excel::load($request->file, function($reader) {

                    foreach ($reader->toArray() as $row) {
                        $row['user_id'] = Auth::user()->id;

                        if (!$this->categoryRepository->find($row['category_id'])) {
                            $category['name'] = $row['name'];
                            $category['parent_id'] = config('setting.num0');
                            $category = $this->categoryRepository->create($category);
                            $row['category_id'] = $category->id;
                        }

                        $this->productRepository->create($row);
                    }
                });
            });

            return redirect()->route('admin.product.index')->with('success', trans('lang.addSuccess'));
        } catch (Exception $e) {
            return redirect()->route('admin.product.index')->with('error', trans('lang.addError'));
        }    

    } 
}
