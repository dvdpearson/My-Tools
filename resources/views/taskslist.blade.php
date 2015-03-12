<html>
	<head>
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				display: table;
			}

			.container {
			    padding: 20px;
			}

			h1 {
			    margin: 0;
			    padding: 0;
			}

			.title {
				font-size: 96px;
				margin-bottom: 40px;
			}

			.quote {
				font-size: 24px;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="content">
				<h1>Tasks list</h1>
			</div>
			<ul>
			    <?php foreach ($tasks as $task): ?>
			    <li><?php echo $task->name; ?> [<a href="/task/delete/<?php echo $task->id; ?>">Delete</a>]</li>
			    <?php endforeach; ?>
			</ul>
			<form action="/" name="task" method="post">
			    <input type="text" name="name" />
			    <input type="submit" name="submit" value="Submit" />
			    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
			</form>
			<?php if (isset($error) && $error): ?>
			<div>
			    Error
			</div>
			<?php endif; ?>
		</div>
	</body>
</html>
