<?php

namespace AvadaIo\Data;

class ReviewSubmitInputData
{
    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $source;

    /**
     * @var ReviewSubmitCustomer
     */
    public $customer;

    /**
     * @var ReviewData
     */
    public $review;
}