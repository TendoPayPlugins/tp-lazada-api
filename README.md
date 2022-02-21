# TP Lazada API

TendoPay Lazada API integraiton
## Installation

You can install the package via composer:

```bash
composer require tendopay/tp-lazada-api
```

## Usage

```php
$requestModel = new RequestModelInterface($data);
$lazadaApi = new TendoPay\LazadaApi();
$response = $lazadaApi->call($requestModel);
```

## Testing

```bash
composer test
```