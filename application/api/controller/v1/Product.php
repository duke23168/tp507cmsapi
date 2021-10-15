<?php


namespace app\api\controller\v1;

use app\api\model\Product as ProductModel;
use app\api\validate\Count;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\ProductException;

class Product
{
    public function getRecent($count = 15)
    {
        (new Count())->goCheck();
        $products = ProductModel::getMostRecent($count);
        if ($products->isEmpty()) {
            throw new ProductException();
        }
        $products = $products->hidden(['summary']);
        return json($products);
    }

    public function getAllInCategory($id)
    {
        (new IDMustBePositiveInt())->goCheck(); //习惯地需要写模型方法了
        $products = ProductModel::getProductsByCategoryID($id);
        if ($products->isEmpty()) {
            throw new ProductException();
        }
        $products = $products->hidden(['summary']);
        return json($products);

    }

    /**
     * 获取商品详情
     * 如果商品详情信息很多，需要考虑分多个接口分布加载
     * @url /product/:id
     * @param int $id 商品id号
     * @return Product
     * @throws ProductException
     */
    public function getOne($id)
    {
        (new IDMustBePositiveInt())->goCheck();
        $product = ProductModel::getProductDetail($id);
        if (!$product) {
            throw new ProductException();   //如果抛出的错误提示，不对的话，可以在夸号里添加。
        }
        return $product;
    }

    public function createOne()
    {
        $product = new ProductModel();
        $product->save(
            [
                'id' => 1
            ]);
    }

    public function deleteOne($id)
    {
        ProductModel::destroy($id);
        //        ProductModel::destroy(1,true);
    }


}