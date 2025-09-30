<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Apipedia\Apipedia;

class ApipediaController extends Controller
{
    public function index()
    {
        return view('apipedia.index');
    }

    public function showDocumentation()
    {
        return view('apipedia.documentation');
    }

    public function showApipedia()
    {
        return view('apipedia.apipedia');
    }

    public function showWaconsole()
    {
        return view('apipedia.waconsole');
    }

    public function showStart()
    {
        return view('apipedia.start');
    }

    public function showForm(Request $request, $method = null)
    {
        $appKey = $request->session()->get('app_key');
        $authKey = $request->session()->get('auth_key');
        
        // If method is passed as parameter, store it in session
        if ($method) {
            $request->session()->put('selected_method', $method);
        }
        
        // Get method from session or request
        $method = $method ?? $request->session()->get('selected_method') ?? $request->method;
        
        if (!$appKey || !$authKey) {
            return redirect()->route('apipedia.start');
        }

        return view('apipedia.form', [
            'appKey' => $appKey,
            'authKey' => $authKey,
            'method' => $method
        ]);
    }

    public function chooseMethod(Request $request)
    {
        $request->validate([
            'app_key' => 'required',
            'auth_key' => 'required',
        ]);

        $request->session()->put('app_key', $request->app_key);
        $request->session()->put('auth_key', $request->auth_key);

        // If method is provided, redirect to form
        if ($request->has('method') && !empty($request->method)) {
            $request->session()->put('selected_method', $request->method);
            return redirect()->route('apipedia.show-form', ['method' => $request->method]);
        }

        // Otherwise, show the choose method page
        return view('apipedia.choose_method');
    }

    public function executeMethod(Request $request)
    {
        $request->validate([
            'method' => 'required',
            'app_key' => 'required',
            'auth_key' => 'required',
        ]);

        $method = $request->method;
        $appKey = $request->app_key;
        $authKey = $request->auth_key;

        try {
            $apipedia = new Apipedia($appKey, $authKey);

            // Prepare the API call based on the method
            switch ($method) {
                case 'whatsapp':
                    $request->validate([
                        'to' => 'required',
                        'message' => 'required',
                        'media' => 'nullable|url',
                    ]);

                    if ($request->has('media') && !empty($request->media)) {
                        $result = $apipedia->whatsapp($request->to, $request->message, $request->media);
                    } else {
                        $result = $apipedia->whatsapp($request->to, $request->message);
                    }
                    break;

                case 'bulkV1':
                    $request->validate([
                        'numbers' => 'required',
                        'message' => 'required',
                    ]);

                    $toNumbers = explode(',', $request->numbers);
                    $result = $apipedia->bulkV1($toNumbers, $request->message);
                    break;

                case 'bulkV2':
                    $request->validate([
                        'numbers' => 'required',
                        'messages' => 'required',
                    ]);

                    $toNumbers = explode(',', $request->numbers);
                    $messages = explode('|', $request->messages);
                    $result = $apipedia->bulkV2($toNumbers, $messages);
                    break;

                case 'telegramSendMessage':
                    $request->validate([
                        'receiver' => 'required',
                        'body' => 'required',
                    ]);

                    $result = $apipedia->telegramSendMessage($request->receiver, $request->body);
                    break;

                case 'telegramSendImage':
                    $request->validate([
                        'receiver' => 'required',
                        'image_url' => 'required|url',
                        'caption' => 'nullable',
                    ]);

                    $result = $apipedia->telegramSendImage($request->receiver, $request->image_url, $request->caption);
                    break;

                case 'telegramSendLocation':
                    $request->validate([
                        'receiver' => 'required',
                        'latitude' => 'required|numeric',
                        'longitude' => 'required|numeric',
                    ]);

                    $result = $apipedia->telegramSendLocation(
                        $request->receiver,
                        floatval($request->latitude),
                        floatval($request->longitude)
                    );
                    break;

                case 'telegramSendButtons':
                    $request->validate([
                        'receiver' => 'required',
                        'body' => 'required',
                        'buttons_data' => 'required',
                    ]);

                    $buttons = json_decode($request->buttons_data, true);
                    $result = $apipedia->telegramSendButtons($request->receiver, $request->body, $buttons);
                    break;

                case 'telegramSendDocument':
                    $request->validate([
                        'receiver' => 'required',
                        'document_url' => 'required|url',
                        'caption' => 'nullable',
                        'filename' => 'nullable',
                    ]);

                    $result = $apipedia->telegramSendDocument(
                        $request->receiver,
                        $request->document_url,
                        $request->caption,
                        $request->filename
                    );
                    break;

                case 'smsRegular':
                    $request->validate([
                        'to' => 'required',
                        'msg' => 'required',
                    ]);

                    $result = $apipedia->smsRegular($request->to, $request->msg);
                    break;

                case 'smsVIP':
                    $request->validate([
                        'to' => 'required',
                        'msg' => 'required',
                    ]);

                    $result = $apipedia->smsVIP($request->to, $request->msg);
                    break;

                case 'smsOTP':
                    $request->validate([
                        'to' => 'required',
                        'msg' => 'required',
                    ]);

                    $result = $apipedia->smsOTP($request->to, $request->msg);
                    break;

                case 'smsVVIP':
                    $request->validate([
                        'to' => 'required',
                        'msg' => 'required',
                    ]);

                    $result = $apipedia->smsVVIP($request->to, $request->msg);
                    break;

                case 'aiChat':
                    $request->validate([
                        'message' => 'required',
                        'agent_id' => 'required',
                        'format' => 'nullable',
                    ]);

                    $format = $request->format ?? 'text';
                    $result = $apipedia->aiChat($request->message, $request->agent_id, $format);
                    break;

                case 'getProfile':
                    $result = $apipedia->getProfile();
                    break;

                case 'updatePresence':
                    $request->validate([
                        'receiver' => 'required',
                        'presence' => 'required',
                        'duration' => 'nullable|integer',
                    ]);

                    $result = $apipedia->updatePresence($request->receiver, $request->presence, $request->duration);
                    break;

                case 'getMessageStatusAll':
                    $request->validate([
                        'message_id' => 'required',
                    ]);

                    $result = $apipedia->getMessageStatusAll($request->message_id);
                    break;

                case 'getLastStatus':
                    $request->validate([
                        'message_id' => 'required',
                    ]);

                    $result = $apipedia->getLastStatus($request->message_id);
                    break;

                case 'getLastReceiptStatus':
                    $request->validate([
                        'message_id' => 'required',
                    ]);

                    $result = $apipedia->getLastReceiptStatus($request->message_id);
                    break;

                default:
                    return response()->json(['error' => 'Invalid method'], 400);
            }

            $resultData = $result->getResult();
            return response()->json($resultData);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
