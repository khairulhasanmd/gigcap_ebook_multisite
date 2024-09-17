<?php

use App\Models\{File, RoleUser, PermissionRole, Team, TeamMemberMeta};
use Nwidart\Modules\Facades\Module;

if (! function_exists('getJsonDataFromFile')) {
    /**
     * Get Data From Json File
     *
     * @param  string|null  $file
     * @return array
     */
    function getJsonDataFromFile($file = null)
    {
        if (empty($file)) {
            return [];
        }

        $data = json_decode(file_get_contents($file));

        return $data;
    }
}

/**
 * Get Unique AssocArray
 *
 * @param  array|null  $array
 * @return array
 */
function getUniqueAssocArray($array = [])
{
    if (! is_array($array) || empty($array)) {
        return [];
    }

    $unique = [];

    foreach ($array as $key => $value) {
        if (! array_key_exists($key, $unique)) {
            $unique[$key] = $value;
        }
    }

    return $unique;
}

/**
 * Create a json file from array
 *
 * @param  string  $filename
 * @param  array  $data
 * @return void
 */
function createJsonFile($filename = 'file.json', $data = [])
{
    $fp = fopen($filename, 'w');
    fwrite($fp, json_encode($data, JSON_PRETTY_PRINT));
    fclose($fp);
}

/**
 * Translate Validation Message
 *
 * @return string
 */
function translateValidationMessages()
{
    $flag = config('app.locale');

    if (! empty($flag) && file_exists(public_path('../resources/lang/validation/' . $flag . '.js'))) {
        return '<script src="' . asset('resources/lang/validation/' . $flag . '.js') . '"></script>';
    }
}

/**
 * To get user profile picture
 *
 * @param  int  $userId
 * @param  int  $thumbnail
 * @return string $image
 */
function getUserProfilePicture($userId = null, $thumbnail = 1)
{
    $image = Cache::get(config('cache.prefix') . '-user-' . $thumbnail . '-avatar-' . $userId);

    if (empty($image)) {
        $image = url('dist/img/avatar.jpg');

        if (! empty($userId)) {
            $userPic = (new File())->getFiles('USER', $userId);

            if (isset($userPic[0])) {
                $path = $thumbnail ? 'uploads/user/thumbnail/' : 'uploads/user/';

                if (isExistFile('' . $path . $userPic[0]->file_name)) {
                    $image = objectStorage()->url('' . $path . $userPic[0]->file_name);
                }
            }
        }

        Cache::put(config('cache.prefix') . '-user-' . $thumbnail . '-avatar-' . $userId, $image, 604800);
    }

    return $image;
}

/**
 * Get Image Data
 *
 * @param  int|null  $id
 * @param  string|null  $type
 * @param  string|null  $name
 * @param  string|null  $path
 * @param  bool|null  $isCatchble
 * @param  bool  $allImage
 * @return string
 */
function getImageData($id = null, $type = null, $name = null, $path = null, $isCatchble = null, $allImage = false)
{
    $image = Cache::get(config('cache.prefix') . '-' . strtolower($type) . '-' . $name . '-' . $id);

    if (empty($image)) {
        $image = url('dist/img/default-image.png');

        if (! empty($id)) {
            $pic = (new File())->getFiles($type, $id);

            if ($allImage == true) {
                $image = [];

                foreach ($pic as $p) {
                    $image[] = objectStorage()->url($path . $p->file_name);
                }
            } else {
                if (isset($pic[0])) {
                    if (isExistFile($path . $pic[0]->file_name)) {
                        $image = objectStorage()->url($path . $pic[0]->file_name);
                    }
                }
            }
        }

        if (! empty($isCatchble)) {
            Cache::put(config('cache.prefix') . '-' . strtolower($type) . '-' . $name . '-' . $id, $image, 604800);
        }
    }

    return $image;
}

/**
 * Validate Phone Number
 *
 * @param  string|null  $number
 * @return bool
 */
function validatePhoneNumber($number = null)
{
    $pattern = "/^[+0-9 () \-]{8,20}$/";
    if (! empty($number) && preg_match($pattern, $number)) {
        return 1;
    }

    return 0;
}

/**
 * Validate Email
 *
 * @param  string|null  $email
 * @return bool
 */
