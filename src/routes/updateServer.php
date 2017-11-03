<?php

$app->post('/api/Postmark/updateServer', function ($request, $response) {

    $settings = $this->settings;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['serverToken']);

    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }

    $requiredParams = ['serverToken'=>'serverToken'];
    $optionalParams = ['name'=>'Name','color'=>'Color','smtpApiActivated'=>'SmtpApiActivated','rawEmailEnabled'=>'RawEmailEnabled','deliveryHookUrl'=>'DeliveryHookUrl','inboundHookUrl'=>'InboundHookUrl','bounceHookUrl'=>'BounceHookUrl','includeBounceContentInHook'=>'IncludeBounceContentInHook','openHookUrl'=>'OpenHookUrl','postFirstOpenOnly'=>'PostFirstOpenOnly','trackOpens'=>'TrackOpens','trackLinks'=>'TrackLinks','clickHookUrl'=>'ClickHookUrl','inboundDomain'=>'InboundDomain','inboundSpamThreshold'=>'InboundSpamThreshold'];
    $bodyParams = [
       'json' => ['Name','Color','SmtpApiActivated','RawEmailEnabled','DeliveryHookUrl','InboundHookUrl','BounceHookUrl','IncludeBounceContentInHook','OpenHookUrl','PostFirstOpenOnly','TrackOpens','TrackLinks','ClickHookUrl','InboundDomain','InboundSpamThreshold']
    ];

    $data = \Models\Params::createParams($requiredParams, $optionalParams, $post_data['args']);

    

    $client = $this->httpClient;
    $query_str = "https://api.postmarkapp.com/server";

    

    $requestParams = \Models\Params::createRequestBody($data, $bodyParams);
    $requestParams['headers'] = ["X-Postmark-Server-Token"=>"{$data['serverToken']}", "Accept"=>"application/json"];
     

    try {
        $resp = $client->put($query_str, $requestParams);
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