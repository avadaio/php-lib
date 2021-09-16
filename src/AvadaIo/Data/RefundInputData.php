<?php

namespace AvadaIo\Data;

class RefundInputData
{
    /**
     * @var numeric
     */
    public $id;

    /**
     * @var numeric
     */
    public $order_id;

    /**
     * @var string
     */
    public $order_status_url;


    /**
     * @var OrderCustomerData
     */
    public $customer;

    /**
     * @var CheckoutLineItem
     */
    public $line_items;

    /**
     * @var string
     */
    public $currency;

    /**
     * @var mixed
     */
    public $created_at;

    /**
     * @var mixed
     */
    public $updated_at;
}