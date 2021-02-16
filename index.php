<!DOCTYPE HTML>
<html>
<head>
    <title>Domain is for sale !</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="description"
          content="This domain is for sale">
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
<body class="is-preload">

<!-- Header -->
<header id="header">
    <h1><span id="domain"></span> is for sale !</h1>
    <p>You are interested in this domain ?<br />
        Make an offer !</p>
</header>

<!-- Signup Form -->
<form id="signup-form" method="post" action="index.php">
    <input type="email" name="email" id="email" placeholder="Email Address" />
    <input type="number" name="number" id="number" placeholder="Offer value ($)" min="20"/>
    <input type="submit" value="Send offer" />
</form>

<!-- Footer -->
<footer id="footer">
    <ul class="copyright">
        <li>&copy; <a href="https://opuseo.com" target="_blank">Opuseo</a>.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
    </ul>
</footer>

<!-- Scripts -->
<script src="assets/js/main.js"></script>
<script>
    String.prototype.capitalize = function(){
        return this.replace(/(^|\s)([a-z])/g,
            function(m, p1, p2) {
                return p1 + p2.toUpperCase();
            });
    };

    document.getElementById('domain').innerHTML = window.location.hostname.capitalize();
</script>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        if (isset($_POST['number']) && !empty($_POST['number'])) {
            if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                if ($_POST['number'] >= 20) {
                    $message = "Offre d'un montant de " . $_POST['number'] . "$ par " . $_POST['email'];
                    mail('{{Email}}','Offre {{Domain}}', $message);
                }
            }
        }
    }
}
?>
