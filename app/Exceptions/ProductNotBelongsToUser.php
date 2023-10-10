<?php

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductNotBelongsToUser extends Exception
{
    
    
   /**
     * Report the exception.
     */
    /*public function report(): void
    {
        // ...
    }**/
 
    /**
     * Render the exception into an HTTP response.
     */
    /**public function render(Request $request): Response
    {
         return response()->json([
            'success' => false, 
            'message' => 'Product not belongs to use'
           ], 404);
    }*/

    public function render()
    {
         return ['errors' => 'Product Not Belongs to User'];
    }

}
