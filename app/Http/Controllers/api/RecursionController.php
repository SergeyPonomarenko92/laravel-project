<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use function Psy\debug;

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


    public function apples($pattern, $index)
    {
        $chain = [];
        for ($i = 0; $i <= $index; $i++) {
            $chain[$i] = $pattern;
        }
        $chain = implode($chain);
        $chain = str_split($chain);
        array_unshift($chain, ' ');

        return $this->indexchecker($chain, $index);
    }


    private function calculateFibonacci($index)
    {
        if ($index <= 1) {
            return $index;
        } else {
            return $this->calculateFibonacci($index - 1) + $this->calculateFibonacci($index - 2);
        }
    }

    private function indexchecker($chain, $index)
    {
        $result = [];
        foreach ($chain as $key => $value  ) {
            if ($index == $key){
                $result = [
                    'color' => "{$value}",
                    'index' => "{$key}",
                ];
            }
        }
        return $result;

    }

}
