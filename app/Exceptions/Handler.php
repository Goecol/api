<?php

namespace App\Exceptions;

use App\Exceptions\ExceptionTrait;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use App\Exceptions\ProductNotBelongsToUser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;



class Handler extends ExceptionHandler
{
    use ExceptionTrait;

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
          return $this->apiException($request, $e);
        }      
    }
}




