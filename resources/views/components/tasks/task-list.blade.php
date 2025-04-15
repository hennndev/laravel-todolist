
<section class="flex flex-col space-y-3">
  <p>Tasks:</p>
  <div class="flex flex-col space-y-3 pl-10 max-w-[1000px]">
    @foreach ($data->tasks as $index => $task)
      <x-tasks.task :index="$index" :task="$task" :data="$data"/>
    @endforeach

  </div>
  @if ($data->tasks->isEmpty())
    <p class="text-gray-500">You didn't have task yet for now</p>
  @endif
</section>