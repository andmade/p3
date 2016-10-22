<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>@yield("title", "andmade | p3")</title>
		<!--CSS-->
		<link href="https://fonts.googleapis.com/css?family=Cabin:400,700,700i|Dosis:200,400,700|NTR" rel="stylesheet">
		<link rel="stylesheet" href="/css/foundation.min.css" />
		<link rel="stylesheet" href="/css/p3.css">
		
		<!-- Javascript -->
		<script src="https://code.jquery.com/jquery-2.2.3.min.js" type="text/javascript"></script>
		<script src="/js/vendor/foundation.min.js" type="text/javascript"></script>
		@yield("head")
	</head>
	<body>
		
		@yield("content")

		<footer>
            <p>&copy; andmade {{ date('Y') }}</p>
        </footer>

         @yield('body')
	</body>
</html>