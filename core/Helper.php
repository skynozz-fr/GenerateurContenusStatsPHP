<?php

class Helper
{
    private static function getRandomHexaColor(): string
    {
        return '#' . substr(md5(rand()), 0, 6);
    }

    public static function getAvatarByInitials(string $prenom, string $nom): string
    {
        $initials = strtoupper(substr($prenom, 0, 1) . substr($nom, 0, 1));
        $color = self::getRandomHexaColor();
        return "<div class='avatar rounded-circle text-center' style='background-color: $color; color: white; width: 50px; height: 50px; line-height: 50px;'>$initials</div>";
    }

}