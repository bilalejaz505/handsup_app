<?php

session_start();
?>
<body background="logos/bg_blue.png">
<?php
session_destroy();

echo("<script>location.href = 'index.php';</script>");

?>
</body>