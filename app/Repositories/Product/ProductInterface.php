<?php
namespace App\Repositories\Product;

interface ProductInterface
{
    public function getSlider($limit = 0);

    public function getSpecials($limit = 0);

    public function random($limit = 0);

    public function getTopRates($limit = 0);

    public function getOnSales($limit = 0);

    public function getHotDeal($limit = 0);

    public function getTopSells($limit = 0);

    public function getFeatures($limit = 0);

    public function getCarts();

    public function getReviews($id);

    public function addReview($id, $columns = ['*']);

    public function getRelatedProducts($category_id, $id);

    public function search($text);

    public function paginateProducts();
    
    public function getIdCarts();

    public function searchByCategory($request);
}
