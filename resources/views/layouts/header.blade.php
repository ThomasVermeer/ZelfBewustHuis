<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Voeg Tailwind CSS toe -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Aangepaste CSS-stijlen */
        header {
            padding: 20px;
            color: white;
            text-align: center;
        }
        .banner {
            width: 100%;
            max-width: 100%;
            height: auto;
        }
        footer{
            height: 300px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            color: white;
            text-align: center;
        }
        /* Carrousel stijlen */
        .carousel-container {
            width: 100%;
            max-width: 800px; /* Pas de breedte aan zoals gewenst */
            margin: 0 auto;
            overflow: hidden;
            margin-top: 8px;
            border: 1px solid #ccc; /* Voeg een rand toe voor styling */
            border-radius: 8px; /* Rond de hoeken af */
        }
        .carousel {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }
        .carousel-item {
            flex: 0 0 100%;
            box-sizing: border-box;
            padding: 0 8px;
        }
    </style>
</head>
<header class="bg-green-800">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-bold">Je Bedrijfsnaam</h1>
            <nav class="mt-4">
                <ul class="flex space-x-8">
                    <li><a href="#" class="text-white hover:text-gray-300">Home</a></li>
                    <li><a href="#" class="text-white hover:text-gray-300">Diensten</a></li>
                    <li><a href="#" class="text-white hover:text-gray-300">Over Ons</a></li>
                    <li><a href="#" class="text-white hover:text-gray-300">Contact</a></li>
                    <li><a href="{{ route('login') }}">Inloggen</a>
                </ul>
            </nav>
        </div>
    </header>