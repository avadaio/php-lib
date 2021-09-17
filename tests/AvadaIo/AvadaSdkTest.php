<?php

declare(strict_types=1);

namespace UnitTest\AvadaIo;

use AvadaIo\AvadaIoSdk;
use AvadaIo\Exception\SdkException;
use PHPUnit\Framework\TestCase;

class AvadaSdkTest extends TestCase
{
    /**
     * @var AvadaIoSdk
     */
    protected $avadaio;

    /**
     * @throws SdkException
     */
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->avadaio = new AvadaIoSdk(['appId' => "YOUR_APP_ID", "appKey" => "YOUR_APP_KEY"]);
    }

    public function testConnection(): void
    {
        $result = $this->avadaio->Connection->test();

        $this->assertSame($result->success, true);
    }

    public function testCheckoutCreate(): void
    {
        $result = $this->avadaio->Checkout->create([
            "id" => 349857984735,
            "abandoned_checkout_url" => "https://amce.io/mpsmtp/abandonedcart/recover/token/xxxxxxxxxx/",
            "email" => "anhnt@mageplaza.com",
            "created_at" => "2020-12-01 04:30:55",
            "updated_at" => "2020-12-01 04:30:55",
            "completed_at" => "2020-12-01 04:30:55",
            "phone" => "0123456789",
            "customer_locale" => "",
            "line_items" => [
                [
                    "type" => "simple",
                    "title" => "T-shirt",
                    "price" => 299,
                    "quantity" => 1,
                    "sku" => "t-shirt",
                    "product_id" => "29",
                    "image" => "https://acme.io/pub/media/catalog/product/a/f/tshirt.png",
                    "line_price" => 299,
                    "frontend_link" => "https://acme.io/pub/media/catalog/product/a/f/tshirt.png"
                ]
            ],
            "subtotal_price" => "299",
            "total_tax" => "0",
            "total_price" => "299",
            "currency" => "$",
            "presentment_currency" => "USD",
            "customer" => [
                "id" => 0,
                "email" => null,
                "name" => "",
                "first_name" => null,
                "last_name" => null
            ],
            "shipping_address" => [
                "name" => "Jade ",
                "last_name" => "Jack",
                "phone" => "0123456789",
                "company" => "AVADA",
                "country_code" => "100000",
                "zip" => " ",
                "address1" => "",
                "address2" => " ",
                "city" => "NY",
                "province_code" => "",
                "province" => ""
            ]
        ]);

        $this->assertSame($result->success, true);
    }

    public function testCheckoutDelete()
    {
        $result = $this->avadaio->Checkout->remove(349857984735);
        $this->assertSame($result->success, true);
    }

    public function testCheckoutUpdate()
    {
        $result = $this->avadaio->Checkout->update([
            "id" => 349857984735,
            "abandoned_checkout_url" => "https://amce.io/mpsmtp/abandonedcart/recover/token/xxxxxxxxxx/",
            "email" => "john@doe.io",
            "created_at" => "2020-12-01 04:30:55",
            "updated_at" => "2020-12-01 04:30:55",
            "completed_at" => "2020-12-01 04:30:55",
            "phone" => "0123456789",
            "customer_locale" => "",
            "line_items" => [
                [
                    "type" => "simple",
                    "title" => "T-shirt",
                    "price" => 299,
                    "quantity" => 1,
                    "sku" => "t-shirt",
                    "product_id" => "29",
                    "image" => "https://acme.io/pub/media/catalog/product/a/f/tshirt.png",
                    "line_price" => 299,
                    "frontend_link" => "https://acme.io/pub/media/catalog/product/a/f/tshirt.png"
                ]
            ],
            "subtotal_price" => "299",
            "total_tax" => "0",
            "total_price" => "299",
            "currency" => "$",
            "presentment_currency" => "USD",
            "customer" => [
                "id" => 0,
                "email" => null,
                "name" => "",
                "first_name" => "null",
                "last_name" => "null"
            ],
            "shipping_address" => [
                "name" => "Jade ",
                "last_name" => "Jack",
                "phone" => "0123456789",
                "company" => "AVADA",
                "country_code" => "100000",
                "zip" => " ",
                "address1" => "",
                "address2" => " ",
                "city" => "NY",
                "province_code" => "",
                "province" => ""
            ]
        ]);
        $this->assertSame($result->success, true);
    }

    public function testContactBulk()
    {
        $result = $this->avadaio->Contact->bulk([
            [
                "description" => "",
                "email" => "john@doe.io",
                "firstName" => "John",
                "isSubscriber" => true,
                "lastName" => "Doe",
                "phoneNumber" => "+123465789",
                "phoneNumberCountry" => "US",
                "source" => "magento",
                "orderCount" => 0,
                "totalSpent" => 0,
                "country" => "US",
                "city" => "",
                "address" => "",
                "tags" => "Email Marketing"
            ],
            [
                "description" => "",
                "email" => "rainy@acme.io",
                "firstName" => "Rainy",
                "isSubscriber" => true,
                "lastName" => "Doe",
                "phoneNumber" => "+123465788",
                "phoneNumberCountry" => "US",
                "source" => "shopify",
                "orderCount" => 0,
                "totalSpent" => 0,
                "country" => "US",
                "city" => "",
                "address" => "",
                "tags" => "Email Marketing"
            ]
        ]);
        $this->assertSame($result->success, true);
    }

    public function testContactCreate()
    {
        $result = $this->avadaio->Contact->create([
            "description" => "",
            "email" => "john@doe.io",
            "firstName" => "John",
            "isSubscriber" => true,
            "lastName" => "Doe",
            "phoneNumber" => "+123465789",
            "phoneNumberCountry" => "US",
            "source" => "magento",
            "orderCount" => 0,
            "totalSpent" => 0,
            "country" => "US",
            "city" => "",
            "address" => "",
            "tags" => "Email Marketing"
        ]);
        $this->assertSame($result->success, true);
    }

    public function testContactUpdate()
    {
        $result = $this->avadaio->Contact->update([
            "description" => "ABC",
            "email" => "johndoe@example.com",
            "firstName" => "John",
            "isSubscriber" => true,
            "lastName" => "Doe",
            "phoneNumber" => "+16194892038",
            "phoneNumberCountry" => "US",
            "source" => "magento",
            "orderCount" => 0,
            "totalSpent" => 0,
            "country" => "United States",
            "countryCode" => "US",
            "city" => "",
            "address" => "",
            "tags" => "Email Marketing"
        ]);
        $this->assertSame($result->success, true);
    }

    public function testOrderBulk()
    {
        $result = $this->avadaio->Order->bulk([
            [
                "id" => 123,
                "email" => "john@doe.io",
                "status" => "subscribe",
                "customer" => [
                    "id" => "01",
                    "email" => "john@doe.io",
                    "first_name" => "John",
                    "last_name" => "Doe",
                    "phone" => ""
                ],
                "currency" => "USD",
                "created_at" => "2020-11-25T21:05:24-05:00",
                "updated_at" => "2020-11-25T21:05:25-05:00",
                "line_items" => [
                    [
                        "type" => "downloadable",
                        "title" => "Affiliate Ultimate",
                        "name" => "Sofa",
                        "price" => 299,
                        "quantity" => 3,
                        "sku" => "m2-affiliate-ultimate",
                        "product_id" => "29",
                        "image" => "https://acme.io/pub/media/catalog/product/a/f/affiliate_2.png",
                        "frontend_link" => "https://acme.io/m2-affiliate-ultimate.html",
                        "line_price" => 299,
                        "bundle_items" => [
                        ]
                    ]
                ],
                "order_status_url" => "https://linhnguyen11.myshopify.com/44268093604/orders/7af1f488f1a488e49d78cbcb6f9b054f/authenticate?key=46909721ea600fdddaa9c837ee6135f5",
                "subtotal_price" => "299",
                "total_price" => "299",
                "total_tax" => "0",
                "total_weight" => "0",
                "total_discounts" => "0"
            ]
        ]);
        $this->assertSame($result->success, true);
    }

    public function testOrderComplete()
    {
        $result = $this->avadaio->Order->complete([
            "id" => 123,
            "email" => "john@doe.io",
            "status" => "subscribe",
            "customer" => [
                "id" => "01",
                "email" => "john@doe.io",
                "first_name" => "John",
                "last_name" => "Doe",
                "phone" => ""
            ],
            "currency" => "USD",
            "created_at" => "2020-11-25T21:05:24-05:00",
            "updated_at" => "2020-11-25T21:05:25-05:00",
            "line_items" => [
                [
                    "type" => "downloadable",
                    "title" => "Affiliate Ultimate",
                    "name" => "Sofa",
                    "price" => 299,
                    "quantity" => 3,
                    "sku" => "m2-affiliate-ultimate",
                    "product_id" => "29",
                    "image" => "https://acme.io/pub/media/catalog/product/a/f/affiliate_2.png",
                    "frontend_link" => "https://acme.io/m2-affiliate-ultimate.html",
                    "line_price" => 299,
                    "bundle_items" => [
                    ]
                ]
            ],
            "order_status_url" => "https://linhnguyen11.myshopify.com/44268093604/orders/7af1f488f1a488e49d78cbcb6f9b054f/authenticate?key=46909721ea600fdddaa9c837ee6135f5",
            "subtotal_price" => "299",
            "total_price" => "299",
            "total_tax" => "0",
            "total_weight" => "0",
            "total_discounts" => "0"
        ]);
        $this->assertSame($result->success, true);
    }

    public function testOrderCreate()
    {
        $result = $this->avadaio->Order->create([
            "id" => 123,
            "email" => "john@doe.io",
            "status" => "subscribe",
            "customer" => [
                "id" => "01",
                "email" => "john@doe.io",
                "first_name" => "John",
                "last_name" => "Doe",
                "phone" => ""
            ],
            "currency" => "USD",
            "created_at" => "2020-11-25T21:05:24-05:00",
            "updated_at" => "2020-11-25T21:05:25-05:00",
            "line_items" => [
                [
                    "type" => "downloadable",
                    "title" => "Affiliate Ultimate",
                    "name" => "Sofa",
                    "price" => 299,
                    "quantity" => 3,
                    "sku" => "m2-affiliate-ultimate",
                    "product_id" => "29",
                    "image" => "https://acme.io/pub/media/catalog/product/a/f/affiliate_2.png",
                    "frontend_link" => "https://acme.io/m2-affiliate-ultimate.html",
                    "line_price" => 299,
                    "bundle_items" => [
                    ]
                ]
            ],
            "order_status_url" => "https://linhnguyen11.myshopify.com/44268093604/orders/7af1f488f1a488e49d78cbcb6f9b054f/authenticate?key=46909721ea600fdddaa9c837ee6135f5",
            "subtotal_price" => "299",
            "total_price" => "299",
            "total_tax" => "0",
            "total_weight" => "0",
            "total_discounts" => "0"
        ]);
        $this->assertSame($result->success, true);
    }

    public function testOrderInvoice()
    {
        $result = $this->avadaio->Order->invoice([
            "id" => 123,
            "order_id" => 123,
            "email" => "john@doe.io",
            "status" => "subscribe",
            "customer" => [
                "id" => "01",
                "email" => "john@doe.io",
                "first_name" => "John",
                "last_name" => "Doe",
                "phone" => "+123456789"
            ],
            "currency" => "USD",
            "created_at" => "2020-11-25T21:05:24-05:00",
            "updated_at" => "2020-11-25T21:05:25-05:00",
            "pdf_invoice_url" => "https://app.avada.io/customer/download/2241724614040380?shop=avada-demo.myshopify.com ",
            "pdf_invoice_file_name" => "Invoice_PDF",
            "line_items" => [
                [
                    "type" => "downloadable",
                    "title" => "Affiliate Ultimate",
                    "name" => "Sofa",
                    "price" => 299,
                    "quantity" => 3,
                    "sku" => "m2-affiliate-ultimate",
                    "product_id" => "29",
                    "image" => "https://acme.io/pub/media/catalog/product/a/f/affiliate_2.png",
                    "frontend_link" => "https://acme.io/m2-affiliate-ultimate.html",
                    "line_price" => 299,
                    "bundle_items" => [
                    ]
                ]
            ],
            "order_status_url" => "https://acme.myshopify.com/44268093604/orders/7af1f488f1a488e49d78cbcb6f9b054f/authenticate?key=46909721ea600fdddaa9c837ee6135f5"
        ]);
        $this->assertSame($result->success, true);
    }

    public function testOrderRefund()
    {
        $result = $this->avadaio->Order->refund([
            "id" => 123,
            "email" => "john@doe.io",
            "status" => "subscribe",
            "customer" => [
                "id" => "01",
                "email" => "john@doe.io",
                "first_name" => "John",
                "last_name" => "Doe",
                "phone" => ""
            ],
            "currency" => "USD",
            "created_at" => "2020-11-25T21:05:24-05:00",
            "updated_at" => "2020-11-25T21:05:25-05:00",
            "line_items" => [
                [
                    "type" => "downloadable",
                    "title" => "Affiliate Ultimate",
                    "name" => "Sofa",
                    "price" => 299,
                    "quantity" => 3,
                    "sku" => "m2-affiliate-ultimate",
                    "product_id" => "29",
                    "image" => "https://acme.io/pub/media/catalog/product/a/f/affiliate_2.png",
                    "frontend_link" => "https://acme.io/m2-affiliate-ultimate.html",
                    "line_price" => 299,
                    "bundle_items" => [
                    ]
                ]
            ],
            "order_status_url" => "https://linhnguyen11.myshopify.com/44268093604/orders/7af1f488f1a488e49d78cbcb6f9b054f/authenticate?key=46909721ea600fdddaa9c837ee6135f5",
            "subtotal_price" => "299",
            "total_price" => "299",
            "total_tax" => "0",
            "total_weight" => "0",
            "total_discounts" => "0",
            "order_id" => 2324324
        ]);
        $this->assertSame($result->success, true);
    }

    public function testOrderShip()
    {
        $result = $this->avadaio->Order->ship([
            "id" => 2937227935908,
            "order_id" => 123,
            "email" => "john@doe.io",
            "status" => "subcribe",
            "customer" => [
                "id" => "01",
                "email" => "john@doe.io",
                "first_name" => "John",
                "last_name" => "Doe",
                "phone" => "+123456789"
            ],
            "currency" => "USD",
            "created_at" => "2020-11-24T03:13:34-05:00",
            "updated_at" => "2020-11-29T21:51:56-05:00",
            "line_items" => [
                [
                    "type" => "downloadable",
                    "name" => "Affiliate Ultimate",
                    "title" => "Affiliate Ultimate",
                    "price" => 299,
                    "quantity" => 3,
                    "sku" => "m2-affiliate-ultimate",
                    "product_id" => "29",
                    "image" => "https://acme.io/pub/media/catalog/product/a/f/affiliate_2.png",
                    "frontend_link" => "https://acme.io/m2-affiliate-ultimate.html",
                    "line_price" => 299,
                    "bundle_items" => [
                    ]
                ]
            ],
            "order_status_url" => "https://acme.myshopify.com/44268093604/orders/7af1f488f1a488e49d78cbcb6f9b054f/authenticate?key=46909721ea600fdddaa9c837ee6135f5",
            "track" => [
            ],
            "tracking_company" => "YunExpress",
            "trackingNumber" => "YT2023201271001806",
            "trackingUrl" => " https://www.yuntrack.com/Track/Detail/YT2023201271001806",
            "destination" => [
                "first_name" => "John",
                "last_name" => "Holy",
                "address1" => "",
                "city" => "Chicago",
                "zip" => "12345",
                "country" => "USA",
                "phone" => ""
            ]
        ]);
        $this->assertSame($result->success, true);
    }

    public function testOrderUpdate()
    {
        $result = $this->avadaio->Order->update([
            "id" => 123,
            "email" => "john4545@doe.io",
            "status" => "completed",
            "state" => "completed"
        ]);
        $this->assertSame($result->success, true);
    }

    public function testReviewSubmit()
    {
        $result = $this->avadaio->Review->submit([
            "email" => "anhnt@mageplaza.com",
            "customer" => [
                "firstName" => "Test",
                "lastName" => "Test",
                "reviewCount" => 7
            ],
            "review" => [
                "rating" => 5,
                "author" => "John Doe",
                "title" => "Maecenas nec tincidunt libero",
                "content" => "Vestibulum pellentesque gravida nisl. Aliquam commodo ligula urna, ut consectetur augue tincidunt ac. Nam maximus mi a ligula luctus egestas.",
                "productTitle" => "Clay Plant Pot",
                "productUrl" => "https://thomas-photo-review-production.myshopify.com/products/clay-plant-pot",
                "productImage" => [
                    "https://cdn.shopify.com/s/files/1/0514/6722/3220/products/single-sprout-in-a-pot_925x_de08e14a-5fb2-4174-b210-e9608417e5c9_1024x1024@2x.jpg?v=1606815016"
                ],
                "productId" => 6101006319796,
                "photoIncluded" => "no",
                "photoUrl" => "https://cdn.shopify.com/s/files/1/0457/4098/2438/products/black-bag-over-the-shoulder_925x_112781d2-f0b3-43de-97ea-121b020bf0a0_1024x1024@2x.jpg?v=1599548060",
                "updateReviewPhotoUrl" => "https://thomas-photo-review-production.myshopify.com/products/clay-plant-pot"
            ]
        ]);
        $this->assertSame($result->success, true);
    }

    public function testSubscriberCreate()
    {
        $result = $this->avadaio->Review->submit([
            "email" => "johndoe@example.com",
            "firstName" => "John",
            "lastName" => "Doe",
            "tags" => "test1, test2"
        ]);
        $this->assertSame($result->success, true);
    }
}
