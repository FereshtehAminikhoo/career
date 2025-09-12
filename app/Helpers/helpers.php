<?php

     if (!function_exists('toToman')) {
         function toToman($rials) {
             $toman = $rials / 10; // Convert Rials to Toman
             $formatter = new NumberFormatter('fa_IR', NumberFormatter::DECIMAL);
             return $formatter->format($toman) . ' میلیون تومان';
         }
     }

     if (!function_exists('toPersianDate')) {
         function toPersianDate($gregorianDate) {
             $date = new DateTime($gregorianDate);
             $year = $date->format('Y');
             $month = $date->format('m');
             $day = $date->format('d');
             // Approximate Gregorian to Persian (Jalali) conversion
             $persianYear = $year - 621;
             $persianMonth = $month; // Simplified, assumes months align
             $persianDay = $day;
             return sprintf('%04d/%02d/%02d', $persianYear, $persianMonth, $persianDay);
         }
     }