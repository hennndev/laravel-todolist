<x-main-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <section class="flex">
    <a href="{{ route("todos.index") }}" class="border-2 border-transparent py-3 text-[#222] duration-200 px-4 text-base bg-gray-300 rounded-md hover:bg-gray-400">Get Back</a>
  </section>
  <section class="mt-10">
    <form action="{{ route("todos.update", $data->id) }}" method="POST" class="flex flex-col">
      @csrf
      @method("PUT")
      <div class="flex flex-col mb-5 space-y-2">
        <label for="name" class="text-lg font-semibold text-[#222]">Todo Name</label>
        <input 
          type="text" 
          id="name" 
          name="name" 
          value="{{ $data["name"] }}"
          placeholder="Input todo name here..." 
          class="border border-[#222] rounded-md py-3 px-4 outline-none">
      </div>
      <div class="flex flex-col mb-5 space-y-2">
        <label for="category" class="text-lg font-semibold text-[#222]">Todo Category</label>
        <select 
          id="category" 
          name="category" 
          value="{{ $data->category }}"
          class="border border-[#222] rounded-md py-3 px-4 outline-none">
          <option value="">Choose todo category</option>
          <option value="learning" {{ $data->category === "learning" ? "selected" : "" }}>Learning</option>
          <option value="project" {{ $data->category === "project" ? "selected" : "" }}>Project</option>
          <option value="daily" {{ $data->category === "daily" ? "selected" : "" }}>Daily</option>
        </select>  
      </div>
      <div class="flex flex-col mb-5 space-y-2">
        <label for="start_time" class="text-lg font-semibold text-[#222]">Start Time</label>
        <input 
          type="datetime-local" 
          id="start_time" 
          name="start_time" 
          value={{ \Carbon\Carbon::parse($data["start_time"])->format("Y-m-d\TH:i"); }}
          class="border border-[#222] rounded-md py-3 px-4 outline-none">
      </div>
      <div class="flex flex-col mb-5 space-y-2">
        <label for="end_time" class="text-lg font-semibold text-[#222]">End Time</label>
        <input 
          type="datetime-local" 
          id="end_time" 
          name="end_time" 
          value={{ $data->end_time ? \Carbon\Carbon::parse($data->end_time)->format("Y-m-d\TH:i") : "" }}
          class="border border-[#222] rounded-md py-3 px-4 outline-none">
      </div>
      <div class="flex flex-col mb-5 space-y-2">
        <label for="description" class="text-lg font-semibold text-[#222]">Description</label>
        <textarea 
          rows="7" 
          placeholder="Input todo description here..." 
          id="description" 
          name="description" 
          class="border border-[#222] rounded-md py-3 px-4 outline-none">{{ $data->description }}</textarea>
      </div>
      <button type="submit" class="py-3 text-center w-full bg-[#222] border-2 border-transparent text-white rounded-md font-semibold hover:bg-black duration-200">Submit</button>
    </form>
  </section>
</x-main-layout>