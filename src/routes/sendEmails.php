<?php

$app->post('/api/Postmark/sendEmails', function ($request, $response) {

    $settings = $this->settings;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['serverToken','emails']);

    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }

    $requiredParams = ['serverToken'=>'serverToken','emails'=>'emails'];
    $optionalParams = ['to'=>'To','from' => 'from','CcRecipientEmailAddress'=>'Cc','BccRecipientEmailAddress'=>'Bcc','subject'=>'Subject','tag'=>'Tag','htmlBody'=>'HtmlBody','textBody'=>'TextBody','textBody'=>'TextBody','replyTo'=>'ReplyTo','headers'=>'headers','trackOpens'=>'TrackOpens','trackLinks'=>'TrackLinks','attachments'=>'Attachments'];
    $bodyParams = [
       'json' => ['emails']
    ];



    $data = \Models\Params::createParams($requiredParams, $optionalParams, $post_data['args']);

    foreach($data['emails'] as $key => $value)
    {
        foreach($optionalParams as $alias => $vendor)
        {
            if(!empty($value[$alias]))
            {
                $newArr[$key][$vendor] = $data['emails'][$key][$alias];
            }
        }
    }


    $client = $this->httpClient;
    $query_str = "https://api.postmarkapp.com/email/batch";

    

    $requestParams = \Models\Params::createRequestBody($data, $bodyParams);
    $requestParams['headers'] = ["X-Postmark-Server-Token"=>"{$data['serverToken']}", "Accept"=>"application/json"];
    $requestParams['json'] = $newArr;


    try {
        $resp = $client->post($query_str, $requestParams);
        $responseBody = $resp->getBody()->getContents();

        if(in_array($resp->getStatusCode(), ['200', '201', '202', '203', '204'])) {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
            if(empty($result['contextWrites']['to'])) {
                $result['contextWrites']['to']['status_msg'] = "Api return no results";
            }
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ConnectException $exception) {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'INTERNAL_PACKAGE_ERROR';
        $result['contextWrites']['to']['status_msg'] = 'Something went wrong inside the package.';

    }

    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});