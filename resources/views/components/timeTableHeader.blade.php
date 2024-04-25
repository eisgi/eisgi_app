   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600" rel="stylesheet">
   <link rel="stylesheet" href="{{ asset('style/emploi/css/reset.css') }}"> <!-- Réinitialisation CSS -->
   <link rel="stylesheet" href="{{ asset('style/emploi/css/style.css') }}"> <!-- Style des ressources -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

   <title>d'emploi du temps {{ $gr }}</title>
   <style>
       /* Cool button style */
       .cool-button {
           display: inline-block;
           background-color: #4CAF50;
           /* Green */
           border: none;
           color: white;
           padding: 15px 32px;
           text-align: center;
           text-decoration: none;
           display: inline-block;
           font-size: 16px;
           margin: 4px 2px;
           transition-duration: 0.4s;
           cursor: pointer;
           border-radius: 8px;
           box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
       }

       .cool-button:hover {
           background-color: #45a049;
           /* Darker green */
           color: white;
       }
   </style>
