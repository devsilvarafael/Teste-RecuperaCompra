<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite('resources/css/app.css')

    <title>Lista de Categorias - RecuperaCompra</title>
    @notifyCss
</head>

<body class="bg-[#f8f8f8]">
    <div class="w-screen md:px-12 md:py-1 menu">
        <div class="flex justify-between items-center m-2">
            <div class="flex items-center">
                <a href="{{ route('users.index') }}">
                    <img src={{ asset('/assets/logo_recupera_compra.png') }} class="w-28" />
                </a>

                <a href="{{ route('users.index') }}" class="ml-12">Usuários</a>
            </div>

            <a href={{ route('login.signOut') }}>Sair</a>
        </div>
    </div>

    <x-notify::notify />
    @notifyJs

    <div class="md:px-12 md:pt-12">
        <p class="mb-2">Olá, {{ session('name') }}</p>

        <div class="flex justify-between">
            <h1 class="text-3xl">Categorias cadastradas</h1>

            <form class="w-80" method="GET" action="{{ route('categories.search') }}">
                <input type="text" placeholder="Procure por uma categoria" name="search" />
            </form>

        </div>

        <div class="mt-12">
            <a href="{{ route('categories.create') }}"
                class="w-14 h-14 bg-cyan-700 p-2 rounded-md text-white font-bold">Adicionar categorias</a>

            <table class="min-w-full text-left text-sm font-light mt-4">
                <thead class="border-b font-medium dark:border-neutral-500">
                    <tr>
                        <th scope="col" class="px-6 py-4">ID</th>
                        <th scope="col" class="px-6 py-4">Nome</th>
                        <th scope="col" class="px-6 py-4">Descrição</th>
                        <th scope="col" class="px-6 py-4">Criado em</th>
                        <th scope="col" class="px-6 py-4">Autor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr class="border-b dark:border-neutral-500">

                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $category->id }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $category->name }}</td>
                            <td class="wrap px-6 py-4 max-w-[300px]">{{ $category->description }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $category->created_at }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $category->user->name }}</td>

                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 20 20"
                                        fill="#ff9966">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                        </path>
                                    </svg>
                                </a>
                            </td>

                            <td>
                                <form action="{{ route('categories.delete', $category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 20 20"
                                            fill="#cc3300">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
