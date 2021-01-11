<?php


use Illuminate\Support\Facades\Http;
use Sparvpn\Customer\Models\CustomerLogin;

class LoginClientV1
{

    /**
     * @param CustomerLogin $customerLogin
     * @return mixed
     */
    public function create(CustomerLogin $customerLogin)
    {
        $response = Http::timeout(30)
            ->withBasicAuth(env('SPARVPN_CUSTOMER_API_AUTH_USERNAME'), env('SPARVPN_CUSTOMER_API_AUTH_PASSWORD'))
            ->post('https://sparvpncustomerapiprod.azurewebsites.net/api/v1/login/create', (array) $customerLogin);
        return $response;
    }

    public function login(CustomerLogin $customerLogin)
    {
        $response = Http::timeout(30)
            ->withBasicAuth(env('SPARVPN_CUSTOMER_API_AUTH_USERNAME'), env('SPARVPN_CUSTOMER_API_AUTH_PASSWORD'))
            ->post('https://sparvpncustomerapiprod.azurewebsites.net/api/v1/login', (array) $customerLogin);
        return $response;
    }

}
