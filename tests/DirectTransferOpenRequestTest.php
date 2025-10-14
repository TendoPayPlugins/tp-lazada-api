<?php

use TendoPay\LazadaApi\Constants;
use TendoPay\LazadaApi\Models\DirectTransferOpenRequest;

it('checks if toArray method returns proper values', function (array $input, array $expected) {
    $directTransferOpenRequest = new DirectTransferOpenRequest(
        $input['transfer_order_id'],
        $input['amount'],
        $input['account_number'],
        $input['withdrawable']
    );

    $this->assertEquals($expected, $directTransferOpenRequest->toArray());
})->with([
    'withdrawable true' => [
        [
            'transfer_order_id' => '123123123',
            'amount' => '123.45',
            'account_number' => '33333333',
            'withdrawable' => 'false',
        ],
        [
            'transfer_order_id' => '123123123',
            'amount' => '123.45',
            'account_number' => '33333333',
            'withdrawable' => 'false',
        ],
    ],
    'withdrawable false' => [
        [
            'transfer_order_id' => '999999',
            'amount' => '13.45',
            'account_number' => '5555555',
            'withdrawable' => 'true',
        ],
        [
            'transfer_order_id' => '999999',
            'amount' => '13.45',
            'account_number' => '5555555',
            'withdrawable' => 'true',
        ],
    ],
]);

it('test route type', function () {
    $directTransferOpenRequest = new DirectTransferOpenRequest(
        '123123',
        '123.22',
        '1233',
        true
    );

    $this->assertEquals('/wallet/transfer/request', $directTransferOpenRequest->getRoute());
});

it('test method type', function () {
    $directTransferOpenRequest = new DirectTransferOpenRequest(
        '123123',
        '123.22',
        '1233',
        true
    );

    $this->assertEquals('POST', $directTransferOpenRequest->getRequestType());
});

it('test error code', function (string $code, bool $result) {
    $directTransferOpenRequest = new DirectTransferOpenRequest(
        '123123',
        '123.22',
        '1233',
        true
    );

    $this->assertEquals($result, $directTransferOpenRequest->isResponseCodeError($code));
})->with([
    [Constants::OPEN_DIRECT_TRANSFER_LOCK_CONFLICT, true],
    [Constants::TRANSFER_ERROR_MSG_RESPONSED_FAILED, true],
    [Constants::TRANSFER_ERROR_MSG_UNKNOWN_FAILED, true],
    [Constants::TRANSFER_ERROR_MSG_USER_NOT_FOUND, true],
    [Constants::TRANSFER_VALUE_UNMATCHED, true],
    [Constants::TRANSFER_USER_UNMATCHED, true],
    [Constants::TRANSFER_ERROR_ACCOUNT_NUMBER_INVALID, true],
    [Constants::OPEN_DIRECT_TRANSFER_INTERNAL_FAIL, true],
    [Constants::TRANSFER_ERROR_TRANSFER_ORDER_ID_INVALID, true],
    [Constants::TRANSFER_ERROR_MSG_AMOUNT_INVALID, true],
    [Constants::APP_KEY_INVALID, true],
    [Constants::USER_IS_NOT_LOGGED_IN, true],
    [Constants::PROCEED_TRANSFER_EXCEPTION, true],
    [Constants::OPEN_API_CALL_EXCEED_LIMIT, true],
    [Constants::BIZ_DEGRADATION_ERROR, true],
    [Constants::OPEN_API_TIMESTAMP_INVALID, true],
    [Constants::TRANSFER_ERROR_MSG_WALLET_INACTIVATED, true],
    ['RANDOM', false],
]);
