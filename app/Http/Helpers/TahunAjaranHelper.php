<?php

if (!function_exists('generateTahunAjaran')) {
    function generateTahunAjaran($startYear = 2024, $years = 10)
    {
        $tahunAjaran = [];

        for ($year = $startYear; $year < ($startYear + $years); $year++) {
            $tahunAjaran[] = $year . '-' . ($year + 1);
        }

        return $tahunAjaran;
    }
}

// namespace App\Http\Helpers;

// class TahunAjaranHelper
// {
//     public static function generateTahunAjaran($startYear = 2024, $years = 6)
//     {
//         $endYear = $startYear + $years;
//         $tahunAjaran = [];

//         for ($year = $startYear; $year < $endYear; $year++) {
//             $tahunAjaran[] = $year . '-' . ($year + 1);
//         }

//         return $tahunAjaran;
//     }
// }
