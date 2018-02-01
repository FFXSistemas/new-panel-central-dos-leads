<?php


namespace App\Repositories;


use App\Models\Lead;

class LeadsRepository
{
    /**
     * @return Lead
     */
    public function getModel()
    {
        return (new Lead());
    }

    /**
     * @param array $values
     * @return mixed
     */
    public function create(array $values)
    {
        return $this->getModel()
            ->create($values);
    }

    /**
     * @return mixed
     */
    public function leadsTable()
    {
        $user = session('user');

        if($user['employee_id'] == 1){
            return $this->getModel()
                ->select('id', 'product_id', 'employee_id', 'name', 'document', 'email', 'ddd', 'phone', 'other_field_1', 'other_field_2', 'status', 'created_at', 'updated_at')
                ->paginate(10);
        }
        return $this->getModel()
            ->select('id', 'product_id', 'employee_id', 'name', 'document', 'email', 'ddd', 'phone', 'other_field_1', 'other_field_2', 'status', 'created_at', 'updated_at')
            ->where('employee_id', $user['employee'])
            ->paginate(10);
    }

}