<?php

namespace App\Http\Controllers\Admin\Faqs;

use App\Shop\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = Faq::paginate(10);

        return view('admin.Faqs.list', ['faqs' => $data]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.Faqs.create');
    }

    /**
     * @param CreateFaqRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Faq::create($request->input());

        return redirect()->route('admin.faq.index')->with('message', 'Create Faq successful!');
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        return view('admin.Faqs.edit', ['faq' => Faq::findorfail($id)]);
    }

    /**
     * @param UpdateFaqRequest $request
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \App\Shop\Faqs\Exceptions\UpdateFaqErrorException
     */
    public function update(Request $request, $id)
    {
        $Faq = Faq::findorfail($id);
        $Faq->update($request->all());

        return redirect()->route('admin.faq.edit', $id)->with('message', 'Update successful!');
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $Faq = Faq::findorfail($id);
        $Faq->delete();

        return redirect()->route('admin.faq.index')->with('message', 'Delete successful!');
    }
}
