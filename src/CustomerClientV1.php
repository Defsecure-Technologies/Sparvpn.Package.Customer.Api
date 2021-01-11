<?php


use Illuminate\Support\Facades\Http;
use Sparvpn\Customer\Models\CustomerInformation;

class CustomerClientV1
{

    /**
     * @param CustomerInformation $customerInformation
     * @return mixed
     */
    public function create(CustomerInformation $customerInformation)
    {
        $response = Http::timeout(30)
            ->withBasicAuth(env('SPARVPN_CUSTOMER_API_AUTH_USERNAME'), env('SPARVPN_CUSTOMER_API_AUTH_PASSWORD'))
            ->post('https://sparvpncustomerapiprod.azurewebsites.net/api/v1/customer/create', (array) $customerInformation);
        return $response;
    }

}
