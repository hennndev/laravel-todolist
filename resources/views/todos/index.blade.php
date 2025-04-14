<x-main-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  
  <section class="flex items-center justify-between">
    <x-search-input></x-search-input>
    <a href="{{ route("todos.add") }}" class="border-2 border-transparent py-3 text-white px-4 text-base bg-[#222] rounded-md hover:bg-black duration-200">Add Todo</a>
  </section>
  <section class="mt-10 grid grid-cols-[repeat(auto-fill,_minmax(300px,_1fr))] gap-5">
    @foreach ($data as $todo)
      <article class="flex flex-col bg-[#222] rounded-md h-[350px] p-6">
        <h1 class="text-white font-bold text-xl line-clamp-2">
          {{ $todo->name }}
        </h1>
        <p class="text-gray-300 mt-3 font-normal line-clamp-3">
          {{ $todo->description }}
        </p>
        <div class="my-3 text-gray-300 flex flex-col space-y-2">
          <p>Tasks: <span class="font-black">5 tasks</span></p>
          <p>Start at: <span class="font-black">{{ $formatted_time($todo->start_time) }}</span></p>
          <p>End at: <span class="font-black">{{ $todo->end_time ? $formatted_time($todo->end_time) : "-" }}</span></p>
        </div>
        <a href="{{ route("todos.detail", $todo->id) }}" class="mt-auto bg-gray-300 hover:bg-gray-100 duration-200 text-[#222] py-2 px-4 rounded-md self-end">Detail</a>
      </article>
    @endforeach
  </section>
</x-main-layout>


@if (session("success"))
  <script>
    $(document).ready(function () {
      window.toast.success('{{ session("success") }}');
    });
  </script>
@endif