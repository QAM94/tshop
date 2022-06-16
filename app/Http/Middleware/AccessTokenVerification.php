<?php

namespace App\Http\Middleware;

use App\Models\AccessToken;
use Closure;

class AccessTokenVerification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        if($this->whiteListApi($request->path())) {
            return $next($request);
        }

        $access_token = $request->header('X-Access-Token');

        if (!$access_token) {
            return response()->json($this->errorMsgs('access_token_required'), 400);
        }

        $user = AccessToken::where('access_token', $access_token)
            ->where('expiry_time', '>', time())
            ->first();

        if (empty($user)) {
            return response()->json($this->errorMsgs('access_token_expired'), 400);
        }

        $request->merge(['user_id' => $user->user_id]);

        return $next($request);
    }

    private function errorMsgs($type)
    {
        switch ($type) {
            case 'access_token_required':
                $error = ['message' => 'X-Access-Token is required'];
                break;

            case 'access_token_expired':
                $error = ['message' => 'Token has been expired'];
                break;

            default:
                $error = ['message' => 'Token mismatched'];
                break;
        }

        return $error;
    }

    private function whiteListApi($route) {

        $whiteListRoutes = [
            'api/store-order',
            'api/scrap-all',
            'api/scrap-api'
        ];

        return in_array($route ,$whiteListRoutes);
    }
}
