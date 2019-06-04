<?php

namespace App;

class Prova
{

    public function QuestaoUm(int $n, array $arr)
    {
        //Sort an array using a "natural order" algorithm
        natsort($arr);
        //Create a new array with the occurencies of each value
        $ocurrencies = array_count_values($arr);
        //Order the array with the ocurrencies using natsort
        natsort($ocurrencies);
        //Sort an array by values using a user-defined comparison function
        usort($arr, function($a, $b) use ($ocurrencies) {
            if ($ocurrencies[$a] === $ocurrencies[$b]) {
                return 0;
            }
            return ($ocurrencies[$a] < $ocurrencies[$b]) ? -1 : 1;
        });

        return $arr;
    }

    public function QuestaoDois(int $n)
    {
        if($n >= 2){
            $fib = [0,1]; 
            for($i = 2; $i < $n; $i++){
                //Iterate until Fibonacci sequence be completed
                $fib[$i] = $fib[$i-1] + $fib[$i-2];		
            }
            return $fib;
        }
        if($n <= 1)
            return [0];

    }

    public function QuestaoTres(string $s)
    {
        $vowels = 'aeiou';
        $search = 0;
        $magic = '';
        $found = false;
        for($i = 0; $i < strlen($s); $i++)
        {
            if($s[$i] === $vowels[$search])
            {
                $magic .= $s[$i];
                $found = true;
                continue;
            }
            if($found)
            {
                if($search < 4)
                {
                    if($s[$i] === $vowels[$search+1])
                    {
                        $magic .= $s[$i];
                        $search++;
                    }
                }
            }
        }
        //all vowels aren't in the $s
        if ($search === 3) 
            return 0; 
        return strlen($magic);
    }

    public function QuestaoQuatro(int $n, array $a, array $b, array $v)
    {
        //Create an array or size $n+1 filled with 0
        $list = array_fill(1, $n, 0);
        //Since size of $a, $b and $v are the same, we can have here one of them
        $len = count($a);
        //In this loop we go through all array items
        for($i = 0; $i< $len; $i++)
        {
            //$a[$i] is the first and $b[$i] is the last element to be summed by $v[$i]
            for($j = $a[$i]; $j <= $b[$i]; $j++)
            {
                $list[$j] += $v[$i];
            }
        }
        //Now we have the greater item in the array
        return max($list);
    }
}
