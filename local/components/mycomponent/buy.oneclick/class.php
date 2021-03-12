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
            'buyProduct' => [
                'prefilters' => [],

            ],
            'buyBasket' => [
                'prefilters' => [],

            ],
        ];
    }

    public function executeComponent()
    {
        if ($this->arParams["OBJECT_COMPONENT"] == "Y")
        {
            $objCom = "catalog";
        } else $objCom = "basket";
        $this->arParams["ACTION"] = $objCom;
        $this->includeComponentTemplate();
    }

    public function buyProductAction ($phone,  $id_element)
    {
        $products = [
            ['PRODUCT_ID' => $id_element,
                'PRODUCT_PROVIDER_CLASS' => '\Bitrix\Catalog\Product\CatalogProvider',
                'QUANTITY' => 1]
        ];

        $basket = Bitrix\Sale\Basket::create(SITE_ID);

        foreach ($products as $product)
        {
            $item = $basket->createItem("catalog", $product["PRODUCT_ID"]);
            unset($product["PRODUCT_ID"]);
            $item->setFields($product);
        }

        $result = $this->createOrder($basket, $phone);
        return $result;
    }

    public function buyBasketAction ($phone)
    {
        $basket = Sale\Basket::loadItemsForFUser(Sale\Fuser::getId(),
            SITE_ID);

        $result = $this->createOrder($basket, $phone);
        return $result;
    }


    public function createOrder($basket, $phone)
    {
        $error = array();
        $deliveryId = 3;
        $paySystem = 1;


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

        $order = Bitrix\Sale\Order::create(SITE_ID, Sale\Fuser::getId());

        $personTypeid = $order->getPersonTypeId();
        if (!isset($personTypeid))
            {
                $personTypeid = 1;
            } else $personTypeid = 0;
        $order->setPersonTypeId($personTypeid);
        $order->setBasket($basket);

        $shipmentCollection = $order->getShipmentCollection();
        $shipment = $shipmentCollection->createItem(
            Bitrix\Sale\Delivery\Services\Manager::getObjectById($deliveryId)
        );
        $shipmentItemCollection = $shipment->getShipmentItemCollection();

        foreach ($basket as $basketItem)
        {
            $item = $shipmentItemCollection->createItem($basketItem);
            $item->setQuantity($basketItem->getQuantity());
        }

        $paymentCollection = $order->getPaymentCollection();
        $payment = $paymentCollection->createItem(
            Bitrix\Sale\PaySystem\Manager::getObjectById($paySystem)
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
