<?php

declare(strict_types=1);

namespace TendoPay\LazadaApi\Traits;

use Exception;
use TendoPay\LazadaApi\Constants;
use TendoPay\LazadaApi\Models\RequestModelInterface;

trait ApiCallable
{
    public function call(RequestModelInterface $requestModel)
    {
        # Colect data
        $route = $requestModel->getRoute();
        $requestUrl = Constants::PH_BASE_URL . $route;
        $requestType = $requestModel->getRequestType();
        $requestData = $this->prepareRequestGlobalParams($route, $requestModel->toArray());

        # Init client and call the API
        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->request($requestType, $requestUrl, [
                'json' => $requestData,
            ]);

            if (! $response->getBody()) {
                throw new Exception('Invalid response', 500);
            }

            $response = $response->getBody();
            $contents = json_decode($response->getContents(), true);

            if ($contents['code'] !== '0') {
                $this->throwException($contents);
            }

            return $contents;
        } catch (Exception $e) {
            throw new Exception('Failed to call Lazada API: ' . $e->getMessage(), $e->getCode());
        }
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

    private function throwException(array $contents)
    {
        if (in_array($contents['code'], Constants::CUSTOM_EXCEPTIONS)) {
            $exceptionClass = Constants::CUSTOM_EXCEPTIONS[$contents['code']];

            throw new $exceptionClass($contents['message'], 422);
        }

        throw new Exception($contents['message'], 500);
    }
}
