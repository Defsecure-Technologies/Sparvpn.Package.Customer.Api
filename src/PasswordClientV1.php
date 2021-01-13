<?php


namespace Sparvpn\Customer;


use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class PasswordClientV1
{

    public function updatePassword(string $password, string $confirmation_code) {
        $response = Http::timeout(15)
            ->withBasicAuth(env('SPARVPN_CUSTOMER_API_AUTH_USERNAME'), env('SPARVPN_CUSTOMER_API_AUTH_PASSWORD'))
            ->put("https://sparvpncustomerapiprod.azurewebsites.net/api/v1/forgotpassword/updatepassword", ['password' => $password, 'confirmation_code' => $confirmation_code]);
        return $response;
    }

    /**
     * @param string $username
     * @return Response
     */
    public function resetPassword(string $username) {
        $response = Http::timeout(15)
            ->withBasicAuth(env('SPARVPN_CUSTOMER_API_AUTH_USERNAME'), env('SPARVPN_CUSTOMER_API_AUTH_PASSWORD'))
            ->post("https://sparvpncustomerapiprod.azurewebsites.net/api/v1/forgotpassword/resetpassword", ['username' => $username]);
        return $response;
    }

    /**
     * Verify if customer and code exist.
     * Will return null, if no match found.
     * @param int $customer_id
     * @param string $confirmation_code
     * @return Response
     */
    public function verifyCode(int $customer_id, string $confirmation_code) {
        $response = Http::timeout(15)
            ->withBasicAuth(env('SPARVPN_CUSTOMER_API_AUTH_USERNAME'), env('SPARVPN_CUSTOMER_API_AUTH_PASSWORD'))
            ->post("https://sparvpncustomerapiprod.azurewebsites.net/api/v1/forgotpassword/verify",
                ['customer_id' => $customer_id, 'confirmation_code' => $confirmation_code]);
        return $response;
    }

}
