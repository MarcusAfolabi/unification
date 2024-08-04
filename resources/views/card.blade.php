<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Card Design</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .back-image {
            background-image: url('https://cnsunification.org/assets/images/logo.png');
            background-size: cover;
            background-position: center;
            opacity: 0.5;
            /* Adjust the opacity for transparency */
            border-radius: 0.5rem;
            /* Rounded corners */
        }

        .meal-table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 1rem;
        }

        .meal-table th,
        .meal-table td {
            border: 1px solid #ddd;
            padding: 0.5rem;
            text-align: center;
        }

        .meal-table th {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body class="bg-blue-900 flex items-center justify-center h-screen">
    <div class="flex space-x-4">
        <!-- Front Side -->
        <div class="bg-white rounded-lg shadow-lg w-full p-4">
            <div class="flex justify-center mb-4">
                <div class="bg-blue-900 h-16 w-16 rounded-full flex items-center justify-center">
                    <img src="https://demo.foxthemes.net/socialite-v3.0/assets/images/avatars/avatar-3.jpg" alt="Profile" class="rounded-full h-12 w-12">
                </div>
            </div>
            <div class="text-center mb-4">
                <h2 class="text-xl font-semibold">AFOLABI MARCUS ABIODUN </h2>
                <p class="text-gray-600">Choir Member</p>
            </div>
            <div class="text-sm text-gray-600 mb-4">
                <p><strong>Phone no </strong> 09035155120</p>
                <p><strong>Campus: </strong> Graudate of Federal Polytechnic Ede</p>
            </div>
            <div class="flex justify-center">
                {!! $qrcode !!}
                <!-- <img src="https://demo.foxthemes.net/socialite-v3.0/assets/images/avatars/avatar-2.jpg" alt="QR Code" class="h-16 w-16"> -->
            </div>
        </div>
        <!-- Back Side -->
        <div class="bg-white rounded-lg shadow-lg w-full p-4 flex items-center justify-center">
            <div class="relative w-full h-full">
                <div class="back-image h-full w-full absolute top-0 left-0"></div>
                <div class="relative z-10 text-center p-4">
                    <div class="bg-blue-900 p-2 rounded-lg mb-4">
                        <h2 class="text-xl font-semibold text-white uppercase">C & S Church Unification Campus Fellowship</h2>
                        <p class="text-yellow-400 uppercase">Subconvention 2024</p>
                    </div>
                    <table class="meal-table mx-auto">
                        <thead>
                            <tr>
                                <th>Day</th>
                                <th>Morning</th>
                                <th>Afternoon</th>
                                <th>Evening</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Thursday</td>
                                <td>Meal 1</td>
                                <td>Meal 2</td>
                                <td>Meal 3</td>
                            </tr>
                            <tr>
                                <td>Friday</td>
                                <td>Meal 1</td>
                                <td>Meal 2</td>
                                <td>Meal 3</td>
                            </tr>
                            <tr>
                                <td>Saturday</td>
                                <td>Meal 1</td>
                                <td>Meal 2</td>
                                <td>Meal 3</td>
                            </tr>
                            <tr>
                                <td>Sunday</td>
                                <td>Meal 1</td>
                                <td>Meal 2</td>
                                <td>Meal 3</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>