<?php

class HttpClient
{
    public function makeRequest(string $url): array
    {
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

        curl_close($curl);

        return json_decode($response, true);
    }
}
