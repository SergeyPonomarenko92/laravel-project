<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecursionController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recursive = null;
        for ($i = $id; $i > 0; $i--) {
            $recursive = array(
                "level_{$i}" => $recursive
            );
        }
        return $recursive;
    }


    public function fibonacci($index)
    {
        $result = $this->calculateFibonacci($index);

        return response()->json([
            'index' => $index,
            'fibonacci_number' => $result
        ]);
    }

    private function calculateFibonacci($index)
    {
        if ($index <= 1) {
            return $index;
        } else {
            return $this->calculateFibonacci($index - 1) + $this->calculateFibonacci($index - 2);
        }
    }

}
