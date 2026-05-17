<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;


class MenuController extends AdminBaseController
{

    protected string $viewPath = 'backend.menu.';
    protected string $requestClass = MenuRequest::class;
    protected array $uploadFields = ['image', 'og_image'];
    protected string $uploadPath = 'menu';
    protected string $routePrefix = 'menu.index';

    public function __construct(Menu $model)
    {
        $this->model = $model;
    }

    public function create(): View
    {
        $parentMenus = $this->model->where('parent_id', null)->get();
        return view($this->viewPath . 'form', compact('parentMenus'));
    }

    public function edit(string $id): View
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
