<?php

namespace springimport\yii2\magento2\activeapi\models\QuoteCartItemRepository;

//use yii2tech\embedded\ContainerInterface;
//use yii2tech\embedded\ContainerTrait;
//use springimport\yii2\magento2\activeapi\components\ActiveApi;
use yii\base\Model;

class CartItem extends Model
{
    public $sku;
    public $qty;
    public $price;
    public $quote_id;

    public function rules()
    {
        return [
            [
                ['sku', 'qty', 'quote_id'], 'required',
            ],
            [
                ['price'], 'safe',
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'sku' => 'SKU',
            'qty' => 'Qty',
            'price' => 'Price',
            'quote_id' => 'Quote ID',
        ];
    }
}
