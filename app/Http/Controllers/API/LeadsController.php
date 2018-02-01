<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Repositories\LeadsRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LeadsController extends Controller
{
    /**
     * @param Request $request
     * @param Response $response
     * @param LeadsRepository $repository
     * @return array
     */
    public function store(Request $request, Response $response, LeadsRepository $repository)
    {
        $args = $request->all();
        $lead = [
            'product_id' => $args['product_id'],
            'employee_id' => $args['employee_id'],
            'name' => $args['name'],
            'document' => $args['document'],
            'email' => $args['email'],
            'ddd' => $args['ddd'],
            'phone' => $args['phone'],
            'other_field_1' => (isset($args['other_field_1']))  ? $args['other_field_1']:null,
            'other_field_2' => (isset($args['other_field_2'])) ? $args['other_field_2']:null ,
            'status' => $args['status']
        ];

        $repository->create($lead);
        return [
            'success' => true
        ];
    }
}