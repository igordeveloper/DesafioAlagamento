<?php

namespace Classes;

/**
 * 
 */
class Flodding
{

	/**
     *
     * @return int
     */
    public static function calculate(int $size, array $silhouettes) :int
    {

    	$leftBlock = $silhouettes[0];

    	$sum = 0;

    	$count = 1;

    	while ($count < $size -1) {

    		if($silhouettes[$count] < $leftBlock){

    			$rightBlock = max(array_slice($silhouettes, $count, $size -1));

    			if($leftBlock <= $rightBlock){
    				$sum = $sum + ($leftBlock - $silhouettes[$count]);
    			}else{
    				$sum = $sum + ($rightBlock - $silhouettes[$count]);
    			}

    		}else{
    			$leftBlock = $silhouettes[$count];
    		}

    		$count++;
    	}

    	return $sum;

    }

}