function validateEmail($email = null)
{
    $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";

    if (! empty($email) && preg_match($pattern, $email)) {
        return 1;
    }

    return 0;
}

/**
 * Validate Name
 *
 * @param  string|null  $name
 * @return bool
 */
function validateName($name = null)
{
    $pattern = "/^[a-zA-Z-'\s]+[a-zA-Z-'\.?\s]+$/";
    if (! empty($name) && preg_match($pattern, $name)) {
        $result = 1;
    } else {
        $result = 0;
    }

    if ($result) {
        $result = strlen($name) > 0 ? 1 : 0;
    }

    return $result;
}

/**
 * Get Theme Class
 *
 * @param  string|null  $tagName
 * @return string
 */
function getThemeClass($tagName = null)
{
    $cssClass = '';

    if (empty($tagName)) {
        return $cssClass;
    }

    $themePreferences = preference('theme_preference');
    $themePreferences = ! empty($themePreferences) ? json_decode($themePreferences, true) : '';

    if (! is_array($themePreferences)) {
        return $cssClass;
    }

    foreach ($themePreferences as $key => $value) {
        if ($value == 'default') {
            $data[$key] = '';
        } else {
            $data[$key] = $value;
        }
    }

    if ($tagName == 'header') {
        $cssClass = (! empty($data['header_background']) ? $data['header_background'] : '') . ' ' . (! empty($data['header-fixed']) ? $data['header-fixed'] : '');

        return $cssClass;
    }

    if ($tagName == 'body') {
        $cssClass = ! empty($themePreferences['box-layout']) ? $themePreferences['box-layout'] : '';

        return $cssClass;
    }

    if ($tagName == 'navbar') {
        $cssClass = (! empty($data['theme_mode']) ? $data['theme_mode'] : 'pcoded-navbar' . ' ') .
            (! empty($data['menu_brand_background']) ? $data['menu_brand_background'] : '') . ' ' .
            (! empty($data['menu_background']) ? $data['menu_background'] : '') . ' ' .
            (! empty($data['menu_item_color']) ? $data['menu_item_color'] : '') . ' ' .
            (! empty($data['navbar_image']) ? $data['navbar_image'] : '') . ' ' .
            (! empty($data['menu-icon-colored']) ? $data['menu-icon-colored'] : '') . ' ' .
            (! empty($data['menu-fixed']) ? $data['menu-fixed'] : '') . ' ' .
            (! empty($data['menu_list_icon']) ? $data['menu_list_icon'] : '') . ' ' .
            (! empty($data['menu_dropdown_icon']) ? $data['menu_dropdown_icon'] : '');

        return $cssClass;
    }

    if ($tagName == 'theme-mode') {
        $cssClass = ! empty($themePreferences['theme_mode']) ? $themePreferences['theme_mode'] : '';

        return $cssClass;
    }

    return $cssClass;
}

/**
 * Open Translation File
 *
 * @return Response
 */
function openJSONFile($code)
{
    $jsonString = file_get_contents(base_path('resources/lang/' . $code . '.json'));
    $jsonString = json_decode($jsonString, true);

    return $jsonString;
}

/**
 * Save JSON File
 *
 * @return Response
 */
function saveJSONFile($code, $data)
{
    $jsonData = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    file_put_contents(base_path('resources/lang/' . $code . '.json'), stripslashes($jsonData));
    \Cache::forget('lanObject-' . $code);
}

/**
 * set color of file name and icon
 *
 * @param  string  $fileExtension
 * @return string
 */
function setColor($fileExtension)
{
    $color = '#0F9D58';

    if (in_array($fileExtension, ['csv', 'xls', 'xlsx'])) {
        $color = '#00A953';
    } elseif ($fileExtension == 'pdf') {
        $color = '#FB4C2F';
    } elseif (in_array($fileExtension, ['jpg', 'png', 'jpeg', 'gif'])) {
        $color = '#D93025';
    } elseif (in_array($fileExtension, ['doc', 'docx'])) {
        $color = '#4986E7';
    }

    return $color;
}

/**
 * Get the specified option value.
 * If field not found default will return
 *
 * @param  string  $field
 * @param  mixed  $default
 * @return mixed
 */
function preference($field = null, $default = null)
{
    if (is_null($field)) {
        return app(config('cache.prefix') . '.' . 'preferences')->toArray();
    }

    return app(config('cache.prefix') . '.' . 'preferences')->get($field, $default);
}

