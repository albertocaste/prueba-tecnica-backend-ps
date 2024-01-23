<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ParenthesisProblemAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();
        $pass = false;
        if (is_null($token)) {
            $pass = true;
        } else {
            $pass = $this->areBracketsBalanced($token);
        }
        return $pass ? $next($request) : response()->json('Authorization Bearer token invalid', 403);
    }


    public function areBracketsBalanced(string $token) {
        $stack = [];
        for ($i=0; $i < strlen($token); $i++) {
            $x = $token[$i];
            if ($x == '(' || $x == '[' || $x == '{') {
                $stack[] = $x;
                continue;
            }
            if (empty($stack)) {
                return false;
            }
            $check = [];
            switch ($x) {
                case ')':
                    $check = array_pop($stack);
                    if ($check == '{' || $check == '[') {
                        return false;
                    }
                    break;
                case '}':
                    $check = array_pop($stack);
                    if ($check == '(' || $check == '[') {
                        return false;
                    }
                    break;
                case ']':
                    $check = array_pop($stack);
                    if ($check == '(' || $check == '{') {
                        return false;
                    }
                    break;
            }
        }
        return empty($stack);
    }
}
