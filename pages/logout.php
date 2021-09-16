<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php
	ob_start();
	session_destroy();
	echo '<script>location.href="'.BASE_SITE.'"</script>'
?>