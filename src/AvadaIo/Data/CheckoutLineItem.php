<?php

namespace AvadaIo\Data;

class CheckoutLineItem
{
    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $price;

    /**
     * @var numeric
     */
    public $quantity;

    /**
     * @var string
     */
    public $sku;

    /**
     * @var string
     */
    public $product_id;

    /**
     * @var string
     */
    public $image;

    /**
     * @var string
     */
    public $line_price;

    /**
     * @var string
     */
    public $frontend_link;

    /**
     * @var numeric
     */
    public $variant_id;

    /**
     * @var string
     */
    public $variant_title;

    /**
     * @var string
     */
    public $variant_price;

    /**
     * @var string
     */
    public $variant_image;

    /**
     * @var CheckoutBundleItem[]
     */
    public $bundle_items;
}