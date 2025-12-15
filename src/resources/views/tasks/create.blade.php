@extends('layouts.app')

@section('title', 'タスク作成')

@section('content')
<div class="max-w-3xl mx-auto">
  <h2 class="text-2xl font-bold text-gray-900 mb-6">新規タスク作成</h2>

  <div class="bg-white rounded-lg shadow-md p-8">
    <form action="{{ route('tasks.store') }}" method="POST">
      @csrf

      <!-- タイトル -->
      <div class="mb-6">
        <label for="title" class="block text-base font-bold text-gray-900 mb-2">
          タイトル <span class="text-red-500">*</span>
        </label>
        <input type="text"
          name="title"
          id="title"
          value="{{ old('title') }}"
          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-500 @enderror"
          required>
        @error('title')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
      </div>

      <!-- 説明 -->
      <div class="mb-8">
        <label for="description" class="block text-base font-bold text-gray-900 mb-2">
          説明
        </label>
        <textarea name="description"
          id="description"
          rows="6"
          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
        @error('description')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
      </div>

      <!-- ボタン -->
      <div class="flex justify-start space-x-4">
        <button type="submit" class="px-8 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition duration-200">
          作成
        </button>
        <a href="{{ route('tasks.index') }}" class="px-8 py-3 bg-red-600 text-white font-semibold rounded-lg shadow hover:bg-red-700 transition duration-200">
          キャンセル
        </a>
      </div>
    </form>
  </div>
</div>
@endsection