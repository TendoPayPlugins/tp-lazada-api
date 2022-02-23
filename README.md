# TP Lazada API

TendoPay Lazada API integraiton
## Installation

You can install the package via composer:

```bash
composer require tendopay/tp-lazada-api
```

## Usage

Documentation: https://open.lazada.com/doc/api.htm?spm=a2o9m.11193494.0.0.f05d266bx1FwMC#/permission?groupId=54&path=/wallet/transfer/query
```php
$requestModel = new DirectTransferOpenRequest(
    'test001',
    '0.01',
    '09160000001'
);

$requestModel = new GiftCodeCreateOpenRequest(
    '0.01',
    1,
    'batch001',
    1640260000001,
    1740260653001
);

$requestModel = new GiftCodeCreateOpenQuery(
    'batch001'
);

$requestModel = new DirectTransferOpenQuery(
    'test001'
);

$lazadaApi = new TendoPay\LazadaApi();
$response = $lazadaApi->call($requestModel);
```

## Testing

```bash
composer test
```