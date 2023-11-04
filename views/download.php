<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
  		<title><?= $course_arr[ 'title' ] . '-' . $course_arr[ 'cs_code' ] ?> Questions</title>
	</head>
	<body>
		<main>
			<header style="text-align: center;">
				<h2><?= $course_arr[ 'title' ] . ' - ' . $course_arr[ 'cs_code' ] ?></h2>
				<h3><?= $course_arr[ 'unit' ] ?> Units</h3>
			</header>
			<section>
				<ol>
					<?= $sel_qt_output ?>
				</ol>
			</section>
		</main>
	</body>
</html>