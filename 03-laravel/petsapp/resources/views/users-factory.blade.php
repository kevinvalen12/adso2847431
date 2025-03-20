<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Lista de usuarios</title>
</head>
<body class="bg-teal-800 flex flex-col justify-center items-center min-h-screen text-center">
    <h1 class="text-teal-400 text-4xl border-b-2 border-teal-400 ">
        Lista de usuarios
        <small class="text-teal-400 text-lg">
            Recto de factory
        </small>
    </h1>

    <section class="users grid grid-cols-5 gap-2 mt-4">
        @foreach ($users as $user)
        <div>
            <h3>{{ $user->fullname }}</h3>
        </div>
        @endforeach
    </section>
</body>
</html>