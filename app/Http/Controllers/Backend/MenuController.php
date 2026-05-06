<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use Illuminate\Http\Request;


class MenuController extends AdminBaseController
{

    protected $model;
    protected $viewPath = 'backend.menu.';
    protected $requestClass = MenuRequest::class;
    protected $uploadFields = ['image', 'og_image'];
    protected $uploadPath = 'menu';
    protected $routePrefix = 'menu.index';

    public function __construct(Menu $model)
    {
        $this->model = $model;
    }

    public function create()
    {
        $parentMenus = $this->model->where('parent_id', null)->get();
        return view($this->viewPath . 'form', compact('parentMenus'));
    }

    public function edit(string $id)
    {
        $data = $this->model->findOrFail($id);
        $parentMenus = $this->model
            ->whereNull('parent_id')
            ->where('id', '!=', $data->id)
            ->with(['children' => function ($query) use ($data) {
                $query->where('id', '!=', $data->id);
            }])
            ->get();


        return view($this->viewPath . 'form', compact('data', 'parentMenus'));
    }
    // drag and drop menu update button code.

    public function updateMenuOrder(Request $request)
    {
         dd($request->all());
        $order = 1;

        // Decode JSON string to array if necessary
        $menuItems = is_array($request->sort) ? $request->sort : json_decode($request->sort, true);

        if (isset($menuItems)) {
            $this->updateMenuItems($menuItems, null, $order);
        }

        return response()->json(['success' => true]);
    }

    // above update button code function
    private function updateMenuItems(array $items, $parentId = null, &$order)
    {
        foreach ($items as $item) {
            $this
                ->model
                ->where('id', $item['id'])
                ->update([
                    'position' => $order,
                    'parent_id' => $parentId,
                    'is_main_child' => $parentId ? 1 : 0,
                ]);

            $order++;

            // If the item has children, recursively update them
            if (isset($item['children']) && is_array($item['children'])) {
                $this->updateMenuItems($item['children'], $item['id'], $order);
            }
        }
    }
}
