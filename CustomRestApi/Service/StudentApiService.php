<?php

declare(strict_types=1);

namespace Bluethinkinc\CustomRestApi\Service;

use GuzzleHttp\Client;
use GuzzleHttp\ClientFactory;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\ResponseFactory;
use Magento\Framework\Webapi\Rest\Request;

/**
 * Class StudentApiService
 */
class StudentApiService
{
    /**
     * API request URL
     */
    const API_REQUEST_URI = 'https://local.magento.test/';

    /**
     * API request endpoint
     */
    const API_REQUEST_ENDPOINT = 'rest/V1/student/30/';

    /**
     * @var ResponseFactory
     */
    private $responseFactory;

    /**
     * @var ClientFactory
     */
    private $clientFactory;

    /**
     * GitApiService constructor
     *
     * @param ClientFactory $clientFactory
     * @param ResponseFactory $responseFactory
     */
    public function __construct(
        ClientFactory $clientFactory,
        ResponseFactory $responseFactory
    ) {
        $this->clientFactory = $clientFactory;
        $this->responseFactory = $responseFactory;
    }

    /**
     * Fetch some data from API
     */
    public function execute(): void
    {
        $repositoryName = 'magento/magento2';
        $response = $this->doRequest(static::API_REQUEST_ENDPOINT . $repositoryName);
        $status = $response->getStatusCode(); 
        $responseBody = $response->getBody();
        $responseContent = $responseBody->getContents(); 
    }

    /**
     * Do API request with provided params
     *
     * @param string $uriEndpoint
     * @param array $params
     * @param string $requestMethod
     *
     * @return Response
     */
    private function doRequest(
        string $uriEndpoint,
        array $params = [],
        string $requestMethod = Request::HTTP_METHOD_GET
    ): Response {
        /** @var Client $client */
        $client = $this->clientFactory->create(['config' => [
            'base_uri' => self::API_REQUEST_URI
        ]]);

        try {
            $response = $client->request(
                $requestMethod,
                $uriEndpoint,
                $params
            );
        } catch (GuzzleException $exception) {
            /** @var Response $response */
            $response = $this->responseFactory->create([
                'status' => $exception->getCode(),
                'reason' => $exception->getMessage()
            ]);
        }

        return $response;
    }
}
