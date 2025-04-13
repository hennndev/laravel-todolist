<x-main-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <section class="flex">
    <a href="{{ route("todos.index") }}" class="border-2 border-transparent py-3 text-[#222] duration-200 px-4 text-base bg-gray-300 rounded-md hover:bg-gray-400">Get Back</a>
  </section>
  <section class="mt-10">
    <form action="{{ route("todos.store") }}" method="POST" class="flex flex-col">
      @csrf
      <div class="flex flex-col mb-5 space-y-2">
        <label for="name" class="text-lg font-semibold text-[#222]">
          Todo Name
          <span class="text-red-500">*</span>
        </label>
        <input 
          type="text" 
          id="name" 
          name="name" 
          value="{{ old("name") }}"
          placeholder="Input todo name here..." 
          class="border border-[#222] rounded-md py-3 px-4 outline-none">
        @error('name')
          <p class="text-red-500 font-medium text-sm">{{ $message }}</p>
        @enderror
      </div>
      <div class="flex flex-col mb-5 space-y-2">
        <label for="category" class="text-lg font-semibold text-[#222]">
          Todo Category <span class="text-red-500">*</span>
        </label>
        <select 
          id="category" 
          name="category" 
          value="{{ old("category") }}"
          class="border border-[#222] rounded-md py-3 px-4 outline-none">
          <option value="">Choose todo category</option>
          <option value="learning">Learning</option>
          <option value="project">Project</option>
          <option value="daily">Daily</option>
        </select>  
        @error('category')
          <p class="text-red-500 font-medium text-sm">{{ $message }}</p>
        @enderror
      </div>
      <div class="flex flex-col mb-5 space-y-2">
        <label for="start_time" class="text-lg font-semibold text-[#222]">
          Start Time <span class="text-red-500">*</span>
        </label>
        <input 
          type="datetime-local" 
          id="start_time" 
          name="start_time" 
          value="{{ old("start_time") }}"
          class="border border-[#222] rounded-md py-3 px-4 outline-none">
        @error('start_time')
          <p class="text-red-500 font-medium text-sm">{{ $message }}</p>
        @enderror
      </div>
      <div class="flex flex-col mb-5 space-y-2">
        <label for="end_time" class="text-lg font-semibold text-[#222]">End Time</label>
        <input 
          type="datetime-local" 
          id="end_time" 
          name="end_time" 
          value="{{ old("end_time") }}"
          class="border border-[#222] rounded-md py-3 px-4 outline-none">
        <p class="text-gray-500 text-sm">Optional</p>
      </div>
      <div class="flex flex-col mb-5 space-y-2">
        <label for="description" class="text-lg font-semibold text-[#222]">
          Description <span class="text-red-500">*</span>
        </label>
        <textarea 
          rows="7"
           placeholder="Input todo description here..." 
           id="description" 
           name="description" 
           value={{ old("description") }}
           class="border border-[#222] rounded-md py-3 px-4 outline-none"></textarea>
        @error('description')
          <p class="text-red-500 font-medium text-sm">{{ $message }}</p>
        @enderror
      </div>
      <button type="submit" class="py-3 text-center w-full bg-[#222] border-2 border-transparent text-white rounded-md font-semibold hover:bg-black duration-200">Submit</button>
    </form>
  </section>
</x-main-layout>