if (! function_exists('option')) {
    /**
     * Get the specified option value.
     * If field not found default will return
     *
     * @param  string  $field
     * @param  mixed  $default
     * @return mixed
     */
    function option($field = null, $default = null)
    {
        $themeOptions = new Modules\CMS\Http\Models\ThemeOption();

        if (is_null($field)) {
            return $themeOptions->getAll()->pluck('key_value', 'name')->toArray();
        }

        $value = $default;

        $themeOptions = $themeOptions->getAll()->pluck('key_value', 'name')->toArray();

        if (array_key_exists($field, $themeOptions)) {
            $value = $themeOptions[$field];
        }

        return $value;
    }
}

/**
 * isSuperAdmin method
 * Check user if super admin? We assume
 * that user with ID 1 and/or Role ID 1 will be super admin.
 *
 * @param  int  $userId
 * @return bool
 */
function isSuperAdmin($userId = null)
{
    // Check Auth if userId is NULL
    if (empty($userId)) {
        $userId = Auth::id();
    }

    // Return false if userId is still NULL
    if (empty($userId)) {
        return false;
    }

    if ($userId == 1) {
        return true;
    }

    $roleID = RoleUser::getRoleIDByUser($userId);

    if ($roleID == 1) {
        return true;
    }

    return false;
}

if (! function_exists('defaultRoles')) {
    /**
     * Default Roles
     *
     * @return array
     */
    function defaultRoles()
    {
        return ['admin', 'user'];
    }
}

/**
 * Default Image
 *
 * @return string
 */
function defaultImage(string $type)
{
    $defaultImages = [
        'users' => 'dist/img/avatarUser.png',
        'blogs' => 'dist/img/blog.png',
    ];

    if (array_key_exists($type, $defaultImages)) {
        return $defaultImages[$type];
    }

    return 'dist/img/default-image.png';
}

/**
 * Data Table Options
 *
 * @return array
 */
function dataTableOptions(array $options = [])
{
    $default = [
        'pageLength' => (int) preference('row_per_page', 25),
        'language'   => ['url' => url('/resources/lang/' . config('app.locale') . '.json')],
        'order'      => [0, 'DESC'],
    ];

    return array_merge($default, $options);
}

/**
 * Label Required Element
 *
 * @return array
 */
function labelRequiredElement()
{
    return ['dropdown', 'checkbox', 'checkbox_custom', 'radio', 'radio_custom', 'multiple_select'];
}

/**
 * Has Permission
 *
 * @param  string|null  $permission
 * @param  int|null  $userId
 * @return bool
 */
function hasPermission($permission = null, $userId = null)
{
    // Check Auth if userId is NULL
    if (empty($userId)) {
        $userId = Auth::id();
    }

    // Return false if userId is still NULL
    if (empty($userId)) {
        return false;
    }

    $roleID = RoleUser::getRoleIDByUser($userId);

    if ($roleID == 1) {
        return true;
    }

    if (is_null($roleID)) {
        return false;
    }

    if (! is_null($permission)) {
        return in_array($permission, PermissionRole::permissionNamesByRoleID($roleID));
    }

    return in_array(request()->route()->getActionName(), PermissionRole::permissionNamesByRoleID($roleID));
}

if (! function_exists('wrapIt')) {
    /**
     * wrapIt function to wrap the string to given length
     * If the sidebar menu is collapsed add extra 40 pixels
     * among the columns
     *
     * @param  string  $str
     * @param  int  $length
     * @param  array  $options
     * @return string
     */
    function wrapIt($str = '', $length = 10, $options = [])
    {
        if (empty($str)) {
            return '';
        }

        // Get the options
        $options = array_merge(['break' => "<br>\n", 'cut' => true, 'minWidth' => 1280, 'columns' => 1, 'trim' => false, 'trimLength' => 80], $options);

        // Get window width from cookie
        $width = ! empty($_COOKIE['scrwid']) ? $_COOKIE['scrwid'] : 0;

        if ($width < $options['minWidth']) {
            return $str;
        }

        // Get extra length for collapsed navigation bar
        $extra = $_COOKIE['collapsedNavbar'] == 'true' ? floor((40 / $options['columns']) + .5) : 0;

        if (! empty($options['trim'])) {
            $options['trimLength'] += ($extra * 2);
            if (strlen($str) > $options['trimLength']) {
                $str = mb_substr($str, 0, ($options['trimLength'] - 3)) . '...';
            }
        }

        // Get the length
        $length += floor((($width - $options['minWidth']) / 10) + .5) + $extra;

        // wrap the string
        return wordwrap($str, $length, $options['break'], $options['cut']);
    }
}

