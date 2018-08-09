<?php
    namespace App\Services;

    use App\Models\Employee;
    use Illuminate\Support\Facades\Hash;
    use App\Models\Role;

    class EmployeeService
    {
        /**
         * @return Employee[]|\Illuminate\Database\Eloquent\Collection
         * 従業員の全件取得
         */
        public function FetchAll()
        {
            return Employee::all();
        }

        public function FetchRestrict($role_id1, $role_id2)
        {
            $employees = Employee::where('role_id', $role_id1)->orWhere('role_id', $role_id2)->get();
            return $employees;
        }

        /**
         * @param $id
         * @return mixed
         * 特定の従業員の取得
         */
        public function fetch($id)
        {
            return Employee::find($id);
        }

        /**
         * @param $id
         * 従業員の削除
         */
        public function delete($id)
        {
            $employee = $this->fetch($id);
			$employee->delete();

			return;
        }

        /**
         * @param $data
         * employeesの更新
         */
        public function update($data)
        {
            $data['password'] = Hash::make($data['password']);
            $employee = $this->fetch($data['id']);
            $employee->fill($data);
            $employee->save();

            return;
        }

        /**
         * @param $data
         * @return mixed
         * employeesに新規登録
         */
        public function create($data)
        {
            $data['password'] = Hash::make($data['password']);
            $create = new Employee;
            $create->fill($data);
            $create->save();

            return $create->id;
        }

        public function FetchRoleid($employee_id)
        {
            $employee = $this->fetch($employee_id);
            $role_id = $employee->role_id;
            return $role_id;
        }
    }