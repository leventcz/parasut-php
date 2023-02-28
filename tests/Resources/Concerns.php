<?php

use Leventcz\Parasut\Http\HttpClientInterface;
use Leventcz\Parasut\Resources\ApiResource;
use Leventcz\Parasut\Resources\Concerns\ArchivesResource;
use Leventcz\Parasut\Resources\Concerns\DeletesResource;
use Leventcz\Parasut\Resources\Concerns\EditsResource;
use Leventcz\Parasut\Resources\Concerns\IndexesResources;
use Leventcz\Parasut\Resources\Concerns\ShowsResource;
use Leventcz\Parasut\Resources\Concerns\UnArchivesResource;
use Leventcz\Parasut\ValueObjects\Method;

beforeEach(function () {
    $this->httpClient = mock(HttpClientInterface::class)->makePartial();
});

it('indexes resources', function () {
    $resource = new class ($this->httpClient) extends ApiResource {
        use IndexesResources;

        protected string $resource = 'foo';
    };

    $this->httpClient
        ->shouldReceive('authenticatedRequest')
        ->once()
        ->withArgs(function ($method, $uri, $query) {
            expect($method)->toBe(Method::GET)
                ->and($uri)->toBe('foo')
                ->and($query)->toBe(['bar' => 'baz']);
            return true;
        })
        ->andReturns(['data' => []]);

    $response = $resource->index(['bar' => 'baz']);

    expect($response)->toBe(['data' => []]);
});

it('shows resource', function () {
    $resource = new class ($this->httpClient) extends ApiResource {
        use ShowsResource;

        protected string $resource = 'foo';
    };

    $this->httpClient
        ->shouldReceive('authenticatedRequest')
        ->once()
        ->withArgs(function ($method, $uri, $query) {
            expect($method)->toBe(Method::GET)
                ->and($uri)->toBe('foo/1')
                ->and($query)->toBe(['bar' => 'baz']);
            return true;
        })
        ->andReturns(['data' => []]);

    $response = $resource->show(1, ['bar' => 'baz']);

    expect($response)->toBe(['data' => []]);
});

it('edits resource', function () {
    $resource = new class ($this->httpClient) extends ApiResource {
        use EditsResource;

        protected string $resource = 'foo';
    };

    $this->httpClient
        ->shouldReceive('authenticatedRequest')
        ->once()
        ->withArgs(function ($method, $uri, $query, $body) {
            expect($method)->toBe(Method::PUT)
                ->and($uri)->toBe('foo/1')
                ->and($query)->toBe(['bar' => 'baz'])
                ->and($body)->toBe(['foo' => 'bar']);
            return true;
        })
        ->andReturns(['data' => []]);

    $response = $resource->edit(1, ['bar' => 'baz'], ['foo' => 'bar']);

    expect($response)->toBe(['data' => []]);
});

it('deletes resource', function () {
    $resource = new class ($this->httpClient) extends ApiResource {
        use DeletesResource;

        protected string $resource = 'foo';
    };

    $this->httpClient
        ->shouldReceive('authenticatedRequest')
        ->once()
        ->withArgs(function ($method, $uri, $query) {
            expect($method)->toBe(Method::DELETE)
                ->and($uri)->toBe('foo/1')
                ->and($query)->toBe(['bar' => 'baz']);
            return true;
        })
        ->andReturns(['data' => []]);

    $response = $resource->delete(1, ['bar' => 'baz']);

    expect($response)->toBe(['data' => []]);
});

it('archives resource', function () {
    $resource = new class ($this->httpClient) extends ApiResource {
        use ArchivesResource;

        protected string $resource = 'foo';
    };

    $this->httpClient
        ->shouldReceive('authenticatedRequest')
        ->once()
        ->withArgs(function ($method, $uri, $query) {
            expect($method)->toBe(Method::PATCH)
                ->and($uri)->toBe('foo/1/archive')
                ->and($query)->toBe(['bar' => 'baz']);
            return true;
        })
        ->andReturns(['data' => []]);

    $response = $resource->archive(1, ['bar' => 'baz']);

    expect($response)->toBe(['data' => []]);
});

it('un-archives resource', function () {
    $resource = new class ($this->httpClient) extends ApiResource {
        use UnArchivesResource;

        protected string $resource = 'foo';
    };

    $this->httpClient
        ->shouldReceive('authenticatedRequest')
        ->once()
        ->withArgs(function ($method, $uri, $query) {
            expect($method)->toBe(Method::PATCH)
                ->and($uri)->toBe('foo/1/unarchive')
                ->and($query)->toBe(['bar' => 'baz']);
            return true;
        })
        ->andReturns(['data' => []]);

    $response = $resource->unArchive(1, ['bar' => 'baz']);

    expect($response)->toBe(['data' => []]);
});
