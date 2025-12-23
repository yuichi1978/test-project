<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TaskApiController extends Controller
{
  // 一覧取得
  public function index(): JsonResponse
  {
    return response()->json([
      'data' => Task::latest()->get()
    ]);
  }

  // 保存
  public function store(Request $request): JsonResponse
  {
    $request->validate([
      'title' => 'required|string|max:255',
      'description' => 'required|string|max:255',
    ]);

    $task = Task::create([
      'title' => $request->title,
      'description' => $request->description,
    ]);

    return response()->json([
      'status' => 'success',
      'data' => $task,
      'message' => 'タスクを保存しました',
    ], 201);
  }
}
