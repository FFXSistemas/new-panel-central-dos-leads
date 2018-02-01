<?php


namespace App\Http\Controllers;


use App\Repositories\ConfigsRepository;
use Illuminate\Http\Request;

class ConfigsController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        $config = (new ConfigsRepository())->getConfig();
        return view('pages.configs.all')
            ->withConfig($config);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateConfig(Request $request)
    {
        $args = $request->all();
        $user = session('user');
        $config = (new ConfigsRepository())->find($user['empresa']);
        $data = $args['data_consult'];
        $config->update(['data_consult' => $data]);
        return redirect()->route('config.index');
    }

}