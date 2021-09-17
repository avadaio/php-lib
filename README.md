# AVADA Email Marketing API - PHP

AVADA Email Marketing API bindings for PHP to make it easier for developer to connect with AVADA Marketing Automation platform.

## Table of Contents

- [Installation](#installation)
- [API](#api)
- [Examples](#examples)
- [Support](#support)

## Installation

```bash
composer require avadaio/avadaio-php-client
```

## API

Our API documentation is located at: [AVADA API Documentation](https://documenter.getpostman.com/view/10585474/TVmPAHH9#654363ae-7cd2-4236-a5e1-818ab87ecde0). You can see our API for more reference.

### Init instance

AvadaIoSdk uses curl extension for handling http calls. So you need to have the curl extension installed and enabled with PHP.

```php
$avadaio = new AvadaIo\AvadaIoSdk([
    'appId' => "[YOUR_APP_ID]", 
    "appKey" => "[YOUR_APP_KEY]"
]);
```

This module exports a constructor function which takes an associative array.

### `AvadaIoSdk(options)`

Creates a new `AVADA` instance.

#### Arguments

- `options` - Required - An associative array with two indexes

#### Options

- `appId` - Required
- `appKey` - Required

You can obtain your `appId` and `appKey` after creating an account with AVADA and go to the [Manage Keys page]('https://app.avada.io/manage/keys)

#### Return value

An `AvadaIoSdk` instance.

#### Exceptions

Throws an `SdkException` exception if the required options are missing.

## Resources

Every resource is accessed via your `$avadaio` instance:

```php
$avadaio = new AvadaIo\AvadaIoSdk([
    'appId' => "[YOUR_APP_ID]",
    "appKey" => "[YOUR_APP_KEY]"
]);

// $avadaio-><resource_name>-><method_name>
```

Each method returns `ApiResponse` object with 3 properties:

- `success` - boolean
- `data` - any - optional
- `message` - string

```php
$result = $avadaio->Contact->create([
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
```

The JSON return from the API is like this:

```json
{"success": true, "message": "Hook create/update customers complete"}
```

This behavior is the same for all resources.

## Examples

### Test connection

```php
 $result = $avadaio->Connection->test();
if ($result->success) {
  echo 'Connection established';
}
```

More examples can be found in the `tests` folder in the project source code.

## Available resources and methods

- Connection
    - `test()` Test the connection using your `appKey` and `appId`
- Form
    - `list()` Get a list of inline forms to integrate AVADA Forms into your page builder
- Contact
    - `create(data)` Create a new contact in your AVADA admin
    - `update(data)` Update an existing contact in your AVADA admin
    - `bulk(data)` Create new contacts in your AVADA admin in bulk
- Subscriber
    - `add(data)` Add a new contact to your contact list as a subscriber. Trigger the New Subscriber automation event.
- Review
    - `submit(data)` Trigger the submit of a new review on your store. Trigger On new review automation event.
- Checkout
    - `create(data)` Trigger a new checkout event to AVADA, which will be used for the Abandoned Cart Automation.
    - `update(data)` Trigger an update to a checkout event to AVADA. For example, update checkout email so that the cart will be qualified for Abandoned Cart Email.
    - `remove(id)` Remove a checkout.
- Order
    - `create(data)` Trigger a new order event to AVADA. Trigger New Order automation event.
    - `update(data)` Update an existing order.
    - `complete(data)` Complete an order. Trigger Cross-sell, Up-sell automation events.
    - `bulk(data)` Sync your orders to AVADA using bulk order inserts.
    - `refund(data)` Trigger a refund event to AVADA
    - `invoice(data)` Trigger a fulfillment event to AVADA
    - `ship(data)` Trigger a shipping event to AVADA
    

## Support

If you need any support, you can reach to us within our customer chat support inside your [app]('https://app.avada.io'')
