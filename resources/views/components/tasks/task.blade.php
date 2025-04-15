

<div class="flex items-center justify-between">
  <p class="{{ $task->is_done ? "line-through" : "" }}">{{ $index + 1 }}. 
    <span class="font-semibold text-[#222] text-lg">
      {{ $task->name }}
    </span>
</p>
  <div class="flex items-center space-x-3">
    @if (!$task->is_done)
      <button data-todo_id="{{ $data->id }}" data-task_id="{{ $task->id }}" class="task-btn-done text-green-600 outline-none">Done</button>
    @endif
    @if ($task->is_done)
      <button data-todo_id="{{ $data->id }}" data-task_id="{{ $task->id }}" class="task-btn-undone text-[#222] outline-none">Undone</button>
    @endif
    @if (!$task->is_done)
      <a href="{{ route("tasks.edit", ["todo_id" => $data->id, "task_id" => $task->id]) }}" class="text-blue-500">Edit</a>
    @endif
    @if ($task->is_done)
      <button data-todo_id="{{ $data->id }}" data-task_id="{{ $task->id }}" class="task-btn-delete text-red-500 outline-none">Delete</button>
    @endif
  </div>
</div>



<script>
  $(document).ready(function () {
    
    $(".task-btn-done").off("click").on("click", function (e) {
      e.preventDefault();
      const todo_id = $(this).data("todo_id");
      const task_id = $(this).data("task_id");
      
      $.ajax({
        type: "PATCH",
        url: `/todos/${todo_id}/tasks/${task_id}/done`,
        data: {
          _token: "{{ csrf_token() }}"
        },
        success: function (response) {
          window.toast.success(response.message);
          setTimeout(() => {
            location.reload();
          }, 1000);
        }
      });
    });

    $(".task-btn-undone").off("click").on("click", function (e) {
      e.preventDefault();
      const todo_id = $(this).data("todo_id");
      const task_id = $(this).data("task_id");
      
      $.ajax({
        type: "PATCH",
        url: `/todos/${todo_id}/tasks/${task_id}/undone`,
        data: {
          _token: "{{ csrf_token() }}"
        },
        success: function (response) {
          window.toast.success(response.message);
          setTimeout(() => {
            location.reload();
          }, 1000);
        }
      });
    });

    $(".task-btn-delete").off("click").on("click", function (e) {
        e.preventDefault();
        const todo_id = $(this).data("todo_id");
        const task_id = $(this).data("task_id");
        
        $.ajax({
          type: "DELETE",
          url: `/todos/${todo_id}/tasks/${task_id}`,
          data: {
            _token: "{{ csrf_token() }}"
          },
          success: function (response) {
            window.toast.success(response.message);
            setTimeout(() => {
              location.reload();
            }, 1000);
          }
        });
    });

  });
</script>