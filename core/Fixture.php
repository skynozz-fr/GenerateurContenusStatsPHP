<?php

class Fixture
{
    public static function randomString($length = 10): string
    {
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    public static function randomInt($length = 10): int
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return (int) $randomString;
    }

    public function clear(string $table): Fixture
    {
        Database::getInstance()
            ->prepare("DELETE FROM $table")
            ->execute();

        return $this;
    }
}