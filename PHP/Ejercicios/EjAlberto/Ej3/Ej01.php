<?php
    function setLanguageCookie($langCO) {
        setcookie('lang', $langCO, time() + 365 * 24 * 3600, '/');
    }
    function getLanguageFromCookie() {
        if (isset($_COOKIE['lang'])) { return $_COOKIE['lang']; }
        return 'ES'; 
    }

    if(isset($_COOKIE["lang"])) {
        if (isset($_POST['language'])) {
            if($_COOKIE["lang"] !== $_POST["language"]) {
                setLanguageCookie($_POST["language"]);
                header("Refresh:0");
            }
        }
    } else { setLanguageCookie("ES"); }
?>
<!DOCTYPE HTML>  
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cookies</title>
    </head>

    <body>
        <h1>COOKIE</h1>     <!--Create a web page with a form to choose the language in which it is displayed, English or Spanish. 
                            Stores the user's choice with a cookie so that the next time the user logs on the page appears directly in their language. 
                            If the cookie does not exist, the page will be displayed in Spanish.
-->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="language">Select Language:</label>
            <select name="language" id="language">
                <option value="ES" <?php if (getLanguageFromCookie() === 'ES') echo 'selected'; ?>>Spanish</option>
                <option value="EN" <?php if (getLanguageFromCookie() === 'EN') echo 'selected'; ?>>English</option>
                <input type="submit" value="Submit">
        </form>

        <?php
            if(getLanguageFromCookie() === "ES") { echo "Hola, como estas?"; }
            if(getLanguageFromCookie() === "EN") { echo "Hello, how are you?"; }
        
            echo "<br>";
            //var_export($_COOKIE);
        ?>
    </body>
</html>