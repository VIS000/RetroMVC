<?php
foreach(glob('system/*.php') as $file)
{
	require($file);
}

new Core($config);
new Security();
?>