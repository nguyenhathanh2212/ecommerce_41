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
}
