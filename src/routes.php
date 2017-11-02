<?php
$routes = [
    'metadata',
    'sendEmail',
    'sendEmails',
    'getDeliveryStats',
    'getBounces',
    'getBounce',
    'getBounceDump',
    'activateBounce',
    'getBouncedTags',
    'getTemplate',
    'createTemplate',
    'updateTemplate',
    'getTemplatesList',
    'deleteTemplate',
    'validateTemplate',
    'sendEmailWithTemplate',
    'getServer',
    'updateServer',
    'getServerForAccount',
    'createServerForAccount',
    'updateServerForAccount',
    'getServersForAccounts',
    'getOutboundMessage',
    'deleteServerForAccount',
    'getOutboundMessageDetails',
    'getOutboundMessageDump',
    'getInboundMessage',
    'getInboundMessageDetails',
    'processFailedInboundMessage',
    'bypassBlockedInboundMessage',
    'openMessage',
    'openSingleMessage',
    'getClickForMessage',
    'getClicksForSingleMessage',
    'getListDomains',
    'getDomainDetails',
    'createDomain',
    'updateDomain',
    'deleteDomain',
    'VerifySpfRecord',
    'RotateDKIMKeys',
    'getListSenderSignatures',
    'getSenderSignature',
    'createSignature',
    'updateSignature',
    'deleteSignature',
    'resendConfirmation',
    'getOutboundOverview',
    'getSentCounts',
    'getBounceCounts',
    'getSpamComplaints',
    'getTrackedEmailcounts',
    'getEmailOpenCounts',
    'getEmailPlatformUsage',
    'getEmailClientUsage ',
    'getEmailReadTimes',
    'getClickCounts',
    'getBrowserPlatformUsage',
    'getBrowserUsage',
    'getClickLocation',
    'createTriggerForTag',
    'getTrigger',
    'updateTrigger',
    'deleteTrigger',
    'getTriggerByName',
    'createInboundRuleTrigger',
    'deleteSingleTrigger',
    'getListInboundRuleTriggers',
    'webhookEvent'
];
foreach($routes as $file) {
    require __DIR__ . '/../src/routes/'.$file.'.php';
}
