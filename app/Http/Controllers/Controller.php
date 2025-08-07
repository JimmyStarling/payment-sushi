<?php

namespace App\Http\Controllers;

/**
 * @OA\Info(
 *     title="API Sistema de pagamentos - Sushi Pay",
 *     version="0.1.0"
 * )
 *
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     in="header",
 *     name="Authorization"
 * )
 */
abstract class Controller
{
    
}
