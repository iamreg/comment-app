<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = Comment::with(['replies'])->whereNull('parent_id')->orderBy('created_at')->get();

        return response()->json($collection);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $validator = Comment::validation($request->all());

            if ($validator->fails()) {
                return response()->json(['status' => 'error', 'message' => $validator->errors()->first()]);
            }

            //only create new instance on successful validation
            $comment = new Comment();

            $comment->name = $request->get('name');
            $comment->description = $request->get('comment');

            $level = 1;

            if ($request->has('parent_id')) {
                $comment->parent_id = $request->get('parent_id');

                $parent = Comment::find($comment->parent_id);

                if ($parent) {
                    $level = $parent->level + 1;
                }
            }

            $comment->level = $level;

            $comment->save();
            $response = ['status' => 'success', 'comment' => $comment];

        } catch (Exception $e) {
            $response = ['status' => 'error', 'message' => 'An error was encountered while submitting your comment. Please try again.'];
        }

        return response()->json($response);
    }
}
