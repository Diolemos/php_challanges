<?php 
    declare(strict_types = 1);

    function longestPalindromicSubstring(string $s){
        if(!$s or strlen($s) < 1 ) return "";

        $longest = "";
        
        for($i=0;$i<strlen($s);$i++){
            $oddPalindrome = expandAroundCenter($s,$i,$i) ;
            $evenPalindrome = expandAroundCenter($s,$i,$i +1);

            $currentLongest = strlen($oddPalindrome) > strlen($evenPalindrome) ? $oddPalindrome : $evenPalindrome;
       
            if (strlen($currentLongest) > $longest){
                $longest = $currentLongest;
            }
       
        }
        return $longest;
    }


     function expandAroundCenter($s,$left,$right){ 
        while ($left >= 0 && $right < strlen($s) && $s[$left] === $s[$right]) {
            $left--;
            $right++;
        }
        return  substr($s,$left+1,($right - $left - 1)) ; //subtract one to exclude the extra increment when teh loop finishes
    }