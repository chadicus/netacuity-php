<?php

namespace TraderInteractive\NetAcuity\Tests;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Utils;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

abstract class NetAcuityTestSuite extends TestCase
{
    protected function getMockGuzzleClient(): ClientInterface
    {
        return $this->getMockBuilder(ClientInterface::class)->getMock();
    }

    protected function getMockClientException(int $code, string $errorMessage): ClientException
    {
        $stream = Utils::streamFor(json_encode(['error' => ['message' => $errorMessage]]));
        $response = new Response($code, [], $stream);
        return new ClientException($errorMessage, new Request('GET', 'localhost'), $response);
    }

    protected function getMockResponse(array $response): ResponseInterface
    {
        return new Response(200, [], Utils::streamFor(json_encode(['response' => $response])));
    }
}
