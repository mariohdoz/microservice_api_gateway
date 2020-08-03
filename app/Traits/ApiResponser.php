<?php 

namespace App\Traits; 

use Illuminate\Http\Response;

trait ApiResponser 
{
    /**
     * build a valid response 
     * @param string|array $data
     * @param init $code 
     * @return Illumintate/Http/Response
     */
    public function ValidResponse($data, $code = Response::HTTP_OK)
    {
        return response()->json(['data' => $data], $code);
    }

    /**
     * build a success response 
     * @param string|array $data
     * @param init $code 
     * @return Illumintate/Http/Response
     */
    public function successResponse($data, $code = Response::HTTP_OK)
    {
        return response($data, $code)->header('Content-Type', 'application/json');
    }

    public function errorResponse($message, $code )
    {
        return response()->json(['message' => $message, 'code' => $code], $code);
    }

    public function errorMessage($message, $code )
    {
        return response($message, $code)->header('Content-Type', 'application/json');
    }
}