<?php

declare(strict_types=1);

namespace TendoPay\LazadaApi\Traits;

use TendoPay\LazadaApi\Constants;
use TendoPay\LazadaApi\Exceptions\AppKeyInvalidException;
use TendoPay\LazadaApi\Models\RequestModelInterface;

/**
 * Api endpoints
 */
trait ApiCallable
{
    public function call(RequestModelInterface $requestModel)
    {
        $route = $requestModel->getRoute();
        $requestUrl = Constants::PH_BASE_URL . $route;
        $requestType = $requestModel->getRequestType();
        $params = $requestModel->toArray();
        $requestData = $this->prepareRequestGlobalParams($route, $params);
        // var_dump($this->appKey, $this->appSecret);exit;
        $client = new \GuzzleHttp\Client();
        $response = $client->request($requestType, $requestUrl, [
            'json' => $requestData,
        ]);

        if (! $response->getBody()) {
            throw new AppKeyInvalidException('Invalid credentials', 422);
        }


        $response = $response->getBody();

        $contents = json_decode($response->getContents(), true);

        if ($contents['code'] === Constants::APP_KEY_INVALID) {
            throw new AppKeyInvalidException('Invalid APP Key', 500);
        }

        var_dump($contents);
        exit;

        var_dump($response);
        exit;
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
