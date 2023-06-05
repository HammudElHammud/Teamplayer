<?php

class General
{
    /**
     * @param $length
     * @param $min
     * @param $max
     * @return array
     */
    public static function generateUniqueIntArray($length, $min, $max): array
    {
        $array = [];

        while (count($array) < $length) {
            $randomNumber = rand($min, $max);

            if (!in_array($randomNumber, $array)) {
                $array[] = $randomNumber;
            }
        }

        return $array;
    }

    public static function checkRatingIfNotUsed(int $rating, array $ratings,): bool
    {
        return in_array($rating, $ratings);
    }

    public static function getRandomRating(array $ratings): int
    {
        return $ratings[array_rand($ratings)];
    }

    public static function generateUniqueRating(array $ratings, array $usedRatings): int
    {
        $rating = self::getRandomRating($ratings);

        while (self::checkRatingIfNotUsed($rating, $usedRatings)) {
            $rating = self::getRandomRating($ratings);
        }

        return $rating;
    }
}
