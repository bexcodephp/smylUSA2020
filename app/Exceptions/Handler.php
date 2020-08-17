<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


/**
 * @codeCoverageIgnore
 */
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof Tymon\JWTAuth\Exceptions\TokenExpiredException) {
            return response()->json(['status' => false ,'message' => 'Token Expired']);
        } elseif ($exception instanceof Tymon\JWTAuth\Exceptions\TokenInvalidException) {
            return response()->json(['status' => false ,'message' => 'Invalid Token']);
        } elseif ($exception instanceof Tymon\JWTAuth\Exceptions\JWTException) {
            return response()->json(['status' => false ,'message' => 'Token not found']);
        } elseif ($exception instanceof Tymon\JWTAuth\Exceptions\TokenBlacklistedException) {
            return response()->json(['status' => false ,'message' => 'Token is blacklisted']);
        }

        if ($exception instanceof AuthenticationException) {
            return redirect()->route('login')->with(['message' => 'Session expired. Login again','status' => false]);
        }


        return parent::render($request, $exception);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->wantsJson()) {
            return response()->json(['status' => false, 'message' => $exception->getMessage()], 200);
        }

        return redirect()->guest(route('login'));
    }
}
