<?php

namespace App\Http\Controllers;

use App\Traits\HandlesUploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

abstract class AdminBaseController extends Controller
{
    use HandlesUploads;

    protected $model;
    protected $viewPath;
    protected $requestClass;
    protected $uploadFields;
    protected $uploadPath;
    protected $routePrefix;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lists = $this->model->orderBy('id', 'desc')->get();
        return view($this->viewPath . 'index', compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view($this->viewPath . 'form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request = app($this->requestClass);
        $uploadedFiles = [];

        try {
            DB::beginTransaction();

            $data = $this->uploadFiles(
                $request,
                $this->uploadFields,
                $this->uploadPath
            );
            $data['is_active'] = $request->has('is_active');
            foreach ($this->uploadFields as $field) {
                if (!empty($data[$field])) {
                    $uploadedFiles[] = $data[$field];
                }
            }

            $this->model->create($data);
            DB::commit();
            return redirect()->route($this->routePrefix)
                ->with('success', class_basename($this->model) . ' Created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            foreach ($uploadedFiles as $filePath) {
                if (Storage::disk('public')->exists($filePath)) {
                    Storage::disk('public')->delete($filePath);
                }
            }

            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to create ' . class_basename($this->model) . ': ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = $this->model->findOrFail($id);
        return view($this->viewPath . 'form', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request = app($this->requestClass);

        $uploadedFiles = [];

        try {
            $item = $this->model->findOrFail($id);


            $data = $this->uploadFiles(
                $request,
                $this->uploadFields,
                $this->uploadPath,
                $item->toArray()
            );

            $data['is_active'] = $request->has('is_active');

            foreach ($this->uploadFields as $field) {
                if (!empty($data[$field]) && $data[$field] !== $item->$field) {
                    $uploadedFiles[] = $data[$field];
                }
            }

            $item->update($data);

            return redirect()->route($this->routePrefix)->with('success', class_basename($this->model) . ' updated successfully');
        } catch (\Exception $e) {

            foreach ($uploadedFiles as $filePath) {
                if (Storage::disk('public')->exists($filePath)) {
                    Storage::disk('public')->delete($filePath);
                }
            }

            return back()
                ->withInput()
                ->with('error', 'Failed to update ' . class_basename($this->model) . ': ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $item = $this->model->findOrFail($id);

            $itemData = $item->toArray();

            $item->delete();

            $this->deleteFiles($this->uploadFields, $itemData);

            return redirect()
                ->route('banner.index')
                ->with('success', class_basename($this->model) . ' deleted successfully');
        } catch (\Exception $e) {
            return back()->with(
                'error',
                'Failed to delete ' . class_basename($this->model)
            );
        }
    }
}
