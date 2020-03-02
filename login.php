<?php require_once('includes/php.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<?php echo getHeadTags('Home');?>
</head>

<body onload="loadHeaderBarContents();loadLoginHtml();">
	<header></header>

	<div id="content">
		<main>
			<div class="wrapperMain" id="wrapperMain">
			</div>
		</main>
		<div id="responseLogIcon" onclick="toggleResponseLog()">
		</div>
	</div>

	<footer>bye</footer>
</body>
