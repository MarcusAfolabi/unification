<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Sub Convention ID CARD</title>
	<link rel="stylesheet" href="{{ asset('assets/card.css') }}" />
	<script src="https://kit.fontawesome.com/66aa7c98b3.js" crossorigin="anonymous"></script>
</head>

<body>
	
	<div class="id-card-tag"></div>
	<div class="id-card-tag-strip"></div>
	<div class="id-card-hook"></div>
	@if ($myidcard)
	<div class="id-card-holder">
		<div class="id-card">
			<p>
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
			<br>{{ $myidcard->unit_id}}</h2>
			<hr>
			<h3>{{ $myidcard->fellowship_id }} | {{ $myidcard->academic_status }}<br />
				<!-- <strong>Coker House  </strong> -->
			</h3>
			<hr>
			<h6> <small> Central Office: www.cnsunification.org
					<br>No 13, Iyaniwura Street, Everbest Busstop, Meran, Lagos.
					<br>helpdesk@cnsunification.org <br> 08028554541, 08036506376
					<br>
					<br> If lost, pls call
					<br>Phone: {{ $myidcard->phone }} <br> Email: {{ $myidcard->email }}</small></h6>
		</div>
	</div>
	@endif

</body>

</html>