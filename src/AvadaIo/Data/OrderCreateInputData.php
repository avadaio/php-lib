<?php

namespace AvadaIo\Data;

class OrderCreateInputData
{
    /**
     * @var numeric
     */
    public $id;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $status;

    /**
     * @var OrderCustomerData
     */
    public $customer;

    /**
     * @var mixed
     */
    public $created_at;

    /**
     * @var mixed
     */
    public $updated_at;

    /**
     * @var ShipLineItem
     */
    public $line_items;

    /**
     * @var string
     */
    public $order_status_url;

    /**
     * @var string
     */
    public $total_price;


    /**
     * @var string
     */
    public $shipping_price;

    /**
     * @var string
     */
    public $gateway;

    /**
     * @var string
     */
    public $subtotal_price;

    /**
     * @var string
     */
    public $total_tax;

    /**
     * @var string
     */
    public $total_weight;

    /**
     * @var string
     */
    public $currency;

    /**
     * @var string
     */
    public $presentment_currency;


    /**
     * @var string
     */
    public $phone;

    /**
     * @var string
     */
    public $customer_locale;

    /**
     * @var Address
     */
    public $shipping_address;

    /**
     * @var Address
     */
    public $billing_address;

}