<?php


namespace Sparvpn\Customer\Models;

/**
 * @OA\Schema(
 *   schema="UpdatePassword",
 *   type="object"
 * )
 */
class UpdatePassword
{

    /**
     * @OA\Property(type="string", example="string")
     */
    public string $password;

    /**
     * @OA\Property(type="string", example="string")
     */
    public string $confirmation_code;
}