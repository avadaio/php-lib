<?php

namespace AvadaIo\Data;

class CheckoutInputData
{
    /**
     * @var mixed
     */
    public $id;

    /**
     * @var mixed
     */
    public $abandoned_checkout_url;

    /**
     * @var string
     */
    public $email;

    /**
     * @var mixed
     */
    public $created_at;

    /**
     * @var mixed
     */
    public $updated_at;

    /**
     * @var mixed
     */
    public $completed_at;

    /**
     * @var string
     */
    public $phone;

    /**
     * @var string
     */
    public $customer_locale;

    /**
     * @var CheckoutLineItem
     */
    public $line_items;

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
    public $total_price;

    /**
     * @var string
     */
    public $currency;

    /**
     * @var string
     */
    public $presentment_currency;

    /**
     * @var OrderCustomerData
     */
    public $customer;

    /**
     * @var Address
     */
    public $shipping_address;
}