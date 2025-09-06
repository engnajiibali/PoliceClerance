<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\system_setting;
use Hash;
use Session;
class SettingController extends Controller
{

   /**
* Display a listing of the resource.
*/
public function index()
{
$settings= system_setting::findOrfail(1);


return view('setting.index', compact('settings'));        //
}
public function update(Request $request, string $id)
{




$request->validate([
'bus_name' => 'required',
'initName' => 'required',
'bus_email' => 'required',
'bus_phone' => 'required',
'bus_address' => 'required',
'cur_taxt' => 'required',
'cur_sym' => 'required',
'Decimal_Point' => 'required'
]);









$setting = system_setting::findOrfail($id);
if ($request->hasFile('logo')) {

$request->validate([
'logo' => 'required'
]);
//       $destinition ='upload/logo'.$setting->Logo;
// if (file::exists($destinition)) {
//     File::delete($destinition);
// }
$logo=time().'.'.$request->logo->getClientOriginalName();
$request->logo->move(public_path('upload/logo'),$logo);
$setting->Logo = $logo;
}

$setting->Name = $request->bus_name;
$setting->InitialName = $request->initName;
$setting->Address = $request->bus_address;
$setting->Telephone = $request->bus_phone;
$setting->Email = $request->bus_email;
$setting->Website = $request->bus_Website;
$setting->cur_taxt = $request->cur_taxt;
$setting->cur_sym = $request->cur_sym;
$setting->start_date = $request->startDate;
$setting->show_number_after_decimal = $request->Decimal_Point;
$res= $setting->update();

if ($res) {
return redirect('setting/')->with('success', 'Company Profile Successfully Updated');
}
else{
return back()->with('fail', 'Somthing Wrong');
}
}


