</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
		integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
		crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
		integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
		crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"
		integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<!--		<script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>-->
<!--		<script>-->
<!--			CKEDITOR.replace( 'description' );-->
<!--		</script>-->


<script>

	$(document).ready(function () {

		$('.convertCurrency').bind('keyup', function () {

			$('.currency').css('display', 'block');
			let convertCurrency = $('.convertCurrency').val();
			let currency = $('.currency').find(":selected").val();


			$.post('exchange', {currency: currency, convertCurrency: convertCurrency},

					function (response) {
						let data = JSON.parse(response);
						$('.readOnlyInput').val(data.result);
						// $.each(data.query, function (i, data) {
						// 	console.log(data)
						// });
					});

		});
		$('.currency').on('change', function () {

			$('.convertCurrency').trigger("keyup");
		})
		$('.counter').each(function () {
			$(this).prop('Counter', 0).animate({
				Counter: $(this).text()
			}, {
				duration: 4000,
				easing: 'swing',
				step: function (now) {
					$(this).text(Math.ceil(now));
				}
			});
		});

	});
</script>
</body>
</html>
