<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Task Manager
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            {{-- ADD TASK --}}
            <div class="bg-white p-6 shadow sm:rounded-lg mb-6">
                <form method="POST" action="/tasks">
                    @csrf

                    <input
                        type="text"
                        name="title"
                        placeholder="Enter new task..."
                        class="w-full border-gray-300 rounded mb-2"
                        required
                    >

                    <button class="bg-blue-500 text-white px-4 py-2 rounded">
                        Add Task
                    </button>
                </form>
            </div>

            {{-- TASK LIST --}}
            <div class="bg-white p-6 shadow sm:rounded-lg">

                @forelse ($tasks as $task)
                    <div class="flex justify-between items-center border-b py-2">

                        {{-- TOGGLE TASK --}}
                        <form method="POST" action="/tasks/{{ $task->id }}">
                            @csrf
                            @method('PATCH')

                            <button type="submit" class="flex items-center gap-2">

                                @if($task->is_done)
                                    <span class="text-green-600">✔</span>
                                    <span class="line-through text-gray-400">
                                        {{ $task->title }}
                                    </span>
                                @else
                                    <span class="text-gray-500">☐</span>
                                    <span>{{ $task->title }}</span>
                                @endif

                            </button>
                        </form>

                        {{-- DELETE TASK --}}
                        <form method="POST" action="/tasks/{{ $task->id }}">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="text-red-500 font-bold">
                                Delete
                            </button>
                        </form>

                    </div>
                @empty
                    <p class="text-gray-500">No tasks yet.</p>
                @endforelse

            </div>

        </div>
    </div>
</x-app-layout>