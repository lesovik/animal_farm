<?php
namespace Tools;

/**
 * Class Randomizer;
 *
 * @description randomizer utility class
 *
 */
class Randomizer

{

    /**
     * @param int $length
     * @param int $lowThreshold
     * @param int $highThreshold
     * @return int []
     */
    public static function getRandomUniqueArray(
        $length,
        $lowThreshold = RND_LOW_THRESHOLD,
        $highThreshold = RND_HIGH_THRESHOLD
    )
    {
        $randomUniqueArray = [];
        while (count($randomUniqueArray) <= $length) {
            $randomNumber = rand($lowThreshold, $highThreshold);
            if (!in_array($randomNumber, $randomUniqueArray)) {
                $randomUniqueArray[] = $randomNumber;
            }
        }
        return $randomUniqueArray;

    }

}