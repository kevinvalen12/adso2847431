<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List All Users</title>
</head>
<body class=
            "bg-teal-800
            text-teal-200
            flex
            flex-col
            gap-8
            justify-center
            min-h-[100dvh]
            items-center"> 
    <h1 class=
                "font-bold 
                border-b-2
                text-4xl">
                List All Users 
                <small class=
                "text-teal-400 
                text-lg">
                Factory challenge
                </small>
            </h1>
            
            <section 
            class= "users 
                    grid 
                    grid-cols-5 
                    gap-2">

            @foreach($users as $user)
                <div class=
                    "bg-teal-700 
                    p-4 
                    rounded-lg">
                    <img src="{{ asset('images/'.$user->photo)}} "width="100px" height="100px" class="rounded-full" alt="User Photo">
                    <h2 class=
                        "font-bold 
                        text-lg">
                        {{ $user->fullname }}
                    </h2>
                    <p class=
                        "text-sm">
                        {{ $user->gender}}
                    </p>
                    <p class=
                        "text-sm">
                        {{ $user->email }}
                    </p>
                    <p class=
                        "text-sm">
                        {{ $user->phone}}
                    </p>
                    <h5>
                        Adoptiones 
                        <small>{{ $user->adoptions->count() }}</small>
                    </h5>
                </div>
            @endforeach

            </section>


    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</body>
</html>