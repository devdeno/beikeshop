<?php
/**
 * SettingController.php
 *
 * @copyright  2022 opencart.cn - All Rights Reserved
 * @link       http://www.guangdawangluo.com
 * @author     Edward Yang <yangjin@opencart.cn>
 * @created    2022-06-29 16:02:15
 * @modified   2022-06-29 16:02:15
 */

namespace Beike\Admin\Http\Controllers;

use Beike\Plugin\Manager;
use Beike\Repositories\SettingRepo;
use Illuminate\Http\Request;

class PluginController extends Controller
{
    /**
     * @throws \Exception
     */
    public function index()
    {
        $data['plugins'] = (new Manager)->getPlugins();
        return view('admin::pages.plugins.index', $data);
    }


    /**
     * @param Request $request
     * @param $code
     * @throws \Exception
     */
    public function edit(Request $request, $code)
    {
        $data['plugin'] = (new Manager)->getPlugin($code);
        return view('admin::pages.plugins.form', $data);
    }


    /**
     * @param Request $request
     * @param $code
     * @throws \Exception
     */
    public function update(Request $request, $code)
    {
        $plugin = (new Manager)->getPlugin($code);
        if (empty($plugin)) {
            throw new \Exception("无效的插件");
        }
        $fields = $request->all();
        SettingRepo::update('plugin', $code, $fields);
        return json_success("编辑成功");
    }


    /**
     * @param Request $request
     * @param $code
     * @throws \Exception
     */
    public function updateStatus(Request $request, $code)
    {
        $plugin = (new Manager)->getPlugin($code);
        dd($plugin);
    }
}
