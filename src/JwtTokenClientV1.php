<?php


use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class JwtTokenClientV1
{
    /**
     * Adds a token to the given customer. If carbon is NULL, the token will expires after 30 minutes.
     * @param int $customer_id
     * @param string|null $expires_at
     * @return Response
     */
    public function add(int $customer_id, ?string $expires_at)
    {
        $response = Http::timeout(30)
            ->withBasicAuth(env("SPARVPN_CUSTOMER_API_AUTH_USERNAME"), env("SPARVPN_CUSTOMER_API_AUTH_PASSWORD"))
            ->post('https://sparvpncustomerapiprod.azurewebsites.net/api/v1/jwttoken/add', ['customer_id' => $customer_id, 'expires_at' => $expires_at]);
        return $response;
    }

    /**
     * Validates if the given token is expired or not.
     * @param string $token
     * @return Response
     */
    public function validate(string $token)
    {
        $response = Http::timeout(30)
            ->withBasicAuth(env("SPARVPN_CUSTOMER_API_AUTH_USERNAME"), env("SPARVPN_CUSTOMER_API_AUTH_PASSWORD"))
            ->get("https://sparvpncustomerapiprod.azurewebsites.net/api/v1/jwttoken/validate?token={$token}");
        return $response;
    }

    /**
     * @param string $token
     * @return Response
     */
    public function token(string $token)
    {
        $response = Http::timeout(30)
            ->withBasicAuth(env("SPARVPN_CUSTOMER_API_AUTH_USERNAME"), env("SPARVPN_CUSTOMER_API_AUTH_PASSWORD"))
            ->get("https://sparvpncustomerapiprod.azurewebsites.net/api/v1/jwttoken/token/{$token}");
        return $response;
    }

}
