<?php

namespace springimport\yii2\magento2\activeapi\models;

use springimport\yii2\magento2\activeapi\components\ActiveApi;
use springimport\yii2\magento2\activeapi\models\QuoteCartItemRepository\CartItem;
use yii2tech\embedded\ContainerInterface;
use yii2tech\embedded\ContainerTrait;

class QuoteCartItemRepository extends ActiveApi implements ContainerInterface
{

    use ContainerTrait;
    const SCENARIO_GET_CARTS_ITEMS    = 'getCartsItems';
    const SCENARIO_POST_CARTS_ITEMS   = 'postCartsItems';
    const SCENARIO_DELETE_CARTS_ITEMS = 'deleteCartsItems';

    public $cart_item;

    public function rules()
    {
        return [
            [
                'cart_item', 'required',
            ],
            [
                'cart_item', 'yii2tech\embedded\Validator',
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'cart_item' => 'Cart item',
        ];
    }

    public function scenarios()
    {
        return [
            self::SCENARIO_GET_CARTS_ITEMS => [],
            self::SCENARIO_POST_CARTS_ITEMS => ['cart_item'],
            self::SCENARIO_DELETE_CARTS_ITEMS => [],
        ];
    }

    public function urls()
    {
        return [
            self::SCENARIO_GET_CARTS_ITEMS => 'carts/%s/items',
            self::SCENARIO_POST_CARTS_ITEMS => 'carts/%s/items',
            self::SCENARIO_DELETE_CARTS_ITEMS => 'carts/%s/items/%s',
        ];
    }

    public function embedCart_item()
    {
        return $this->mapEmbedded(
        'cart_item', CartItem::className(), ['unsetSource' => false]
        );
    }
}
