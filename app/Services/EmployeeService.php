<?php
    namespace App\Services;

    use App\Models\Employee;
    use Illuminate\Support\Facades\Hash;

    class EmployeeService
    {
        /**
         * @return Employee[]|\Illuminate\Database\Eloquent\Collection
         * 従業員の全件取得
         */
        public function fetch_all()
        {
            return Employee::all();
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
    }