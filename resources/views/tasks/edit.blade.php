<x-main-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <section class="flex">
    <a href="{{ route("todos.detail", $todo_id) }}" class="border-2 border-transparent py-3 text-[#222] duration-200 px-4 text-base bg-gray-300 rounded-md hover:bg-gray-400">Get Back</a>
  </section>
  <section class="mt-10">
    <form action="{{ route("tasks.update", ["todo_id" => $todo_id, "task_id" => $task_id]) }}" method="POST" class="flex flex-col">
      @csrf
      @method("PUT")
      <div class="flex flex-col mb-5 space-y-2">
        <label for="name" class="text-lg font-semibold text-[#222]">
          Task Name
          <span class="text-red-500">*</span>
        </label>
        <input 
          type="text" 
          id="name" 
          name="name" 
          value="{{ $data->name }}"
          placeholder="Input task name here..." 
          class="border border-[#222] rounded-md py-3 px-4 outline-none">
        @error('name')
          <p class="text-red-500 font-medium text-sm">{{ $message }}</p>
        @enderror
      </div>
      <button type="submit" class="py-3 text-center w-full bg-[#222] border-2 border-transparent text-white rounded-md font-semibold hover:bg-black duration-200">Submit</button>
    </form>
  </section>
</x-main-layout>