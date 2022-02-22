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
        $data = $requestModel->toArray();
        $commonData = $this->prepareRequestGlobalParams();
        $requestData = array_merge($data, $commonData);
        var_dump($requestData);exit;
        //// TODO
        // CALL API
        // RESPONSE
        // EXCEPTION
        // LOGS
    }

    private function prepareRequestGlobalParams(): array
    {
        return [
            'app_key' => $this->appKey,
            'timestamp' => $this->getTimestamp(),
            'sign_method' => Constants::SIGN_METHOD,
            'sign' => $this->getSign('a', 'x'),
        ];
    }

    private function getTimestamp(): string
    {
        return microtime();
    }

    private function getSign(string $data, string $key): string
    {
        return hash_hmac(Constants::SIGN_METHOD, $data, $key);
    }

    private function generateSign($apiName,$params)
	{
		ksort($params);

		$stringToBeSigned = '';
		$stringToBeSigned .= $apiName;
		foreach ($params as $k => $v)
		{
			$stringToBeSigned .= "$k$v";
		}
		unset($k, $v);

		return strtoupper($this->getSign($stringToBeSigned,$this->secretKey));
	}
}
