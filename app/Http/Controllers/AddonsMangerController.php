<?php
/**
 * @package AddonsMangerController
 * @author TechVillage <support@techvill.org>
 * @contributor Sakawat Hossain Rony <[sakawat.techvill@gmail.com]>
 * @created 19-01-2022
 */
namespace App\Http\Controllers;

class AddonsMangerController extends Controller
{
    /**
     * All addons list
     *
     * @return mixed
     */
    public function index()
    {
        \Session::flash('info', __('Please make sure to change your environment from Production to local before uploading a new addon to prevent any potential issues on the live system')
            . " <a href='https://help.techvill.net/switching-from-production-to-local-environment' target='_blank'> <i class='feather icon-external-link'>" . __('See Documnetation') . "</i></a>"
        );

        $data['available'] = miniCollection(json_decode(file_get_contents("../Modules/Addons/available_addons.json"), true));
        
        return view('admin.addons.index', $data);
    }
}
