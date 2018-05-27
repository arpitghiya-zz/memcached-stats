<?php

      $m    = new Memcached;
      $host = 'localhost';
      $port = 11211;
      $m->addServer($host, $port);
      $stats = $m->getstats()[$host.':' . $port];

echo '
    <html>
    <body>
        <h1>Memcached Stats</h1>
        <br>
        <table>
                <th>
                        <tr>Stat</tr>
                        <tr>Value</tr>
                </th>
';

      foreach($stats as $key => $value):
        print("<tr>");
        print(sprintf('<td>%s</td>', $key));
        print(sprintf('<td>%s</td>', $value));
        print("</tr>");

      endforeach;

echo '
        </table>';

        $get_hits = $stats['get_hits'];
        $get_miss = $stats['get_misses'];

        $total_hits = $get_hits + $get_miss;
        $miss = ($total_hits / $get_miss)*100;

        print(sprintf('%s percent of gets missed the cache', $miss));
echo '
    </body>
    </html>
';
    $m->close();

?>