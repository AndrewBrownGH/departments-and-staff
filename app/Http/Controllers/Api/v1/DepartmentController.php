<?php

namespace App\Http\Controllers\Api\v1;

use App\Exceptions\Department\DestroyException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDepartmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    private const ITEMS_PER_PAGE = 10;

    public function index(): Response
    {
        $departments = Department::query()
            ->select(DB::raw('
                COUNT(employee_id) AS staff_count,
                IFNULL(MAX(employees.salary), 0) AS max_salary
            '))
            ->addSelect('departments.id')
            ->addSelect('departments.name')
            ->leftJoin('departments_employees', 'departments_employees.department_id', '=', 'departments.id')
            ->leftJoin('employees', 'departments_employees.employee_id', '=', 'employees.id')
            ->groupBy('departments.id')
            ->orderByDesc('staff_count')
            ->paginate(self::ITEMS_PER_PAGE);

        return new Response($departments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(StoreDepartmentRequest $request): Response
    {
        Department::create($request->validated());

        return new Response([
            'success' => true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id): Response
    {
        $department = Department::find($id);

        try {
            if (!$department) {
                throw new DestroyException('Отдел не найден');
            }
            if (count($department->employees)) {
                throw new DestroyException('Вы не можете удалить отдел, который имеет сотрудников');
            }

            $department->delete();

        } catch (\Exception $exception) {
            return new Response([
                'success' => false,
                'errors' => [
                    'destroyException' => $exception->getMessage(),
                ],
            ]);
        }

        return new Response([
            'success' => true
        ]);
    }
}
