<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>NCTVA | Shop</title>
        @vite('resources/css/app.css')
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bitcount+Grid+Double:wght@100..900&display=swap"
            rel="stylesheet">
    </head>

    <body class="bg-gray-50" style="font-family: 'Bitcount Grid Double', sans-serif;">
        <nav class="flex flex-row bg-gray-50 shadow-md h-14 justify-between items-center px-5">
            <!-- Logo -->
            <div class="text-3xl font-bold text-[#3ACAB3]" style="font-family: 'Bitcount Grid Double', sans-serif;">
                NCTVA
            </div>

            <!-- Menu Items (horizontal) -->
            <div class="flex space-x-4">
                <a href="#"
                    class="p-2 text-[#3ACAB3] hover:text-[#58a699] font-bold rounded-md hover:underline transition duration-200 ">Home</a>
                <a href="#"
                    class="p-2 text-[#3ACAB3] hover:text-[#58a699] font-bold rounded-md hover:underline transition duration-200 ">Man</a>
                <a href="#"
                    class="p-2 text-[#3ACAB3] hover:text-[#58a699] font-bold rounded-md hover:underline transition duration-200 ">Article</a>
                <a href="#"
                    class="p-2 text-[#3ACAB3] hover:text-[#58a699] font-bold rounded-md hover:underline transition duration-200 ">About</a>
            </div>
        </nav>

        <div id="main-content" class="p-10">
            <div id="Title" class="flex flex-row justify-between">
                <h1 class="text-3xl" style="font-family: 'Bitcount Grid Double';">
                    Home
                </h1>
                <div class="text-1xl content-center text-gray-500">
                    see more...
                </div>
            </div>
            <div id="card-group" class="flex flex-row">
                <div id="card">
                    <img src="{{ asset('images/article01.jpg') }}" alt="">
                    <p></p>
                </div>
            </div>
        </div>

    </body>



</html>
