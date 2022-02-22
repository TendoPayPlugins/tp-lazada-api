<?php

declare(strict_types=1);

namespace TendoPay\LazadaApi\Traits;

use TendoPay\LazadaApi\Constants;
use TendoPay\LazadaApi\Models\RequestModelInterface;

/**
 * Api endpoints
 */
trait ApiCallable
{
    public function call(RequestModelInterface $requestModel)
    {
        $baseUrl = Constants::PH_BASE_URL;
        $route = $requestModel->getRoute();
        $params = $requestModel->toArray();
        $requestData = $this->prepareRequestGlobalParams($route, $params);
        var_dump($requestData);
        exit;
        //// TODO
        // CALL API
        // RESPONSE
        // EXCEPTION
        // LOGS
    }

    private function prepareRequestGlobalParams(string $apiRoute, array $queryParams): array
    {
        $params = array_merge(
            [
                'app_key' => $this->appKey,
                'timestamp' => $this->getTimestamp(),
                'sign_method' => Constants::SIGN_METHOD,
            ],
            $queryParams
        );

        return array_merge(
            $params,
            ['sign' => $this->generateSign($apiRoute, $params)],
        );
    }

    private function getTimestamp(): string
    {
        list($msec, $sec) = explode(' ', microtime());
        return $sec . '000';
    }

    private function getSign(string $data, string $key): string
    {
        return hash_hmac(Constants::SIGN_METHOD, $data, $key);
    }

    private function generateSign(string $apiName, array $params): string
    {
        ksort($params);

        $stringToBeSigned = '';
        $stringToBeSigned .= $apiName;
        foreach ($params as $k => $v) {
            $stringToBeSigned .= "$k$v";
        }
        unset($k, $v);

        return strtoupper($this->getSign($stringToBeSigned, $this->appSecret));
    }
}
