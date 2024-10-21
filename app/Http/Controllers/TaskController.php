<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class TaskController extends Controller
{
    // Mostrar todas las tareas en formato JSON (API)
    public function index()
    {
        $user = Auth::user(); // Obtener el usuario autenticado

        // Asegurarse de que el usuario esté autenticado
        if ($user) {
            $tasks = $user->tasks; // Obtener todas las tareas del usuario autenticado
            return response()->json($tasks, 200);
        } else {
            return response()->json(['message' => 'User not authenticated'], 401);
        }
    }

    // Mostrar una tarea específica en formato JSON (API)
    public function show($id)
    {
        $user = Auth::user(); // Obtener el usuario autenticado
        $task = $user->tasks->find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        return response()->json($task, 200);
    }

    // Crear una nueva tarea (API)
    public function store(Request $request)
    {
        $user = Auth::user(); // Obtener el usuario autenticado

        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $task = $user->tasks->create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'pending',
        ]);

        return response()->json($task, 201);
    }

    // Actualizar una tarea existente (API)
    public function update(Request $request, $id)
    {
        $user = Auth::user(); // Obtener el usuario autenticado

        $task = $user->tasks->find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $request->validate([
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'status' => 'nullable|string|in:pending,completed',
        ]);

        $task->update($request->only(['title', 'description', 'status']));

        return response()->json($task, 200);
    }

    // Eliminar una tarea (API)
    public function destroy($id)
    {
        $user = Auth::user(); // Obtener el usuario autenticado

        $task = $user->tasks->find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $task->delete();

        return response()->json(['message' => 'Task deleted successfully'], 200);
    }
}
