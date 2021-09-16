<?php

namespace AvadaIo\Data;

class ReviewData
{
    /**
     * @var numeric
     */
    public $rating;


    /**
     * @var string
     */
    public $author;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $content;

    /**
     * @var string
     */
    public $productTitle;

    /**
     * @var string
     */
    public $productUrl;


    /**
     * @var string
     */
    public $productId;


    /**
     * @var string
     */
    public $productSku;


    /**
     * @var string[]
     */
    public $productImage;

    /**
     * @var string
     */
    public $orderId;

    /**
     * @var string 'yes' | 'no'
     */
    public $photoIncluded;

    /**
     * @var string
     */
    public $photoUrl;

    /**
     * @var string 'yes' | 'no'
     */
    public $videoIncluded;


    /*
     * @var string
     */
    public $thumbnailUrl;

    /**
     * @var string
     */
    public $videoUrl;

    /**
     * @var string
     */
    public $updateReviewPhotoUrl;

}