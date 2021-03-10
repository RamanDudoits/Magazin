<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use Bitrix\Sale,
    Bitrix\Sale\Basket;

use Bitrix\Main\Engine\Contract\Controllerable;

Bitrix\Main\Loader::includeModule("sale");
Bitrix\Main\Loader::includeModule("catalog");

class CBuyOneClick extends CBitrixComponent implements Controllerable
{
    /**
     * @return array
     */
    public function configureActions()
    {
        return [
            'buyOneClick' => [
                'prefilters' => [],
                'postfilters' => [],
            ],
        ];
    }

    public function executeComponent()
    {
        $this->includeComponentTemplate();
//        $this->buyBasketAction();
    }

    public function buyProductAction ($phone,  $id_element)
    {
        global $USER;
        $error = array();

        if ($phone == "")
        {
            array_push($error, "Пожалуйста, укажите свой номер.");
            return [
                'error' => $error,
            ];
        }

        if (preg_match('/^(\+)?(\(\d{2,3}\) ?\d|\d)(([ \-]?\d)|( ?\(\d{2,3}\) ?)){5,12}\d$/' , $phone ) == 0)
        {
            array_push($error, "Некорректно указан номер.");
            return [
                'error' => $error,
            ];
        }

        $productProperty = \Bitrix\Catalog\PriceTable::getList([
            "select" => ["*", "ELEMENT.NAME"],
            "filter" => [
                "=PRODUCT_ID" =>$id_element ,
            ],
        ])->fetch();

        $products = array(
            array('PRODUCT_ID' => $productProperty["PRODUCT_ID"],
                'NAME' => $productProperty["CATALOG_PRICE_ELEMENT_NAME"],
                'PRICE' => $productProperty["PRICE"],
                'CURRENCY' => $productProperty["CURRENCY"],
                'QUANTITY' => 1)
        );

        $basket = Bitrix\Sale\Basket::create(SITE_ID);

        foreach ($products as $product)
        {
            $item = $basket->createItem("catalog", $product["PRODUCT_ID"]);
            unset($product["PRODUCT_ID"]);
            $item->setFields($product);
        }

        $order = Bitrix\Sale\Order::create(SITE_ID, $USER->GetID());
        $order->setPersonTypeId($USER->GetID());
        $order->setBasket($basket);

        $shipmentCollection = $order->getShipmentCollection();
        $shipment = $shipmentCollection->createItem(
            Bitrix\Sale\Delivery\Services\Manager::getObjectById(1)
        );

        $shipmentItemCollection = $shipment->getShipmentItemCollection();

        foreach ($basket as $basketItem)
        {
            $item = $shipmentItemCollection->createItem($basketItem);
            $item->setQuantity($basketItem->getQuantity());
        }

        $paymentCollection = $order->getPaymentCollection();
        $payment = $paymentCollection->createItem(
            Bitrix\Sale\PaySystem\Manager::getObjectById(1)
        );

        $payment->setField("SUM", $order->getPrice());
        $payment->setField("CURRENCY", $order->getCurrency());

        $propertyCollection = $order->getPropertyCollection();

        $phoneProp = $propertyCollection->getPhone();
        $phoneProp->setValue($phone);

        $result = $order->save();
        if (!$result->isSuccess())
        {
            $result->getErrors();
        }

        return [
            'error' => $error,
        ];
    }

    public function buyBasketAction ($phone)
    {
        global $USER;
        $error = array();

        if ($phone == "")
        {
            array_push($error, "Пожалуйста, укажите свой номер.");
            return [
                'error' => $error,
            ];
        }

        if (preg_match('/^(\+)?(\(\d{2,3}\) ?\d|\d)(([ \-]?\d)|( ?\(\d{2,3}\) ?)){5,12}\d$/' , $phone ) == 0)
        {
            array_push($error, "Некорректно указан номер.");
            return [
                'error' => $error,
            ];
        }
        $basket = Sale\Basket::loadItemsForFUser(Sale\Fuser::getId(),
            "s1");

        $order = Bitrix\Sale\Order::create(SITE_ID, $USER->GetID());
        $order->setPersonTypeId($USER->GetID());
        $order->setBasket($basket);

        $shipmentCollection = $order->getShipmentCollection();
        $shipment = $shipmentCollection->createItem(
            Bitrix\Sale\Delivery\Services\Manager::getObjectById(1)
        );

        $shipmentItemCollection = $shipment->getShipmentItemCollection();

        foreach ($basket as $basketItem)
        {
            $item = $shipmentItemCollection->createItem($basketItem);
            $item->setQuantity($basketItem->getQuantity());
        }

        $paymentCollection = $order->getPaymentCollection();
        $payment = $paymentCollection->createItem(
            Bitrix\Sale\PaySystem\Manager::getObjectById(1)
        );

        $payment->setField("SUM", $order->getPrice());
        $payment->setField("CURRENCY", $order->getCurrency());

        $propertyCollection = $order->getPropertyCollection();

        $phoneProp = $propertyCollection->getPhone();
        $phoneProp->setValue($phone);

        $result = $order->save();
        if (!$result->isSuccess())
        {
            $result->getErrors();
        }
        return [
            'error' => $error,
        ];


    }
}
