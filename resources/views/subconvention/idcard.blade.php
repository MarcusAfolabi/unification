<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Sub Convention ID CARD</title>
	<link rel="stylesheet" href="{{ asset('assets/card.css') }}" />
	<script src="https://kit.fontawesome.com/66aa7c98b3.js" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
	<style>
		.container {
			display: flex;
			justify-content: space-around;
			flex-wrap: wrap;
		}

		.meal-table {
			width: 50%;
			border-collapse: collapse;
			margin: 20px;
		}

		.meal-table th,
		.meal-table td {
			border: 1px solid #ddd;
			padding: 10px;
			text-align: center;
		}

		.meal-table th {
			background-color: #f2f2f2;
			font-weight: bold;
		}

		.id-card-section {
			width: 40%;
			margin: 20px;
		}
	</style>
</head>

<body>

	<div class="container" id="pdf-content">
		<!-- Meal Schedule Table -->
		<table class="meal-table">
			<tr>
				<th>Day</th>
				<th>Breakfast</th>
				<th>Lunch</th>
				<th>Dinner</th>
			</tr>
			<tr>
				<td>Thursday</td>
				<td><input type="checkbox"></td>
				<td><input type="checkbox"></td>
				<td><input type="checkbox"></td>
			</tr>
			<tr>
				<td>Friday</td>
				<td><input type="checkbox"></td>
				<td><input type="checkbox"></td>
				<td><input type="checkbox"></td>
			</tr>
			<tr>
				<td>Saturday</td>
				<td><input type="checkbox"></td>
				<td><input type="checkbox"></td>
				<td><input type="checkbox"></td>
			</tr>
			<tr>
				<td>Sunday</td>
				<td><input type="checkbox"></td>
				<td><input type="checkbox"></td>
				<td><input type="checkbox"></td>
			</tr>
		</table>

		<!-- ID Card Content -->
		<div class="id-card-section">
			<div class="id-card-tag"></div>
			<div class="id-card-tag-strip"></div>
			<div class="id-card-hook"></div>
			@if ($myidcard)
			<div class="id-card-holder">
				<div class="id-card">
					<p>isokan-{{ date('Y') }}-00--{{ $myidcard->id }}</p>
					<div class="header">
						<img src="{{ asset('assets/images/favicon/mstile-150x150.png') }}">
					</div>
					<div class="photo">
						<img src="{{ asset($myidcard->profile_image) }}">
					</div>
					<h2>{{ $myidcard->firstname }} {{ $myidcard->lastname }}
						<br>{{ $myidcard->fellowship_status }}
					</h2>
					<h2>{{ $myidcard->unit_id }}</h2>
					<hr>
					<h3>{{ $myidcard->fellowship_id }} <br> {{ $myidcard->academic_status }}<br />
						<strong>{{ $houses->name }}</strong>
					</h3>
					<hr>
					<h6>
						<small style="font-size: 10px;">
							Central Office: www.cnsunification.org
							<br>No 13, Iyaniwura Street, Everbest Busstop, Meran, Lagos.
							<br>helpdesk@cnsunification.org <br> 08028554541, 08036506376
							<br>If lost, pls call
							<br>Phone: {{ $myidcard->phone }} <br>Email: {{ $myidcard->email }}
						</small>
					</h6>

				</div>
			</div>
			@endif
		</div>
	</div>

	<script>
		// Wait 1 second after page load to generate and download PDF
		window.onload = function() {
			setTimeout(() => {
				const element = document.getElementById('pdf-content');
				html2pdf(element, {
					margin: 0.5,
					filename: 'Meal_Schedule_and_ID_Card.pdf',
					image: {
						type: 'jpeg',
						quality: 0.98
					},
					html2canvas: {
						scale: 2
					},
					jsPDF: {
						unit: 'in',
						format: 'letter',
						orientation: 'portrait'
					}
				});
			}, 1000); // 1000 ms = 1 second delay
		};
	</script>

</body>

</html>