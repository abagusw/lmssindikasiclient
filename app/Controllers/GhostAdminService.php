<?php


// app/Services/GhostAdminService.php
namespace App\Controllers;

use CodeIgniter\HTTP\CURLRequest;

class GhostAdminService
{
    protected $client;
    protected $adminApiUrl = URLGhost.'/ghost/api/admin/';
    protected $adminApiKey = ApiKeyGhost;

    public function __construct()
    {
        $this->client = \Config\Services::curlrequest();
    }

    public function getPostByUuid(string $uuid)
    {
        // Split Admin API Key
        [$id, $secret] = explode(':', $this->adminApiKey);
        $iat = time();
        $header = base64_encode(json_encode(['alg' => 'HS256', 'typ' => 'JWT', 'kid' => $id]));
        $payload = base64_encode(json_encode([
            'iat' => $iat,
            'exp' => $iat + 5 * 60,
            'aud' => '/admin/'
        ]));

        $signature = hash_hmac('sha256', "$header.$payload", hex2bin($secret), true);
        $jwt = "$header.$payload." . rtrim(strtr(base64_encode($signature), '+/', '-_'), '=');

        // Request ke admin endpoint
        $response = $this->client->get($this->adminApiUrl . 'posts/', [
            'headers' => [
                'Authorization' => "Ghost $jwt",
            ],
            'query' => [
                'filter'  => "uuid:$uuid",
                'include' => 'authors,tags',
            ]
        ]);

        $body = json_decode($response->getBody(), true);
        return $body['posts'][0] ?? null;
    }
}