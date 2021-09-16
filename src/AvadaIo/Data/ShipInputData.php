<?php

namespace AvadaIo\Data;

class ShipInputData
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
    public $email;

    /**
     * @var OrderCustomerData
     */
    public $customer;

    /**
     * @var string
     */
    public $currency;

    /**
     * @var string
     */
    public $order_status_url;

    /**
     * @var ShippingTrack[]
     */
    public $tracks;

    /**
     * @var string
     */
    public $trackingCompany;

    /**
     * @var string
     */
    public $trackingNumber;

    /**
     * @var string
     */
    public $trackingUrl;

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
     * @var Address
     */
    public $destination;
}