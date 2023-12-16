<?php

declare(strict_types=1);

namespace App\Services;

use GuzzleHttp\Client;

class PetApiService
{
    protected Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('petapi.endpoint'),
            'headers' => [
                'Authorization' => 'Bearer ' . config('petapi.api_key'),
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    public function get(string $endpoint): object
    {
        return $this->client->get($endpoint);
    }

    public function post(string $endpoint, array $data = []): object
    {
        return $this->client->post($endpoint, ['json' => $data]);
    }

    public function put(string $endpoint, array $data = []): object
    {
        return $this->client->put($endpoint, ['json' => $data]);
    }

    public function destroy(string $endpoint): object
    {
        return $this->client->delete($endpoint);
    }

    public function processTagsAndPhotoUrls(array &$validatedData): void
    {
        if (!empty($validatedData['photoUrls']))
            $validatedData['photoUrls'] = array_filter(explode(',', $validatedData['photoUrls']));
        else
            $validatedData['photoUrls'] = [];

        if (!empty($validatedData['tags'])) {
            $tags = array_filter(explode(',', $validatedData['tags']));
            unset($validatedData['tags']);

            foreach ($tags as $tag)
                $validatedData['tags'][] = ['name' => trim($tag)];
        } else
            $validatedData['tags'] = [];
    }
}
