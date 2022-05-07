<?php

namespace App\Exceptions;

use Exception;

class BadRequestException extends Exception
{

    public function report()
    {
        // report
    }

    public function render()
    {
        return response()->json(['error' => true, 'message' => $this->getMessage()], 422);
    }
}
