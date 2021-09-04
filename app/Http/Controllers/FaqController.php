<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use League\HTMLToMarkdown\HtmlConverter;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.faq.index", [
            "faq" => Faq::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.faq.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "question" => "required|string",
            "response" => "required|string|min:10",
        ]);
        $question = trim(htmlentities($data["question"]));
        $convertToMarkDown = new HtmlConverter(array('strip_tags' => true));
        $response = $convertToMarkDown->convert(trim($data["response"]));
        Faq::create([
            "question" => $question,
            "response" => $response,
        ]);
        return redirect()->route("faq.index")->withInput()->with("success", "FAQ created with success !!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        return view("admin.faq.edit", [
            "faq" => $faq
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        $data = $request->validate([
            "question" => "required|string",
            "response" => "required|string|min:10",
        ]);
        $question = trim(htmlentities($data["question"]));
        $convertToMarkDown = new HtmlConverter(array('strip_tags' => true));
        $response = $convertToMarkDown->convert(trim($data["response"]));
        $faq->update([
            "question" => $question,
            "response" => $response,
        ]);
        return back()->withInput()->with("success", "FAQ created with success !!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return back()->withInput()->with("success", "FAQ deleted with success !!");
    }
}
