<?php
/**
 * Created by PhpStorm.
 * User: FFX Sistemas
 * Date: 07/02/2018
 * Time: 23:25
 */

namespace App\Http\Middleware;

use Closure;

class CharsetMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $contentType = $response->headers->get('Content-Type');
        if (!empty($contentType)) {
            $response->header('Content-Type', str_replace('UTF-8', 'iso-8859-1', $contentType));
        }
        return $response;
    }
}