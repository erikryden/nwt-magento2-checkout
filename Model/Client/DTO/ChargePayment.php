<?php
namespace Svea\Checkout\Model\Client\DTO;


use Svea\Checkout\Model\Client\DTO\Order\OrderRow;

class ChargePayment extends AbstractRequest
{

    /**
     * Required
     * @var float $amount
     */
    protected $amount;

    /**
     * Required
     * @var $items OrderRow[]
     */
    protected $items;
    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return ChargePayment
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }


    /**
     * @return OrderRow[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param OrderRow[] $items
     * @return ChargePayment
     */
    public function setItems($items)
    {
        $this->items = $items;
        return $this;
    }




    public function toJSON()
    {
        return json_encode($this->toArray());
    }

    public function toArray()
    {
        $items = [];
        if (!empty($this->getItems())) {
            foreach ($this->getItems() as $item) {
                $items[] = $item->toArray();
            }
        }

        return [
            'amount' => $this->getAmount(),
            'orderItems' => $items,
        ];
    }


}