<?php

namespace App\Http\Controllers;

use App\Services\JsonService;
use Illuminate\Http\Request;

class JsonDataController extends Controller
{
    protected $jsonService;

    public function __construct()
    {
        $this->jsonService = new JsonService('data'); // data.json
    }

    public function index()
    {
        $data = $this->jsonService->read();
        return view('jsondata.index', ['data' => $data]);
    }
    public function show($id)
    {
        $item = $this->jsonService->find('id', $id);

        if (!$item) {
            abort(404); // Handle item not found
        }

        return view('jsondata.details', compact('item'));
    }
    public function create()
    {
        $data = $this->jsonService->read() ?? [];
        return view('jsondata.create', compact('data'));
    }

    public function edit($id)
    {
        $data = $this->jsonService->find('id', $id);
        return view('jsondata.edit', compact('data'));
    }
    public function store(Request $request)
    {
        $data = $this->jsonService->read();
        $data[] = $request->all();
        $this->jsonService->write($data);

        return redirect()->route('jsondata.index')->with('success', 'Data stored successfully');
    }

    public function update(Request $request, $id)
    {
        $newData = $request->except(['_method', '_token']);
        $this->jsonService->update('id', $id, $newData);

        return redirect()->route('jsondata.index')->with('success', 'Data updated successfully');
    }

    public function destroy($id)
    {
        $this->jsonService->delete('id', $id);

        return redirect()->route('jsondata.index')->with('success', 'Data deleted successfully');
    }
}
