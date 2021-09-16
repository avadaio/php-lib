<?php

namespace AvadaIo\Data;

class OrderCustomerData
{
    /**
     * @var mixed
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
     * @var string | null
     */
    public $first_name;

    /**
     * @var string | null
     */
    public $last_name;

    /**
     * @var string
     */
    public $phone;

    /**
     * @var numeric
     */
    public $orders_count;

    /**
     * @var numeric
     */
    public $total_spent;

    /**
     * @var OrderCustomerDefaultAddress
     */
    public $default_address;
}