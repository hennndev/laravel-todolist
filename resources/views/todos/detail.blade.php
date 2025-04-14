<x-main-layout>
  <x-slot:title>{{ $title }}</x-slot:title>

  <section class="mt-10">
    <div class="flex items-center justify-between">
      <h1 class="font-black text-3xl text-[#222]">{{ $data->name }}</h1>
      <div class="flex items-center space-x-3">
        <a 
          href="{{ route("todos.edit", "$data->id") }}" 
          class="bg-[#222] text-white py-2 px-4 rounded-md hover:bg-black duration-200 
          {{ $data->is_done ? "line-through bg-gray-500 hover:bg-gray-500 cursor-default pointer-events-none" : "" }}">
          Add Task
        </a>
        <a href="{{ route("todos.edit", "$data->id") }}" class="text-white py-2 px-4 rounded-md hover:bg-blue-600 duration-200 {{ $data->is_done ? "line-through bg-gray-500 hover:bg-gray-500 cursor-default pointer-events-none" : "bg-blue-500" }}">
          Edit Todo
        </a>
        <button class="btn-delete bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600 duration-200" data-id="{{ $data->id }}">Delete Todo</button>
      </div>
    </div>
    <div class="mt-10">
      <p class="text-gray-600 font-normal max-w-[1000px] leading-relaxed text-lg mb-2">
        {{ $data->description }}
      </p>
      <p class="mb-2">Category: <span class="text-lg font-semibold text-[#222] uppercase">{{ $data->category }}</span></p>
      <p class="mb-2">Start time: <span class="text-lg font-semibold text-[#222]">{{ $formatted_time($data->start_time) }}</span></p>
      <p>End time: <span class="text-lg font-semibold text-[#222]">{{ $data->end_time ? $formatted_time($data->end_time) : "-" }}</span></p>
    </div>

    <div class="mt-5 flex items-center space-x-3">
      <button 
        {{ $data->is_done ? "disabled" : "" }} 
        class="btn-done w-[300px] text-center text-white py-2 px-4 rounded-md duration-200 {{ $data->is_done ? "line-through bg-gray-500 hover:bg-gray-500 cursor-default w-max" : "bg-green-600 hover:bg-green-700" }}" data-id="{{ $data->id }}">
        Done todo
      </button>
      @if ($data->is_done)
        <button class="btn-undone w-max text-center text-white py-2 px-4 rounded-md duration-200 bg-[#222] hover:bg-black" data-id="{{ $data->id }}">
          Undone this todo
        </button>
      @endif
    </div>
  </section>
</x-main-layout>




<script>
  $(document).ready(function () {

    $(".btn-delete").click(function (e) { 
      e.preventDefault();
      const id = $(this).data("id");
      $.ajax({
        type: "DELETE",
        url: "{{ route("todos.destroy", ":id") }}".replace(":id", id),
        data: {
          _token: '{{ csrf_token() }}'
        },
        success: function(response) {
          window.toast.success(response.message)
          setTimeout(() => {
            location.reload();
          }, 1500);
        }
      });
    });

    $(".btn-done").click(function (e) { 
      e.preventDefault();
      const id = $(this).data("id");

      $.ajax({
        type: "PATCH",
        url: "{{ route("todos.done", ":id") }}".replace(":id", id),
        data: {
          _token: '{{ csrf_token() }}'
        },
        success: function (response) {
          window.toast.success(response.message);
          setTimeout(() => {
            location.reload();
          }, 1500);
        }
      });
    });



    $(".btn-undone").click(function (e) { 
      e.preventDefault();
      const id = $(this).data("id");

      $.ajax({
        type: "PATCH",
        url: "{{ route("todos.undone", ":id") }}".replace(":id", id),
        data: {
          _token: '{{ csrf_token() }}'
        },
        success: function (response) {
          window.toast.success(response.message);
          setTimeout(() => {
            location.reload();
          }, 1500);
        }
      });
    });
  });
</script>
