<?php

namespace App\Http\Controllers\Ecommerce;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Product\ProductInterface;
use App\Repositories\Comment\CommentInterface;
use Exception;
use Auth;
use App\Http\Requests\Ecommerce\ReviewRequest;
use Session;

class ProductController extends Controller
{
    protected $productRepository;
    protected $commentRepository;

    public function __construct(ProductInterface $productRepository, CommentInterface $commentRepository)
    {
        $this->productRepository = $productRepository;
        $this->commentRepository = $commentRepository;
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
            $product = $this->productRepository->findOrFail($id);
            $relatedProducts = $this->productRepository->getRelatedProducts($product->category_id, $id);
            $reviews = $this->productRepository->getReviews($id);
            $comments = $this->commentRepository->getComments($id);

            $histories = Session::has('histories') ? Session::get('histories') : [];
            $histories[$product->id] = $product;

            if(count($histories) > config('setting.topSell')) {
                array_shift($histories);
            }

            Session::put('histories', $histories);

            return view('ecommerce.product.index', compact('product', 'relatedProducts', 'reviews', 'comments'));
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

    public function showReview(Request $request)
    {
        try {
            $reviews = $this->productRepository->getReviews($request->id);

            return view('ecommerce.product.contentreview', compact('reviews'));
        } catch (Exception $e) {
            return trans('lang.error');
        }
    }

    public function addReview(ReviewRequest $request)
    {
        try {
            $review = $request->only('content', 'rate');
            $this->productRepository->addReview($request->id, $review);
            $reviews = $this->productRepository->getReviews($request->id);

            return view('ecommerce.product.contentreview', compact('reviews'));
        } catch (Exception $e) {
            return trans('lang.error');
        }
    }
}
