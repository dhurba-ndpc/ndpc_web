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

        $menuItems = json_decode($request->sort, true);

        if (!$menuItems) {
            return response()->json([
                'success' => false,
                'message' => 'No menu data found'
            ], 422);
        }



        $this->updateMenuItems($menuItems, null);

        return response()->json([
            'success' => true,
            'message' => 'Menu order updated successfully'
        ]);
    }


    // above update button code function
    private function updateMenuItems($items, $parentId = null)
    {
        foreach ($items as $index => $item) {
            Menu::where('id', $item['id'])->update([
                'parent_id' => $parentId,
                'position' => $index + 1,
                'is_main_child' => $parentId == null ? 'parent_menu' : 'child_menu',
            ]);

            if (!empty($item['children'])) {
                $this->updateMenuItems($item['children'], $item['id']);
            }
        }
    }
}
