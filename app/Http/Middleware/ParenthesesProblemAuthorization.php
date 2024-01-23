<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ParenthesesProblemAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();
        $nextRequest = is_null($token) ? true : $this->areBracketsBalanced($token);
        return $nextRequest ? $next($request) : response()->json('Authorization Bearer token invalid', 403);
    }

    /**
     * Check if brackets are correct balanced
     * 
     * @param string $token Bearer token
     * @return bool
     */
    public function areBracketsBalanced(string $token) : bool
    {
		$stack = [];
        for ($i=0; $i < strlen($token); $i++) {
            $x = $token[$i];
            if (in_array($x, ['(', '[', '{'])) {
                $stack[] = $x;
                continue;
            }
            if (empty($stack)|| !in_array($x, ['(', '[', '{', '}',']',')'])) {
                return false;
            }
            switch ($x) {
                case ')':
                    if (in_array(array_pop($stack), ['{', '['])) {
                        return false;
                    }
                    break;
                case '}':
                    if (in_array(array_pop($stack), ['(', '['])) {
                        return false;
                    }
                    break;
                case ']':
                    if (in_array(array_pop($stack), ['(', '{'])) {
                        return false;
                    }
                    break;
            }
        }
        return empty($stack);
	}
}
