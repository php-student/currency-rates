<?php /**
 * Created by PhpStorm.
 * User: Admin
 * Date: 18.10.2015
 * Time: 14:53
 */

require(__DIR__ . '/../app/core.php');
$options = getopt("d::", array('name:',));
if(
isset($options['name'])
) {
    $name = $options['name'];
    $action = isset($options['d']) ? 'down' : 'up';

    $m = new Migrate();
    $m->run($name, $action);
} else {
    echo "use command: migrate.php --name=NAME [-d]";
}