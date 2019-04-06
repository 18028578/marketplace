// script for the button to go back to top
var btn = $('#button');

$(window).scroll(function() {
	// change the number to the scroll pixel of when the button is displayed currently set to 100px
	if ($(window).scrollTop() > 100) {
		btn.addClass('show');
	} else {
		btn.removeClass('show');
	}
});

btn.on('click', function(e) {
    e.preventDefault();
		// change the number here to match the number changed above.
    $('html, body').animate({scrollTop:0}, '100');
});

/* example of using this:
<head>
	<a id="button"></a>
</head>
<body>
<script src="assets/js/btt.js"></script>
</body>

Alternatively Bootstrap can be used like this:
<head>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>
<body id="page-top">
	(Contents)
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<script src="vendor/jquery/jquery.min.js"></script>
</body>
*/
