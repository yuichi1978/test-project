@extends('layouts.app')

@section('title', 'タスク一覧')

@section('content')
<div class="mb-6 flex justify-between items-center">
  <h2 class="text-2xl font-bold text-gray-900">タスク一覧</h2>
  <a href="{{ route('tasks.create') }}" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition duration-200">
    新規タスク作成
  </a>
</div>

@if($tasks->isEmpty())
<div class="bg-white rounded-lg shadow-md p-12 text-center">
  <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
  </svg>
  <p class="text-gray-500 text-lg mb-2">タスクがありません。</p>
  <p class="text-gray-400 mb-6">新しいタスクを作成してください。</p>
  <a href="{{ route('tasks.create') }}" class="inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition duration-200">
    最初のタスクを作成
  </a>
</div>
@else
<div class="space-y-4">
  @foreach($tasks as $task)
  <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-200">
    <div class="flex items-start justify-between">
      <div class="flex-1">
        <div class="flex items-center mb-2">
          <h3 class="text-xl font-bold text-gray-900 {{ $task->is_completed ? 'line-through text-gray-500' : '' }}">
            {{ $task->title }}
          </h3>
          @if($task->is_completed)
          <span class="ml-3 px-3 py-1 bg-green-100 text-green-800 text-sm font-semibold rounded-full">
            完了
          </span>
          @else
          <span class="ml-3 px-3 py-1 bg-yellow-100 text-yellow-800 text-sm font-semibold rounded-full">
            未完了
          </span>
          @endif
        </div>
        @if($task->description)
        <p class="text-gray-600 mb-3">{{ Str::limit($task->description, 100) }}</p>
        @endif
        <p class="text-sm text-gray-400">
          作成日: {{ $task->created_at->format('Y年m月d日 H:i') }}
        </p>
      </div>
      <div class="flex items-center space-x-2 ml-4">
        <a href="{{ route('tasks.show', $task) }}" class="px-4 py-2 bg-green-600 text-white font-semibold rounded-lg shadow hover:bg-green-700 transition duration-200">
          詳細
        </a>
        <a href="{{ route('tasks.edit', $task) }}" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition duration-200">
          編集
        </a>
        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline" onsubmit="return confirm('本当に削除しますか?');">
          @csrf
          @method('DELETE')
          <button type="submit" class="px-4 py-2 bg-red-600 text-white font-semibold rounded-lg shadow hover:bg-red-700 transition duration-200">
            削除
          </button>
        </form>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endif
@endsection