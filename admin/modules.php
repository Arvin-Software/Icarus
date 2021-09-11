<?php
function getDirContents($dir, &$results = array()) {
    $files = scandir($dir);

    foreach ($files as $key => $value) {
        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
        if (!is_dir($path)) {
            // $results[] = $path;
        } else if ($value != "." && $value != "..") {
            getDirContents($path, $results);
            $results[] = $path;
        }
    }

    return $results;
}
$res = getDirContents('addons');
?>
<table>
    <tr>
        <th>SL.NO</th>
        <th>Icon</th>
        <th>Module name</th>
        <th>Action</th>
    </tr>
<?php
$count = 0;
foreach($res as $dir){
    $count += 1;
    echo '<tr><td>' . $count . '</td><td><img src="addons/' . basename($dir) . '/icon.svg" style="width: 20px; height:20px;"></td><td>' . basename($dir) . '</td><td><a href="addons/' . basename($dir) . '/index.php">Open module</td></tr>';
    // echo basename($dir) . '<br />';
}
// echo $res[1];
// var_dump(getDirContents('addons'));
?>
</table>