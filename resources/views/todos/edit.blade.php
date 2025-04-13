<x-main-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <section class="flex">
    <a href="{{ route("todos.index") }}" class="border-2 border-transparent py-3 text-[#222] duration-200 px-4 text-base bg-gray-300 rounded-md hover:bg-gray-400">Get Back</a>
  </section>
  <section class="mt-10">
    <form method="POST" class="flex flex-col">
      <div class="flex flex-col mb-5 space-y-2">
        <label for="name" class="text-lg font-semibold text-[#222]">Todo Name</label>
        <input type="text" id="name" name="name" placeholder="Input todo name here..." class="border border-[#222] rounded-md py-3 px-4 outline-none">
      </div>
      <div class="flex flex-col mb-5 space-y-2">
        <label for="category" class="text-lg font-semibold text-[#222]">Todo Category</label>
        <select id="category" name="category" class="border border-[#222] rounded-md py-3 px-4 outline-none">
          <option value="">Choose todo category</option>
          <option value="learning">Learning</option>
          <option value="project">Project</option>
          <option value="daily">Daily</option>
        </select>  
      </div>
      <div class="flex flex-col mb-5 space-y-2">
        <label for="start_time" class="text-lg font-semibold text-[#222]">Start Time</label>
        <input type="time" id="start_time" name="start_time" class="border border-[#222] rounded-md py-3 px-4 outline-none">
      </div>
      <div class="flex flex-col mb-5 space-y-2">
        <label for="end_time" class="text-lg font-semibold text-[#222]">End Time</label>
        <input type="time" id="end_time" name="end_time" class="border border-[#222] rounded-md py-3 px-4 outline-none">
      </div>
      <div class="flex flex-col mb-5 space-y-2">
        <label for="description" class="text-lg font-semibold text-[#222]">Description</label>
        <textarea rows="7" placeholder="Input todo description here..." id="description" name="description" class="border border-[#222] rounded-md py-3 px-4 outline-none"></textarea>
      </div>

      <button type="submit" class="py-3 text-center w-full bg-[#222] border-2 border-transparent text-white rounded-md font-semibold">Submit</button>
    </form>
  </section>
</x-main-layout>