if (! function_exists('statusBadges')) {
    /**
     * Status Badges
     *
     * @param  string  $status
     * @return string
     */
    function statusBadges($status = '')
    {
        if (empty($status)) {
            return '';
        }

        $status = strtolower($status);
        $colors = [
            'active' => 'badge-ai-success',
            'published' => 'badge-ai-primary',
            'inactive' => 'badge-ai-danger',
            'deleted' => 'badge-ai-danger',
            'pending' => 'badge-ai-warning',
            'expired' => 'badge-ai-secondary',
            'refunded' => 'badge-ai-danger',
            'cancel' => 'badge-ai-secondary',
            'overdued' => 'badge-ai-secondary',
            'paused' => 'badge-ai-secondary',
            'draft' => 'badge-ai-secondary',
            'picked up' => 'badge-ai-secondary',
            'on the way' => 'badge-ai-secondary',
            'confirmed' => 'badge-ai-secondary',
            'delivered' => 'badge-ai-success',
            'paid' => 'badge-ai-success',
            'unpaid' => 'badge-ai-danger',
            'partially paid' => 'badge-ai-secondary',
            'yes' => 'badge-ai-primary',
            'no' => 'badge-ai-warning',
            'accepted' => 'badge-ai-success',
            'rejected' => 'badge-ai-danger',
            'completed' => 'badge-ai-success',
            'opened' => 'badge-ai-primary',
            'in progress' => 'badge-ai-primary',
            'declined' => 'badge-ai-danger',
            'pending review' => 'badge-ai-warning',
            'public' => 'badge-ai-primary',
            'private' => 'badge-ai-warning',
        ];

        if (! array_key_exists($status, $colors)) {
            return '<span class="badge badge-ai-primary text-white f-12">' . __(ucfirst($status)) . '</span>';
        }

        return '<span class="badge ' . $colors[$status] . ' text-white f-12">' . __(ucfirst($status)) . '</span>';
    }
}
if (! function_exists('checkResulation')) {
    /**
     * Status Badges
     *
     * @param  string  $status
     * @return string
     */
    function checkResulation($status = '')
    {
        if (empty($status)) {
            return '';
        }

        $status = strtolower($status);
        $class = [
            '256x256' => 'h-[256px]',
            '512x512' => 'h-[304px]',
            '640x1536' => 'h-[428px]',
            '768x1344' => 'h-[428px]',
            '832x1216' => 'h-[274px]',
            '896x1152' => 'h-[274px]',
            '1024x1024' => 'h-[354px]',
            '1152x896' => 'h-[354px]',
            '1344x768' => 'h-[220px]',
            '1536x640' => 'h-[220px]',

        ];

        if (! array_key_exists($status, $class)) {
            return '';
        }

        return $class[$status];
    }
}

if (! function_exists('billingStatusBadges')) {
    /**
     * Status Badges
     *
     * @param  string  $status
     * @return string
     */
    function billingStatusBadges($status = '')
    {
        if (empty($status)) {
            return '';
        }

        $status = strtolower($status);

        $colors = [
            'active' => 'text-[#1B9436] bg-[#1B943626]',
            'pending' => 'text-[#763CD4] bg-[#763CD426]',
            'inactive' => 'text-[#898989] bg-[#EEEEEE]',
            'expired' => 'text-[#EEEEEE] bg-[#898989]',
            'cancel' => 'text-[#DF2F2F] bg-[#DF2F2F26]',
        ];

        return array_key_exists($status, $colors) ? $colors[$status] : '';

    }
}
/**
 * Is Active
 *
 * @return bool
 */
function isActive(?string $name = null)
{
    if (is_null($name)) {
        return \Nwidart\Modules\Facades\Module::collections();
    }

    return \Nwidart\Modules\Facades\Module::collections()->has($name);
}

/**
 * Module
 *
 * @return object
 */
