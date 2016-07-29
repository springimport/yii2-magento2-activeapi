<?php

namespace springimport\yii2\magento2\activeapi\models\QuoteGuestCartItemRepository;

use yii2tech\embedded\ContainerInterface;
use yii2tech\embedded\ContainerTrait;
use springimport\yii2\magento2\activeapi\components\ActiveApi;
use springimport\yii2\magento2\activeapi\components\ArrayableTrait;

class CartItem extends \yii\base\Model //ActiveApi //implements ContainerInterface
{

    //use ContainerTrait;
    use ArrayableTrait;
    public $item_id;
    public $qty;
    public $quote_id;
    public $sku;
    public $price;

    public function rules()
    {
        return [
            [
                ['qty', 'sku', 'quote_id'], 'required',
            ],
            [
                ['item_id', 'price'], 'safe',
            ],
        /* [
          'entity_id', 'yii2tech\embedded\Validator'
          ], */
        ];
    }

    public function attributeLabels()
    {
        return [
            'item_id' => 'Item ID',
            'qty' => 'Qty',
            'quote_id' => 'Quote ID',
            'sku' => 'SKU',
            'price' => 'Price',
        ];
    }
    /* public function embedCustomer()
      {
      return $this->mapEmbedded(
      'entity_id', Magento2ApiARTest2::className(), ['unsetSource' => false]
      );
      } */
}
