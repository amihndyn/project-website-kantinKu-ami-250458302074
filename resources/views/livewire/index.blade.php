<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KantinKu - Makanan Favorit</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        @supports (text-wrap: balance) {
            .text-balance {
                text-wrap: balance;
            }
        }
    </style>
</head>
<body class="bg-gray-100">
    <livewire:components.navbar>

    <main class="pb-20 bg-gradient-to-b from-[#FCF5EE] to-[#8FABD4]">
        <livewire:components.jumbotron>
        <livewire:components.about>
        <livewire:components.popular-menu>
    </main>

    <livewire:components.footer>
</body>
</html>