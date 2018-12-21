<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Services\BaseService;
use App\Services\Admin\BaseService as AdminBaseService;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class BaseController extends Controller
{
    /** string */
    private $model;

    /** @var BaseService */
    private $service;

    /** @var AdminBaseService */
    private $adminService;

    public function __construct(
        string $model,
        BaseService $service,
        AdminBaseService $adminService
    ) {
        $this->model = $model;
        $this->service = $service;
        $this->adminService = $adminService;
    }

    public function index(array $messages = null, array $errors = null): View
    {
        return view("admin.$this->model.index", [
            $this->model . 's' => $this->service->getAll(), //PLURAL HELPER?
            'messages' => $messages ?? null,
            'errors' => $errors ?? null,
        ]);
    }

    public function create(): View
    {
        return view("admin.$this->model.create", [
            'cinema' => Cinema::make(),
        ]);
    }

    /**
     * @return View|RedirectResponse
     */
    public function edit(int $modelId)
    {
        if ($model = Model::find($modelId)) {
            return view("admin.$this->model.create", [
                $this->model => $model,
            ]);
        }

        return redirect()->route("$this->model.index", ['errors' => ["Wront $this->model id given!"]]);
    }

    public function store(Request $request): RedirectResponse
    {
        if ($this->adminService->store($request)) {
            return redirect()->route("$this->model.index", ['messages' => ["$this->model saved successfully!"]]);
        }

        return redirect()->route("$this->model.index", ['errors' => ["Couldn't save $this->model!"]]);
    }

    public function update(Request $request): RedirectResponse
    {
        if ($this->adminService->update($request)) {
            return redirect()->route("$this->model.index", ['messages' => ["$this->model updated successfully!"]]);
        }

        return redirect()->route("$this->model.index", ['errors' => ["Couldn't update $this->model!"]]);
    }

    public function destroy(int $siteId): RedirectResponse
    {
        if ($this->adminService->destroy($siteId)) {
            return redirect()->route("$this->model.index", ['messages' => ["$this->model deleted successfully!"]]);
        }

        return redirect()->route("$this->model.index", ['errors' => ["Couldn't delete $this->model!"]]);
    }
}
