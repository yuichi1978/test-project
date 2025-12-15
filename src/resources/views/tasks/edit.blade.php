@extends('layouts.app')

@section('title', 'タスク編集')

@section('content')
<div class="max-w-3xl mx-auto">
  <h2 class="text-2xl font-bold text-gray-900 mb-6">タスク編集</h2>

  <div class="bg-white rounded-lg shadow-md p-8">
    <form action="{{ route('tasks.update', $task) }}" method="POST">
      @csrf
      @method('PUT')

      <!-- タイトル -->
      <div class="mb-6">
        <label for="title" class="block text-base font-bold text-gray-900 mb-2">
          タイトル <span class="text-red-500">*</span>
        </label>
        <input type="text"
          name="title"
          id="title"
          value="{{ old('title', $task->title) }}"
          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-500 @enderror"
          required>
        @error('title')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
      </div>

      <!-- 説明 -->
      <div class="mb-6">
        <label for="description" class="block text-base font-bold text-gray-900 mb-2">
          説明
        </label>
        <textarea name="description"
          id="description"
          rows="6"
          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-500 @enderror">{{ old('description', $task->description) }}</textarea>
        @error('description')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
      </div>

      <!-- ステータス -->
      <div class="mb-8">
        <label class="block text-base font-bold text-gray-900 mb-3">
          ステータス
        </label>
        <div class="space-y-3">
          <label class="flex items-start p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 {{ old('is_completed', $task->is_completed) == 0 ? 'bg-blue-50 border-blue-500' : '' }}">
            <input type="radio"
              name="is_completed"
              value="0"
              {{ old('is_completed', $task->is_completed) == 0 ? 'checked' : '' }}
              class="mt-1 h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
            <div class="ml-3">
              <div class="text-base font-bold text-gray-900">未完了</div>
              <div class="text-sm text-gray-600">このタスクはまだ完了していません</div>
            </div>
          </label>

          <label class="flex items-start p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 {{ old('is_completed', $task->is_completed) == 1 ? 'bg-blue-50 border-blue-500' : '' }}">
            <input type="radio"
              name="is_completed"
              value="1"
              {{ old('is_completed', $task->is_completed) == 1 ? 'checked' : '' }}
              class="mt-1 h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
            <div class="ml-3">
              <div class="text-base font-bold text-gray-900">完了</div>
              <div class="text-sm text-gray-600">このタスクは完了しました</div>
            </div>
          </label>
        </div>
        @error('is_completed')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
      </div>

      <!-- ボタン -->
      <div class="flex justify-between items-center">
        <div class="flex space-x-4">
          <button type="submit" class="px-8 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition duration-200">
            更新
          </button>
          <a href="{{ route('tasks.show', $task) }}" class="px-8 py-3 bg-red-600 text-white font-semibold rounded-lg shadow hover:bg-red-700 transition duration-200">
            キャンセル
          </a>
        </div>
        <a href="{{ route('tasks.index') }}" class="px-6 py-3 bg-gray-600 text-white font-semibold rounded-lg shadow hover:bg-gray-700 transition duration-200">
          一覧に戻る
        </a>
      </div>
    </form>
  </div>
</div>
@endsection