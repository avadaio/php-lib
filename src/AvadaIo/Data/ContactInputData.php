<?php

namespace AvadaIo\Data;

class ContactInputData
{
    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $firstName;


    /**
     * @var string
     */
    public $lastName;

    /**
     * @var string
     */
    public $status;

    /**
     * @var boolean
     */
    public $isSubscriber;

    /**
     * @var string
     */
    public $phoneNumber;

    /**
     * @var string
     */
    public $phoneNumberCountry;

    /**
     * @var string
     */
    public $source;

    /**
     * @var numeric
     */
    public $orderCount;

    /**
     * @var numeric
     */
    public $totalSpent;

    /**
     * @var string
     */
    public $country;

    /**
     * @var string
     */
    public $countryCode;

    /**
     * @var string
     */
    public $city;

    /**
     * @var string
     */
    public $address;

    /**
     * @note Comma seperated values
     *
     * @var string
     */
    public $tags;
}