@extends('layouts.app')

@section('title', 'タスク詳細')

@section('content')
<div class="max-w-3xl mx-auto">
  <div class="mb-6 flex justify-between items-center">
    <h2 class="text-2xl font-bold text-gray-900">タスク詳細</h2>
    <a href="{{ route('tasks.index') }}" class="px-6 py-3 bg-gray-600 text-white font-semibold rounded-lg shadow hover:bg-gray-700 transition duration-200">
      一覧に戻る
    </a>
  </div>

  <div class="bg-white rounded-lg shadow-md overflow-hidden">
    <!-- ヘッダー -->
    <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-8 py-6">
      <div class="flex items-center justify-between">
        <div>
          <h3 class="text-2xl font-bold text-white mb-2">{{ $task->title }}</h3>
          @if($task->is_completed)
          <span class="inline-flex items-center px-4 py-1 bg-green-500 text-white text-sm font-semibold rounded-full">
            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
            完了
          </span>
          @else
          <span class="inline-flex items-center px-4 py-1 bg-yellow-500 text-white text-sm font-semibold rounded-full">
            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
            </svg>
            未完了
          </span>
          @endif
        </div>
      </div>
    </div>

    <!-- タスク情報 -->
    <div class="p-8">
      <div class="space-y-6">
        <div>
          <h4 class="text-sm font-bold text-gray-500 mb-2">説明</h4>
          @if($task->description)
          <p class="text-gray-900 whitespace-pre-wrap">{{ $task->description }}</p>
          @else
          <p class="text-gray-400 italic">説明はありません</p>
          @endif
        </div>

        <div class="border-t border-gray-200 pt-6 grid grid-cols-2 gap-6">
          <div>
            <h4 class="text-sm font-bold text-gray-500 mb-2">作成日時</h4>
            <p class="text-gray-900">{{ $task->created_at->format('Y年m月d日 H:i:s') }}</p>
          </div>
          <div>
            <h4 class="text-sm font-bold text-gray-500 mb-2">更新日時</h4>
            <p class="text-gray-900">{{ $task->updated_at->format('Y年m月d日 H:i:s') }}</p>
          </div>
        </div>
      </div>
    </div>

    <!-- アクションボタン -->
    <div class="bg-gray-50 px-8 py-6 flex justify-between items-center border-t border-gray-200">
      <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('本当に削除しますか?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="px-6 py-3 bg-red-600 text-white font-semibold rounded-lg shadow hover:bg-red-700 transition duration-200">
          削除
        </button>
      </form>

      <a href="{{ route('tasks.edit', $task) }}" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition duration-200">
        編集
      </a>
    </div>
  </div>
</div>
@endsection