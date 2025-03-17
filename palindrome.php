
   <?php  
//declare(strict_types = 1);
   

    function longestPalindromicSubstring(string $s){
        if (!$s || strlen($s) < 1) return "";

        $longest = "";
        
        for ($i = 0; $i < strlen($s); $i++) {
            $oddPalindrome = expandAroundCenter($s, $i, $i);
            $evenPalindrome = expandAroundCenter($s, $i, $i + 1);

            $currentLongest = strlen($oddPalindrome) > strlen($evenPalindrome) ? $oddPalindrome : $evenPalindrome;
       
            if (strlen($currentLongest) > strlen($longest)) {
                $longest = $currentLongest;
            }
        }
        return $longest;
    }

    function expandAroundCenter($s, $left, $right) { 
        while ($left >= 0 && $right < strlen($s) && $s[$left] === $s[$right]) {
            $left--;
            $right++;
        }
        return substr($s, $left + 1, ($right - $left - 1)); //subtract one to exclude teh extra increment when the loop finishes
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Longest Palindromic Substring Finder</title>
</head>
<body>

    <h1>Longest Palindromic Substring Finder</h1>

    <form method="POST">
        <label for="inputString">Enter a string:</label>
        <input type="text" id="inputString" name="inputString" required>
        <button type="submit">Find Palindrome</button>
    </form>

    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $inputStr = $_POST['inputString'];
            $result = longestPalindromicSubstring($inputStr);
            echo "<p>Longest Palindromic Substring: <strong>$result</strong></p>";
        }
    ?>

</body>
</html>