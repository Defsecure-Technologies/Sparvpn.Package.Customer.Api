<?php


namespace Sparvpn\Customer\Models;

/**
 * @OA\Schema(
 *   schema="CustomerLogin",
 *   type="object"
 * )
 */
class CustomerLogin
{

    /**
     * @OA\Property(type="string", default=1)
     */
    public string $username;

    /**
     * @OA\Property(type="string", default=1)
     */
    public string $password;

}