function module(?string $name = null)
{
    if (is_null($name)) {
        return \Nwidart\Modules\Facades\Module::all();
    }

    return \Nwidart\Modules\Facades\Module::find($name);
}

/**
 * return product price
 *
 * @param  null  $discountFrom
 * @param  null  $discountTo
 * @param  null  $discountType
 * @param  null  $discountAmount
 * @param  null  $mainPrice
 * @param  string  $type
 * @return float|int|mixed|null
 */
function discountPrice($discountFrom = null, $discountTo = null, $discountType = null, $discountAmount = null, $mainPrice = null, $type = 'exactPrice')
{
    $price = $mainPrice;
    $discount = null;

    if (! empty($discountAmount)) {
        if (dateExists($discountFrom, $discountTo)) {
            $discount = $discountType == 'Percent' ? ($mainPrice * $discountAmount / 100) : $discountAmount;
            $price = abs($mainPrice - $discount);
        }
    }

    /*
     *That is one function two works
     *If it needs to exactPrice with discount then type will be exactPrice and
     *If it needs to only discount amount then type will be discountAmount
    */
    return $type == 'exactPrice' ? $price : $discount;
}

/**
 * get browser agent
 *
 * @return string
 */
function browserAgent()
{
    $browsers = [
        'Edg' => 'Microsoft Edge',
        'MSIE' => 'Internet Explorer',
        'Trident' => 'Internet Explorer',
        'Chrome' => 'Google Chrome',
        'Firefox' => 'Mozilla Firefox',
        'Safari' => 'Apple Safari',
        'Opera Mini' => 'Opera Mini',
        'Opera' => 'Opera',
        'Netscape' => 'Netscape',
    ];

    foreach ($browsers as $key => $value) {
        if (strpos($_SERVER['HTTP_USER_AGENT'], $key) !== false) {
            return $value;
        }
    }

    return 'Unknown';
}

/**
 * get user ip address
 *
 * @return string
 */
