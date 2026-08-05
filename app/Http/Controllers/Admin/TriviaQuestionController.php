<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TriviaQuestion;
use App\Models\TriviaTopic;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TriviaQuestionController extends Controller
{
    public function index(Request $request): View
    {
        $query = TriviaQuestion::with('topic')->orderBy('topic_id')->orderBy('order_number');

        if ($topicId = $request->query('topic_id')) {
            $query->where('topic_id', $topicId);
        }

        return view('admin.trivia-questions.index', [
            'questions' => $query->paginate(25)->withQueryString(),
            'topics' => TriviaTopic::orderBy('order_number')->get(),
            'selectedTopicId' => $topicId,
        ]);
    }

    public function create(Request $request): View
    {
        return view('admin.trivia-questions.create', [
            'topics' => TriviaTopic::orderBy('order_number')->get(),
            'selectedTopicId' => $request->query('topic_id'),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);
        $data['order_number'] = (int) (TriviaQuestion::where('topic_id', $data['topic_id'])->max('order_number') ?? 0) + 1;

        TriviaQuestion::create($data);

        return redirect()->route('admin.trivia-questions.index')->with('status', 'Trivia question created.');
    }

    public function edit(TriviaQuestion $trivia_question): View
    {
        return view('admin.trivia-questions.edit', [
            'question' => $trivia_question,
            'topics' => TriviaTopic::orderBy('order_number')->get(),
        ]);
    }

    public function update(Request $request, TriviaQuestion $trivia_question): RedirectResponse
    {
        $data = $this->validateData($request);
        $data['order_number'] = $request->validate(['order_number' => ['required', 'integer', 'min:0']])['order_number'];

        $trivia_question->update($data);

        return redirect()->route('admin.trivia-questions.index')->with('status', 'Trivia question updated.');
    }

    public function destroy(TriviaQuestion $trivia_question): RedirectResponse
    {
        $trivia_question->delete();

        return redirect()->route('admin.trivia-questions.index')->with('status', 'Trivia question deleted.');
    }

    private function validateData(Request $request): array
    {
        $data = $request->validate([
            'topic_id' => ['required', 'integer', 'exists:trivia_topics,id'],
            'question' => ['required', 'string', 'max:1000'],
            'options' => ['required', 'array', 'size:4'],
            'options.*' => ['required', 'string', 'max:255'],
            'correct_index' => ['required', 'integer', 'min:0', 'max:3'],
        ]);

        $data['options'] = array_values($data['options']);

        return $data;
    }
}
