<!DOCTYPE html>
<html>
<head>
    <title>Task App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">

    <h1>Task Manager</h1>

<form method="POST" action="/tasks">
    @csrf
    <input type="text" name="title" placeholder="New Task" required>
    <button>Add</button>
</form>

<hr>

@foreach($tasks as $task)
    <div style="margin-bottom:10px;">
        <form method="POST" action="/tasks/{{ $task->id }}">
            @csrf
            @method('PATCH')
            <button>
                {{ $task->is_done ? '✔' : '❌' }}
            </button>
        </form>

        {{ $task->title }}

        <form method="POST" action="/tasks/{{ $task->id }}" style="display:inline;">
            @csrf
            @method('DELETE')
            <button>Delete</button>
        </form>
    </div>
@endforeach
</div>

</body>
</html>