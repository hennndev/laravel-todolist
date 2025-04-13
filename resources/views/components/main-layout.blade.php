<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>{{ $title }}</title>
  @vite(["resources/css/app.css"])
</head>
<body>
  <header class="flex items-center justify-between max-w-[1200px] mx-auto py-3">
    <h1 class="text-[#222] text-3xl font-black">Todolist</h1>
    <nav class="flex items-center space-x-5">
      <a href="{{ route("todos.index") }}" class="text-[#222] text-lg font-normal hover:text-blue-500">Todos</a>
      <a href="" class="text-[#222] text-lg font-normal hover:text-blue-500">Login</a>
      <a href="" class="bg-[#222] text-white py-2 px-4 rounded-md cursor-pointer outline-none text-lg font-normal ml-4 hover:bg-black duration-200">Register</a>
    </nav>
  </header>

  <main class="max-w-[1200px] mx-auto my-10">
    {{ $slot }}
  </main>
</body>
</html>