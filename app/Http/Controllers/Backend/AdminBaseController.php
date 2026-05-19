<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Traits\HandlesUploads;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

abstract class AdminBaseController extends Controller
{
    use HandlesUploads;

    protected Model $model;
    protected string $viewPath;
    protected string $requestClass;
    protected array $uploadFields = [];
    protected string $uploadPath = '';
    protected string $routePrefix;
    protected bool $assignAuthenticatedUser = false;
    protected array $syncRelations = [];

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $lists = $this->model->orderBy('id', 'desc')->get();
        return view($this->viewPath . 'index', compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view($this->viewPath . 'form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
  
        
        
        $request = app($this->requestClass);
       
        $uploadedFiles = [];

        try {
            DB::beginTransaction();

            $data = $this->uploadFiles(
                $request,
                $this->uploadFields,
                $this->uploadPath
            );

            // optional check for now use for blog field user_id
            if ($this->assignAuthenticatedUser) {
                $data['user_id'] = auth()->id();
            }

            $data['is_active'] = $request->boolean('is_active');

            foreach ($this->uploadFields as $field) {
                if (!empty($data[$field])) {
                    $uploadedFiles[] = $data[$field];
                }
            }

            $item = $this->model->create($data);

            // saving blog and category in pivot table
            foreach ($this->syncRelations as $relation => $field) {
                if (method_exists($item, $relation)) {
                    $item->{$relation}()->sync(
                        $request->input($field, [])
                    );
                }
            }
            //
            DB::commit();
            return redirect()
                ->route($this->routePrefix)
                ->with('success', class_basename($this->model) . ' Created successfully');
        } catch (\Exception $e) {

        dd($e->getMessage());
            DB::rollBack();

            foreach ($uploadedFiles as $filePath) {
                if (Storage::disk('public')->exists($filePath)) {
                    Storage::disk('public')->delete($filePath);
                }
            }

            return redirect()
                ->back()
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
    public function edit(string $id): View
    {
        $data = $this->model->findOrFail($id);
        return view($this->viewPath . 'form', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
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
            // optional check for now use for blog field user_id
            if ($this->assignAuthenticatedUser) {
                $data['user_id'] = auth()->id();
            }
            $data['is_active'] = $request->boolean('is_active');

            foreach ($this->uploadFields as $field) {
                if (!empty($data[$field]) && $data[$field] !== $item->$field) {
                    $uploadedFiles[] = $data[$field];
                }
            }

            $item->update($data);
            // saving blog and category in pivot table
            foreach ($this->syncRelations as $relation => $field) {
                if (method_exists($item, $relation)) {
                    $item->{$relation}()->sync(
                        $request->input($field, [])
                    );
                }
            }

            return redirect()->route($this->routePrefix)->with('success', class_basename($this->model) . ' updated successfully');
        } catch (\Exception $e) {
            $e->getMessage();
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
    public function destroy(string $id): RedirectResponse
    {
        try {
            $item = $this->model->findOrFail($id);

            // Remove Pivot Relations of blog
            if (method_exists($item, 'categories')) {
                $item->categories()->detach();
            }

            // Only for Menu model
            if ($this->model instanceof \App\Models\Menu) {
                $children = $this->model->where('parent_id', $item->id);

                if ($children->exists()) {
                    $children->update([
                        'parent_id' => null,
                        'is_main_child' => 'parent_menu',
                    ]);
                }
            }
            $itemData = $item->toArray();

            $item->delete();

            $this->deleteFiles($this->uploadFields, $itemData);

            return redirect()
                ->route($this->routePrefix)
                ->with('success', class_basename($this->model) . ' deleted successfully');
        } catch (\Exception $e) {
            return back()->with(
                'error',
                'Failed to delete ' . class_basename($this->model)
            );
        }
    }
}
