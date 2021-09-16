<?php

namespace AvadaIo\Data;

class InvoiceInputData
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
    public $name;

    /**
     * @var string
     */
    public $fulfillment_status;

    /**
     * @var string
     */
    public $financial_status;

    /**
     * @var string
     */
    public $order_status_url;

    /**
     * @var string
     */
    public $email;

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

    /**
     * @var string
     */
    public $pdf_invoice_url;
    /**
     * @var string
     */
    public $pdf_invoice_file_name;

}