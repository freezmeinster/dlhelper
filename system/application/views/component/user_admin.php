<?php
    echo "<br>User Editor";
    echo "<table class=\"perlu\">\n";
    echo "<tr><th>Username</th><th>Nama</th><th>Email</th><th>Level</th><th>Pilihan</th></tr>\n";
    $this->setting->list_user();
    echo "</table>\n"
?>