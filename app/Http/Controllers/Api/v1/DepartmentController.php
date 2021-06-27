<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDepartmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    public function index(): Response
    {
        $departments = DB::table('departments')
            ->select(DB::raw('
                departments.id,
                departments.name,
                COUNT(employee_id) AS staff_count,
                IFNULL(MAX(employees.salary), 0) AS max_salary
            '))
            ->leftJoin('departments_employees', 'departments_employees.department_id', '=', 'departments.id')
            ->join('employees', 'departments_employees.employee_id', '=', 'employees.id')
            ->groupBy('departments.id')
            ->get();

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

        return new Response(['success' => true]);
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

        if (!$department) {
            return new Response([
                'success' => false,
                'errors' => [
                    'message' => 'Отдел не найден',
                ],
            ]);
        }
        if (count($department->employees)) {
            return new Response([
                'success' => false,
                'errors' => [
                    'message' => 'Вы не можете удалить отдел, который имеет сотрудников',
                ],
            ]);
        }

        $department->delete();

        return new Response(['success' => true]);
    }
}