function getIpAddress()
{
    if (! empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

/**
 * Get Unique Address
 *
 * @return string
 */
function getUniqueAddress()
{
    $ip = getIpAddress();
    $userAgent = $_SERVER['HTTP_USER_AGENT'];

    return $ip . $userAgent;
}

/**
 *  Check an array multi dimensional or not
 *
 * @return bool
 */
function is_multidimensional(array $array)
{
    return count($array) !== count($array, COUNT_RECURSIVE);
}

/**
 * filter page showing item
 *
 * @return int
 */
function totalProductPerPage()
{
    return 20;
}

/**
 * Get Status
 *
 * @return array
 */
function getStatus()
{
    return [
        'Active', 'Inactive', 'Pending',
    ];
}

/**
 * Get Color
 *
 * @return array
 */
function getColor()
{
    $color = [
        'red' => 'bg-custom-red',
        'pink' => 'bg-custom-pinks',
        'yellow' => 'bg-custom-yellow',
        'skies' => 'bg-custom-skies',
        'white' => 'bg-custom-white black-check',
        'green' => 'bg-custom-green',
        'grey' => 'bg-custom-gray',
        'orange' => 'bg-custom-orange',
        'blue' => 'bg-custom-blue',
        'black' => 'bg-custom-black',
        'purple' => 'bg-custom-purple',
        'maroon' => 'bg-custom-maroon',
        'beige' => 'bg-custom-beige',
    ];

    return $color;
}

if (! function_exists('array_val')) {
    /**
     * Get array value by key
     *
     * @param  array  $haystack
     * @param  string  $needle
     * @param  mixed  $return  Fallback value
     * @return mixed
     */
    function array_val($haystack, $needle, $return = null)
    {
        return is_array($haystack) && isset($haystack[$needle]) ? $haystack[$needle] : $return;
    }
}

/**
 * Get only number
 *
 * @param  string|null  $data
 * @return string
 */
function getOnlyNumber($data = null)
{
    return preg_replace('/[^0-9]/', '', $data);
}

if (! function_exists('checkDownloadableData')) {
    /**
     * Check if downloadable file has id and url
     *
     * @param array
     * @return bool
     */
    function checkDownloadableData($file)
    {
        return is_array($file) && isset($file['url']) && $file['url'];
    }
}

/**
 * Get Formatted Countdown
 *
 * @return string
 */
function getFormattedCountdown()
{
    return 'F' . ' ' . 'j' . ',' . ' ' . 'Y' . ' ' . 'H:i:s';
}

if (! function_exists('priorityColor')) {
    /**
     * trim word
     *
     * @return string
     */
    function priorityColor($priority = null)
    {
        $colors = [
            'High' => '#f2d2d2',
            'Medium' => '#fae39f',
            'Low' => '#e1e0e0',
        ];

        return array_key_exists($priority, $colors) ? $colors[$priority] : '';
    }
}

if (! function_exists('currency')) {
    /**
     * Return currency with cache checking
     *
     * @return mixed
     */
    function currency()
    {
        return App\Models\Currency::getDefault();
    }
}

/**
 * g_e_v
 *
 * @return string
 */
function g_e_v()
{
    // return config('installer.verify.install_key');
    return true;
}

/**
 * g_d
 *
 * @return string
 */
function g_d()
{
    return str_replace(['https://www.', 'http://www.', 'https://', 'http://', 'www.'], '', request()->getHttpHost());
}

/**
 * g_c_v
 *
 * @return string
 */
function g_c_v()
{
    // return cache('a_s_k');
    return true;
}

/**
 * p_c_v
 *
 * @return string
 */
function p_c_v()
{
    // return cache(['a_s_k' => g_e_v()], 2629746);
    return true;
}

if (! function_exists('urlSlashReplace')) {
    /**
     * Replace url slashes
     *
     * @param  string  $url
     * @param  string  $from  Default = \
     * @param  string  $to  Default = /
     * @return string
     */
    function urlSlashReplace($url, $from = '\\', $to = '/')
    {
        return str_replace($from, $to, $url);
    }
}

if (! function_exists('miniCollection')) {

    /**
     * Returns a new \App\Lib\MiniCollection object
     *
     * @param  array  $hayStack  optional
     * @return \App\Lib\MiniCollection;
     */
    function miniCollection($hayStack = [], $nested = false)
    {
        return new \App\Lib\MiniCollection($hayStack, $nested);
    }
}

if (! function_exists('pathToUrl')) {

    /**
     * From file path name to full url
     *
     * @param  string  $path
     * @param  bool  $uploads  Whether or not should include UPLOADS folder
     * @return string
     */
    function pathToUrl($path = '', $uploads = true)
    {
        if (isExistFile(($uploads ? 'uploads' : 'public') . DIRECTORY_SEPARATOR . $path)) {
            return objectStorage()->url($uploads ? 'uploads' : 'public') . DIRECTORY_SEPARATOR . $path;
        } else {
            return asset(defaultImage('homepage'));
        }
    }
}

if (! function_exists('techEncrypt')) {

    /**
     * Custom encryption
     *
     * @param  string  $string
     * @return string encryption
     */
    function techEncrypt($string)
    {
        $string = $string . 'tech_village';

        // Store the cipher method
        $ciphering = 'AES-128-CTR';

        // Use OpenSSl Encryption method
        $options = 0;

        // Non-NULL Initialization Vector for encryption
        $encryption_iv = '1458796521458589';

        // Store the encryption key
        $encryption_key = 'TechVillage';

        // Use openssl_encrypt() function to encrypt the data
        $encrypted = openssl_encrypt($string, $ciphering, $encryption_key, $options, $encryption_iv);

        // Replace "/" with "__";
        return str_replace('/', '__', $encrypted);
    }
}

if (! function_exists('techDecrypt')) {

    /**
     * Custom decryption
     *
     * @param  string  $encryption
     * @return string decryption
     */
    function techDecrypt($encryption)
    {
        // Replace "__" with "/"
        $encryption = str_replace('__', '/', $encryption);
        // Store the cipher method
        $ciphering = 'AES-128-CTR';

        // Use OpenSSl Encryption method
        $options = 0;

        // Non-NULL Initialization Vector for decryption
        $decryption_iv = '1458796521458589';

        // Store the decryption key
        $decryption_key = 'TechVillage';

        // Use openssl_decrypt() function to decrypt the data
        $decrypt = openssl_decrypt($encryption, $ciphering, $decryption_key, $options, $decryption_iv);

        return str_replace('tech_village', '', $decrypt);
    }
}

if (! function_exists('coreStatusSlug')) {

    /**
     * stock reduced if slug will processing/completed/on-hold
     * stock increased if slug will cancelled
     * order will be paid if status will processing/completed
     *
     * @return string[]
     */
    function coreStatusSlug()
    {
        return ['pending-payment', 'failed', 'processing', 'completed', 'on-hold', 'cancelled', 'refunded'];
    }
}

if (! function_exists('pageReload')) {

    /**
     * detect page reload
     */
    function pageReload(): bool
    {
        return isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
    }
}

if (! function_exists('offLinePayments')) {

    /**
     * offline payments
     *
     * @return bool
     */
    function offLinePayments(): bool|array
    {
        $offlineData = collect((new \Modules\Gateway\Entities\GatewayModule())->offlinePayableGateways())->pluck('name')->toArray();

        return is_array($offlineData) ? $offlineData : [];
    }
}

if (! function_exists('paymentRenamed')) {

    /**
     * payment renamed if exists offline payment
     */
    function paymentRenamed($name = null): bool|string|null
    {
        return preg_replace('/(?<!\ )[A-Z]/', ' $0', $name);
    }
}

if (! function_exists('teamMemberAccountSidebarAccess')) {

    /**
     * Auth team member access
     */
    function teamMemberAccountSidebarAccess($id = null): bool
    {
        if ($teamData = Team::where('user_id', $id)->first()) {
            $packageValue = '';
            $memberPackageData = Team::memberSession();
            if (! empty($memberPackageData)) {
                $packageValue = $memberPackageData->value;
            }

            return subscription('isSubscribed', $id) && $teamData->user_id == $packageValue;
        }

        return true;
    }

}

if (! function_exists('customerPanelAccess')) {

    /**
     * Customer panel Access Check for team member
     *
     * @return bool
     */
    function customerPanelAccess($slug)
    {
        $authUserId = auth()->user()->id;
        if ($teamData = Team::where(['user_id' => $authUserId, 'status' => 'Active'])->first()) {
            $packageValue = '';
            $memberPackageData = Team::memberSession();
            if (! empty($memberPackageData)) {
                $packageValue = $memberPackageData->value;
            }
            if (subscription('isSubscribed', $authUserId) && $teamData->user_id == $packageValue) {
                return true;
            } else {
                $teamMeta = TeamMemberMeta::getMemberMeta($teamData->id, $slug);

                return $teamMeta['value'] == 1;
            }
        }

        return true;
    }
}

if (! function_exists('isRecaptchaActive')) {
    /**
     * check recaptcha active status and credential status
     *
     * @return bool
     */
    function isRecaptchaActive()
    {
        return isActive('Recaptcha') && env('NOCAPTCHA_SITEKEY') != null && env('NOCAPTCHA_SECRET') != null;
    }
}

if (! function_exists('moduleConfig')) {

    /**
     * Get UserId
     *
     * @return mixed $userId
     */
    function moduleConfig($name = null)
    {
        if (is_null($name)) {
            $moduleConfig = [];

            foreach (Module::getOrdered() as $module) {
                $configPath = $module->getPath() . '/Config/config.php';

                if (file_exists($configPath)) {
                    $moduleConfig[$module->getLowerName()] = include $configPath;
                }
            }

            return $moduleConfig;
        }

        $keys = explode('.', $name);

        $name = $keys[0];

        $module = Module::find($name);

        if ($module) {
            $configPath = $module->getPath() . '/Config/config.php';

            if (file_exists($configPath)) {
                $array = include $configPath;

                unset($keys[0]);

                foreach ($keys as $key) {
                    if (is_array($array) && array_key_exists($key, $array)) {
                        $array = $array[$key];
                    } else {
                        return null; // Key not found
                    }
                }

                return $array;
            }
        }

        return null;
    }
}

if (! function_exists('addMenuItem')) {

    /**
     * Add Menu Item
     *
     * @return mixed $userId
     */
    function addMenuItem(string|int $menuName, string $label, array $option = []): int|bool
    {
        return (new App\Services\MenuItemService())->addMenuItem($menuName, $label, $option);
    }
}

if (! function_exists('addPermission')) {
    /**
     * Add Permission
     */
    function addPermission(string|array $name): App\Services\PermissionService
    {
        return (new App\Services\PermissionService())->addPermission($name);
    }
}