	/**********************************************
Reset  Company Data  Form View
***********************************************/ 
public function reset()
{
$pageTitle ="Reset Company Data ";
$settings= system_setting::findOrfail(1);
return view('reset.index', compact('settings','pageTitle'));
}
/**********************************************
Reset  Company Data Form Submit
***********************************************/ 
public function resetData(Request $request)
{
$request->validate([
'password' => 'required'
]);
$user = User::where('id', '=',Session()->get('userId'))->where('company_id', '=',Session()->get('company_id'))->first();


if ($user) {


if (Hash::check($request->password, $user->password)) {

categories::where('isDefault', '=', 'No')->delete();
inventories::truncate();
payment_methods::where('isDefault', '=', 'No')->delete();
persons::where('isDefault', '=', 'No')->delete();
expenses::truncate();
Products::truncate();
purchase_items::truncate();
purchases::truncate();
materials::truncate();
sales::truncate();
sales_details::truncate();
sms::truncate();
sms_messages::truncate();
sms_templates::truncate();
stock_items::truncate();
stocks::truncate();
transections::truncate();
tax_rates::where('isDefault', '=', 'No')->delete();
UserLogin::truncate();
user_roles::where('isDefault', '=', 'No')->delete();
User::where('isDefault', '=', 'No')->where('company_id', '=',Session()->get('company_id'))->delete(); 
payments::truncate();
bills::truncate();


// Update table status and waiter
$setInActiveTables = restaurant_tables::all();
foreach ($setInActiveTables as $table) {
    $table->sales_id = 0;
    $table->waiter = 0;
    $table->amount = 0;
    $table->status = "Active";
    $table->save(); // Save changes for each row
}


   return redirect('reset')->with('success', 'Biilbook reset completed successfully');
}
else{
return back()->with('fail', 'only administrator users are allowed Or Your administrator password is incorrect');
}
}
else{
return back()->with('fail', 'Somthing Wrong');
}
}
/**********************************************
Soft Reset  Company Data Form Submit
***********************************************/ 
public function softResetData(Request $request)
{
$request->validate([
'password' => 'required'
]);
$user = User::where('id', '=',Session()->get('userId'))->where('company_id', '=',Session()->get('company_id'))->first();


if ($user) {


if (Hash::check($request->password, $user->password)) {


inventories::truncate();
expenses::truncate();
purchase_items::truncate();
purchases::truncate();
sales::truncate();
sales_details::truncate();
sms::truncate();
sms_messages::truncate();
stock_items::truncate();
stocks::truncate();
transections::truncate();
UserLogin::truncate();
payments::truncate();
bills::truncate();



// Update table status and waiter
$setInActiveTables = restaurant_tables::all();
foreach ($setInActiveTables as $table) {
    $table->sales_id = 0;
    $table->waiter = 0;
    $table->amount = 0;
    $table->status = "Active";
    $table->save(); // Save changes for each row
}


   return redirect('reset')->with('success', 'Biilbook reset completed successfully');
}
else{
return back()->with('fail', 'only administrator users are allowed Or Your administrator password is incorrect');
}
}
else{
return back()->with('fail', 'Somthing Wrong');
}
}

// Show sysnce Page 
public function showSyncePage()
{
  $pageTitle ="Synchronization Page";
return view('setting.sysnc', compact('pageTitle'));      
}
public function synchronizeData(Request $request)
{
    $request->validate([
        'password' => 'required'
    ]);

    $user = User::where('id', Session()->get('userId'))->first();

    if ($user && Hash::check($request->password, $user->password)) {
        try {
            // Synchronize everything
            $this->synchronizeTimeZone();
            $this->synchronizeRecords();
            $this->synchronizeAccessLevels();
            $this->synchronizeMembers();

            return redirect()->back()->with('success', 'Data synchronized successfully!');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with('fail', $e->getMessage());
        }
    }

    return redirect()->back()->with('fail', 'Invalid password.');
}

// Example private function for synchronization logic
private function synchronizeMembers()
{
    $tokenDetails = $this->hikCentralService->getTokenDetails();

    if (!$tokenDetails) {
        throw new \Exception('Failed to retrieve access token details.');
    }

    $accessToken = $tokenDetails['accessToken'];
    $areaDomain = $tokenDetails['areaDomain'];

    $curl = curl_init();
    $allData = [];
    $maxPages = 10;

    for ($pageIndex = 1; $pageIndex <= $maxPages; $pageIndex++) {
        $retryCount = 3;
        $success = false;

        while ($retryCount > 0) {
            curl_setopt_array($curl, [
                CURLOPT_URL => $areaDomain . '/api/hccgw/person/v1/persons/list',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode([
                    'pageIndex' => $pageIndex,
                    'pageSize' => 100,
                    'filter' => [
                        'name' => '',
                        'email' => '',
                        'phone' => ''
                    ]
                ]),
                CURLOPT_HTTPHEADER => [
                    'Token: ' . $accessToken,
                    'Content-Type: application/json'
                ],
            ]);

            $response = curl_exec($curl);

            if ($response !== false) {
                $data = json_decode($response, true);

                if (!empty($data['data']['personList'])) {
                    \Log::info("Page $pageIndex loaded. Count: " . count($data['data']['personList']));
                    $allData = array_merge($allData, $data['data']['personList']);
                    $success = true;
                    break; // success, move to next page
                } else {
                    \Log::info("No more data at page $pageIndex.");
                    break 2; // no more data, exit both loops
                }
            }

            $retryCount--;
            sleep(2);
        }

        if (!$success && $retryCount === 0) {
            \Log::error("Failed to load page $pageIndex after 3 retries.");
            throw new \Exception("Failed to load data from page $pageIndex.");
        }
    }

    curl_close($curl);

    if (empty($allData)) {
        throw new \Exception('No members found to import.');
    }

    foreach ($allData as $member) {
        $personInfo = $member['personInfo'];

        $fingers = null;
        if (isset($member['fingerList']) && !empty($member['fingerList'])) {
            $fingers = $member['fingerList'][0]['data'];
        }

        $startDate = isset($personInfo['startDate']) ? date('Y-m-d', $personInfo['startDate'] / 1000) : null;
        $endDate = isset($personInfo['endDate']) ? date('Y-m-d', $personInfo['endDate'] / 1000) : null;
        $personCode = 'ABC' . getRandomId(6);

        persons::updateOrCreate(
            ['person_id' => $personInfo['personId']],
            [
                'FirstName' => $personInfo['firstName'],
                'LastName' => $personInfo['lastName'],
                'Gender' => $personInfo['gender'],
                'Email' => $personInfo['email'] ?? null,
                'Phone' => $personInfo['phone'] ?? null,
                'id_no' => $personInfo['personCode'],
                'startDate' => $startDate,
                'endDate' => $endDate,
                'fingers' => $fingers,
                'face_id' => null,
                'pin_no' => $member['pinCode'] ?? null,
                'access_card' => null,
                'status' => 'active',
                'memberType' => 'Client',
                'createdby' => session()->get('userId'),
            ]
        );
    }
}

private function synchronizeTimeZone()
{
// Get token details from the service
    $tokenDetails = $this->hikCentralService->getTokenDetails();

    if ($tokenDetails) {
        // Extract the token and areaDomain from the response
        $accessToken = $tokenDetails['accessToken'];
        $areaDomain = $tokenDetails['areaDomain'];

$curl = curl_init();

curl_setopt_array($curl, array(
     CURLOPT_URL => $areaDomain . '/api/hccgw/resource/v1/timezone/get',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
 "pageIndex":1,
 "pageSize":10,
 "deviceCategory":"accessControllerDevice",
 "areaID":"858dff450f38411b8100130d243b083c",
 "filter":{
 "matchKey":"0",
 "jobNumber":"0"
 }
}
',
  CURLOPT_HTTPHEADER => array(
    'Token: hcc.08329voe7zfkmnsigu34usi9kwxksrxd',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);


        // // Decode the response and check for data
        $records = json_decode($response, true)['data']['timeZone'] ?? [];

        if (!empty($records)) {
            // dd( $records);
            foreach ($records as $record) {
                // Extract relevant fields
                $data = [
                    'timezoneId' => $record['id'],
                    'timeZone' => $record['standardName'],
                     'displayName' => $record['displayName'],
                       'bias' => $record['bias'],
                  
               
                ];

                // Save to database
                \App\Models\timezones::updateOrCreate(
                    ['timezoneId' => $record['id']], // Use records_id as unique key
                    $data
                );
            }
        }

        return redirect('dashboard')->with('success', 'Recent records successfully imported.');
    }

    return redirect('dashboard')->with('error', 'Failed to retrieve token details. Please try again later.');
}

private function synchronizeRecords()
{
    // Get token details from the service
    $tokenDetails = $this->hikCentralService->getTokenDetails();

    if ($tokenDetails) {
        // Extract the token and areaDomain from the response
        $accessToken = $tokenDetails['accessToken'];
        $areaDomain = $tokenDetails['areaDomain'];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $areaDomain . '/api/hccgw/acs/v1/event/certificaterecords/search',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30, // Increase timeout in case of poor connection
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
                "pageIndex": 1,
                "pageSize": 20,
                "beginTime": "2024-12-01T00:00:00+03:00",
                "endTime": "2024-12-25T23:59:59+03:00",
                "personName": "",
                "personCode": "",
                "personGroupIds": [],
                "dateFormat": "yyyy/MM/dd",
                "timeFormat": "HH:mm",
                "durationFormat": "HH:MM"
            }',
            CURLOPT_HTTPHEADER => array(
                'Token: ' . $accessToken,
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        $curlError = curl_error($curl); // Capture any cURL error
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE); // Get HTTP response code
        curl_close($curl);

        // If there's an error, handle gracefully
        if ($curlError || $httpCode !== 200) {
            // Log the error for debugging purposes
            \Log::error('cURL Error: ' . $curlError . ' HTTP Code: ' . $httpCode);

            // Display a user-friendly error message
            return redirect('dashboard')->with('error', 'Unable to access the HikCentral API. Please check your internet connection or the API endpoint.');
        }

        // Decode the response and check for data
        $records = json_decode($response, true)['data']['recordList'] ?? [];

        if (!empty($records)) {
            foreach ($records as $record) {
                // Extract relevant fields
                $data = [
                    'member_id' => 10 ?? null,
                    'records_id' => $record['recordGuid'] ?? null,
                    'personCode' => $record['personInfo']['id'] ?? null,
                    'name' => ($record['personInfo']['baseInfo']['firstName'] ?? '') . ' ' . ($record['personInfo']['baseInfo']['lastName'] ?? ''),
                    'occurTime' => isset($record['deviceTime']) ? \Carbon\Carbon::parse($record['deviceTime'])->format('Y-m-d H:i:s') : null,
                    'AuthResult' => $record['swipeAuthResult'],
                    'door_name' => $record['elementName'] ?? 'Unknown',
                         'areaName' => $record['areaName'] ?? 'Unknown Area',
        'deviceName' => $record['deviceName'] ?? 'Unknown Device',
        'eventType' => $record['eventType'] ?? '0',
                    'PicUrl' => !empty($record['elementPicUrl']) 
                        ? $record['elementPicUrl'] 
                        : ($record['acsSnapPicList'][0]['snapPicUrl'] ?? ''),
                ];

                // Save to database
                \App\Models\accessRecords::updateOrCreate(
                    ['records_id' => $data['records_id']], // Use records_id as unique key
                    $data
                );
            }
        }

        return redirect('dashboard')->with('success', 'Recent records successfully imported.');
    }

    return redirect('dashboard')->with('error', 'Failed to retrieve token details. Please try again later.');
}

private function synchronizeAccessLevels()
{
    // Get token details from the service
    $tokenDetails = $this->hikCentralService->getTokenDetails();

    if ($tokenDetails) {
        // Extract the token and areaDomain from the response
        $accessToken = $tokenDetails['accessToken'];
        $areaDomain = $tokenDetails['areaDomain'];

        try {
            // Initialize Guzzle client
            $client = new Client();

            // Make the API request
            $response = $client->post($areaDomain . '/api/hccgw/acspm/v1/accesslevel/list', [
                'json' => [
                    'accessLevelSearchRequest' => [
                        'pageIndex' => 1,
                        'pageSize' => 20,
                        'searchCriteria' => [
                            'accessLevelName' => '',
                            'associateResInfoList' => []
                        ]
                    ]
                ],
                'headers' => [
                    'Token' => $accessToken,
                    'Content-Type' => 'application/json',
                ],
                'timeout' => 300,  // Set a timeout of 30 seconds
            ]);

            // Decode the JSON response
            $responseData = json_decode($response->getBody(), true);

            // Check if the response is successful
            if ($responseData && $responseData['errorCode'] == '0') {
                // Extract Access Levels
                $AccessLevels = $responseData['data']['accessLevelResponse']['accessLevelList'] ?? [];

                // Loop through each access level and save it
                foreach ($AccessLevels as $level) {
                    AccessLevels::updateOrCreate(
                        ['accesslevel_id' => $level['id']], // Unique identifier
                        [
                            'name' => $level['name'],
                            'remark' => $level['remark'] ?? null,
                            'usageType' => $level['usageType'],
                            'timeSchedule' => $level['timeSchedule'], // Save as JSON
                            'associateResList' => $level['associateResList'], // Save as JSON
                        ]
                    );
                }

                // Redirect with success message
                return redirect('accessLevel')->with('success', 'Staff successfully registered');
            } else {
                // Handle API errors
                return back()->with('fail', 'Unable to retrieve access level data.');
            }
        } catch (Exception $e) {
            // Handle exceptions (e.g., timeout, cURL errors)
            return back()->with('fail', 'Request failed: ' . $e->getMessage());
        }
    } else {
        // If token details are not fetched, return an error
        return back()->with('fail', 'Unable to retrieve token details.');
    }
}

}
