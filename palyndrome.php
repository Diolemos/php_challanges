<?php 
    declare(strict_types = 1);

    function longestPalindromicSubstring(string $s){
        if(!$s or strlen($s) < 1 ) return "";

        $longest = "";
        
        for($i=0;$i<strlen($s);$i++){
            $oddPalindrome = "" ;
            $evenPalindrome = "";
        }
    }


     function expandAroundCenter($s,$left,$right){ 
        while ($left >= 0 && $right < strlen($s) && $s[$left] === $s[$right]) {
            $left--;
            $right++;
        }
        return  substr($s,$left+1,($right - $left - 1)) ;
    }