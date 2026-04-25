<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    public function index()
    {
        $questions = Question::published()
            ->with('user', 'answers')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('forum.index', compact('questions'));
    }

    public function show(Question $question)
    {
        $question->load('user', 'answers.user');
        return view('forum.show', compact('question'));
    }

    public function create()
    {
        return view('forum.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:2000',
        ]);

        Question::create([
            'user_id' => Auth::id(),
            'title' => $validated['title'],
            'content' => $validated['content'],
            'is_published' => true,
        ]);

        return redirect()->route('forum.index')->with('success', 'Pregunta publicada correctamente');
    }

    public function answer(Request $request, Question $question)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:2000',
        ]);

        Answer::create([
            'question_id' => $question->id,
            'user_id' => Auth::id(),
            'content' => $validated['content'],
        ]);

        return redirect()->back()->with('success', 'Respuesta agregada');
    }

    public function acceptAnswer(Answer $answer)
    {
        if (!Auth::user()->isAdmin()) {
            return redirect()->back();
        }

        $answer->question->answers()->update(['is_accepted' => false]);
        $answer->update(['is_accepted' => true]);

        return redirect()->back();
    }
}
