<?php

class Product
{

    public $productArray = array(
        "Rogutės" => array(
            'id' => '1',
            'name' => 'Medinės rogutės be atlošo',
            'code' => '3DcAM01',
            'image' => 'product-images/rogutes.jpg',
            'price' => '25.00'
        ),
        "Dviratis" => array(
            'id' => '2',
            'name' => 'Vyriškas dviratis Prophete',
            'code' => '55dff',
            'image' => 'product-images/dviratis.jpg',
            'price' => '800.00'
        ),
        "Šokoladas" => array(
            'id' => '3',
            'name' => 'Šokoladas su karamele, 15g',
            'code' => 'FF44Wo',
            'image' => 'product-images/sokoladas.jpg',
            'price' => '1.25'
        ),
         "Kava" => array(
            'id' => '4',
            'name' => 'Kavos pupelės Lavazza "Qualita Rossa", 1kg',
            'code' => 'dddS5',
            'image' => 'product-images/kava.jpg',
            'price' => '18.00'
        ),
         "Arbata" => array(
            'id' => '5',
            'name' => 'Žalioji arbata „Gunpowder Green Tea“, 15 vnt.',
            'code' => '55eEW8',
            'image' => 'product-images/arbata.jpg',
            'price' => '4.80'
        ),
          "Makaronai" => array(
            'id' => '6',
            'name' => 'Makaronai "Donna Vera" Fusilli, 450g',
            'code' => 'MAK55r',
            'image' => 'product-images/makaronai.jpg',
            'price' => '0.80'
        ),
          "Plytelės" => array(
            'id' => '7',
            'name' => 'Akmens masės plytelės Montana NELYGI, 30 x 30 cm',
            'code' => 'MASPLYT5',
            'image' => 'product-images/plyteles.jpg',
            'price' => '13.90'
        ),
         "Klijai" => array(
            'id' => '8',
            'name' => 'Plytelių klijai Ceresit CM11, 5 kg',
            'code' => 'MASPLYT5',
            'image' => 'product-images/klijai.jpg',
            'price' => '2.90'
        ),
    );

    public function getAllProduct()
    {
        return $this->productArray;
    }
}
