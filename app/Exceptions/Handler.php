<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e, $request) {
            //
            //Log::info($e->getMessage());
        });

        $this->renderable(function (Throwable $e, $request) {
            
          //dd($e);
          return $this->handleException($e, $request);
        });

    }

    public function handleException(Throwable $e, $request)
    {
       if($request->expectsJson()){
        if($e instanceof NotFoundHttpException){
         return response()->json([
            'success' => false, 
            'message' => 'Incorrect route, resource not found'
           ], Response::HTTP_NOT_FOUND);

         }
        else if($e instanceof ModelNotFoundException){
         return response()->json([
            'success' => false, 
            'message' => 'Product Model not found'
           ], 404);

          }
        }
        
    }
}
