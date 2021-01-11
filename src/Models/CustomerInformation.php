<?php

namespace Sparvpn\Customer\Models;

/**
 * @OA\Schema(
 *   schema="CustomerInformation",
 *   type="object"
 * )
 */
class CustomerInformation
{
    /**
     * @OA\Property(type="string")
     */
    public string $firstname;

    /**
     * @OA\Property(type="string")
     */
    public string $lastname;

    /**
     * @OA\Property(type="string")
     */
    public string $email;
}
