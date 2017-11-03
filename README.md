[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/Postmark/functions?utm_source=RapidAPIGitHub_PostmarkFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# Postmark Package
Postmark helps deliver and track transactional emails for web applications. In a nutshell, the service replaces SMTP (or Sendmail) with a far more reliable, scalable and care-free environment. In addition, you can track statistics such as number of emails sent or processed, opens, bounces and spam complaints.
* Domain: [postmarkapp.com](https://postmarkapp.com/)
* Credentials: serverToken,accountToken

## How to get credentials: 
0. Register on the [postmarkapp.com](https://postmarkapp.com/)
1. [Create](https:\/\/account.postmarkapp.com\/servers) an server for a new API credentials
2. After creation server you will see API credentials in server settings

## Custom datatypes: 
 |Datatype|Description|Example
 |--------|-----------|----------
 |Datepicker|String which includes date and time|```2016-05-28 00:00:00```
 |Map|String which includes latitude and longitude coma separated|```50.37, 26.56```
 |List|Simple array|```["123", "sample"]``` 
 |Select|String with predefined values|```sample```
 |Array|Array of objects|```[{"Second name":"123","Age":"12","Photo":"sdf","Draft":"sdfsdf"},{"name":"adi","Second name":"bla","Age":"4","Photo":"asfserwe","Draft":"sdfsdf"}] ``` 
 
 
## Postmark.sendEmail
Send single email.This endpoint is solely responsible for sending emails with Postmark through a specific server.

| Field                   | Type       | Description
|-------------------------|------------|----------
| serverToken             | credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| from                    | String     | The sender email address. Must have a registered and confirmed Sender Signature.
| to                      | String     | Recipient email address. Multiple addresses are comma separated. Max 50.
| CcRecipientEmailAddress | String     | Cc recipient email address. Multiple addresses are comma separated. Max 50.
| BccRecipientEmailAddress| String     | Bcc recipient email address. Multiple addresses are comma separated. Max 50.
| subject                 | String     | Email subject.
| tag                     | String     | Email tag that allows you to categorize outgoing emails and get detailed statistics.
| htmlBody                | String     | If no TextBody specified HTML email message.
| textBody                | String     | If no HtmlBody specified Plain text email message.
| textBody                | String     | If no HtmlBody specified Plain text email message.
| replyTo                 | String     | Reply To override email address. Defaults to the Reply To set in the sender signature.
| headers                 | Array      | List of custom headers to include.
| trackOpens              | Select     | Activate open tracking for this email.
| trackLinks              | Select     | Activate link tracking for links in the HTML or Text bodies of this email. 
| attachments             | Array      | List of attachments.

##### Attachments example

```
{
      "Name": "readme.txt",
      "Content": "dGVzdCBjb250ZW50",
      "ContentType": "text/plain"
}
```

## Postmark.sendEmails
Send batch emails.This endpoint is solely responsible for sending emails with Postmark through a specific server.

| Field                   | Type       | Description
|-------------------------|------------|----------
| serverToken             | credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| emails                  | Array      | Array of email.
| emails.from                    | String     | The sender email address. Must have a registered and confirmed Sender Signature.
| emails.to                      | String     | Recipient email address. Multiple addresses are comma separated. Max 50.
| emails.CcRecipientEmailAddress | String     | Cc recipient email address. Multiple addresses are comma separated. Max 50.
| emails.BccRecipientEmailAddress| String     | Bcc recipient email address. Multiple addresses are comma separated. Max 50.
| emails.subject                 | String     | Email subject.
| emails.tag                     | String     | Email tag that allows you to categorize outgoing emails and get detailed statistics.
| emails.htmlBody                | String     | If no TextBody specified HTML email message.
| emails.textBody                | String     | If no HtmlBody specified Plain text email message.
| emails.textBody                | String     | If no HtmlBody specified Plain text email message.
| emails.replyTo                 | String     | Reply To override email address. Defaults to the Reply To set in the sender signature.
| emails.headers                 | JSON       | Json list of custom headers to include.
| emails.trackOpens              | Select     | Activate open tracking for this email.
| emails.trackLinks              | Select     | Activate link tracking for links in the HTML or Text bodies of this email. 
| emails.attachments             | JSON       | List of attachments

##### Attachments example

```
{
      "Name": "readme.txt",
      "Content": "dGVzdCBjb250ZW50",
      "ContentType": "text/plain"
}
```

## Postmark.getDeliveryStats
Get delivery stats.Lets you access all reports regarding your bounces for a specific server.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.

## Postmark.getBounces
Lets you access all reports regarding your bounces for a specific server.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| count      | Number     | Number of bounces to return per request. Max 500.
| offset     | Number     | Number of bounces to skip.
| inactive   | Select     | Filter by emails that were deactivated by Postmark due to the bounce. Set to true or false. If this isn’t specified it will return both active and inactive.
| emailFilter| String     | Filter by email address.
| tag        | String     | Filter by tag.
| messageID  | String     | Filter by messageID.
| fromDate   | DatePicker | Filter messages starting from the date specified (inclusive). e.g. 2014-02-01
| toDate     | DatePicker | Filter messages up to the date specified (inclusive). e.g. 2014-02-01
| type       | Select     | Bounce types.See more in [here](https://postmarkapp.com/developer/api/bounce-api#bounce-types).

## Postmark.getBounce
Get a single bounce.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| bounceId   | String     | Id of bounce.

## Postmark.getBounceDump
Get bounce dump.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| bounceId   | String     | Id of bounce.

## Postmark.activateBounce
Activate a bounce.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| bounceId   | String     | Id of bounce.

## Postmark.getBouncedTags
Get an array of tags that have generated bounces for a given server.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.

## Postmark.getTemplate
Get a template.Lets you manage templates for a specific server. Please note that a Server may have up to 300 active templates. Requests that exceed this limit won't be processed.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| templateId | Number     | ID of template.

## Postmark.createTemplate
Create a template.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| name       | String     | Name of template.
| subject    | String     | The content to use for the Subject when this template is used to send email. See [documentation](http://support.postmarkapp.com/article/1077-template-syntax) for more information.
| textBody   | String     | The content to use for the HtmlBody when this template is used to send email. Required if htmlBody is not specified. See [documentation](http://support.postmarkapp.com/article/1077-template-syntax) for more information.
| htmlBody   | String     | The content to use for the TextBody when this template is used to send email. Required if textBody is not specified.  See [documentation](http://support.postmarkapp.com/article/1077-template-syntax) for more information.

## Postmark.updateTemplate
Edit a template.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| templateId | Number     | ID of template.
| name       | String     | Name of template.
| subject    | String     | The content to use for the Subject when this template is used to send email. See [documentation](http://support.postmarkapp.com/article/1077-template-syntax) for more information.
| textBody   | String     | The content to use for the HtmlBody when this template is used to send email. Required if htmlBody is not specified. See [documentation](http://support.postmarkapp.com/article/1077-template-syntax) for more information.
| htmlBody   | String     | The content to use for the TextBody when this template is used to send email. Required if textBody is not specified.  See [documentation](http://support.postmarkapp.com/article/1077-template-syntax) for more information.

## Postmark.getTemplatesList
Get list of templates.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| count      | String     | The number of templates to return.
| offset     | Number     | The number of templates to `skip` before returning results.

## Postmark.deleteTemplate
Delete a template.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| templateId | Number     | ID of template.

## Postmark.validateTemplate
Validate a template.

| Field                     | Type       | Description
|---------------------------|------------|----------
| serverToken               | credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| name                      | String     | Name of template.
| subject                   | String     | The content to use for the Subject when this template is used to send email. See [documentation](http://support.postmarkapp.com/article/1077-template-syntax) for more information.
| textBody                  | String     | The content to use for the HtmlBody when this template is used to send email. Required if htmlBody is not specified. See [documentation](http://support.postmarkapp.com/article/1077-template-syntax) for more information.
| htmlBody                  | String     | The content to use for the TextBody when this template is used to send email. Required if textBody is not specified.  See [documentation](http://support.postmarkapp.com/article/1077-template-syntax) for more information.
| inlineCssForHtmlTestRender| Select     | When HtmlBody is specified, the test render will have style blocks inlined as style attributes on matching html elements. You may disable the css inlining behavior by passing false for this parameter.
| testRenderModel                  | JSON     | The model to be used when rendering test content.

##### Example for testRenderModel
```
{
  "userName": "bobby joe"
}
```

## Postmark.sendEmailWithTemplate
Send email with template.

| Field                   | Type       | Description
|-------------------------|------------|----------
| serverToken             | credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| templateId              | Number     | The template to use when sending this message.
| templateModel           | Number     | The model to be applied to the specified template to generate HtmlBody, TextBody, and Subject.
| inlineCss               | Select     | By default, if the specified template contains an HTMLBody, we will apply the style blocks as inline attributes to the rendered HTML content. You may opt-out of this behavior by passing false for this request field.
| from                    | String     | The sender email address. Must have a registered and confirmed Sender Signature.
| to                      | String     | Recipient email address. Multiple addresses are comma separated. Max 50.
| CcRecipientEmailAddress | String     | Cc recipient email address. Multiple addresses are comma separated. Max 50.
| BccRecipientEmailAddress| String     | Bcc recipient email address. Multiple addresses are comma separated. Max 50.
| subject                 | String     | Email subject.
| tag                     | String     | Email tag that allows you to categorize outgoing emails and get detailed statistics.
| replyTo                 | String     | Reply To override email address. Defaults to the Reply To set in the sender signature.
| headers                 | Array      | List of custom headers to include.
| trackOpens              | Select     | Activate open tracking for this email.
| trackLinks              | Select     | Activate link tracking for links in the HTML or Text bodies of this email. 
| attachments             | Array      | List of attachments

## Postmark.getServer
Get the server.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.

## Postmark.updateServer
Edit the server.

| Field                     | Type       | Description
|---------------------------|------------|----------
| serverToken               | credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| name                      | String     | Name of server.
| color                     | Select     | Color of the server in the rack screen.
| smtpApiActivated          | Select     | Specifies whether or not SMTP is enabled on this server.
| rawEmailEnabled           | Select     | Enable raw email to be sent with inbound.
| deliveryHookUrl           | String     | URL to POST to every time email is delivered.
| inboundHookUrl            | String     | URL to POST to every time an inbound event occurs.
| bounceHookUrl             | String     | URL to POST to every time a bounce event occurs.
| includeBounceContentInHook| Select     | Include bounce content in webhook.
| openHookUrl               | String     | URL to POST to every time an open event occurs.
| postFirstOpenOnly         | Select     | If set to true, only the first open by a particular recipient will initiate the open webhook. Any subsequent opens of the same email by the same recipient will not initiate the webhook.
| trackOpens                | Select     | Indicates if all emails being sent through this server have open tracking enabled.
| trackLinks                | Select     | Indicates if all emails being sent through this server should have link tracking enabled for links in their HTML or Text bodies. 
| clickHookUrl              | String     | URL to POST to when a unique click event occurs.
| inboundDomain             | String     | Inbound domain for MX setup.
| inboundSpamThreshold      | Number     | The maximum spam score for an inbound message before it's blocked.

## Postmark.getServerForAccount
Lets you manage servers for a specific account.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| serverId   | Number     | ID of server.

## Postmark.createServerForAccount
Create a server for account.

| Field                     | Type       | Description
|---------------------------|------------|----------
| serverToken               | credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| name                      | String     | Name of server.
| color                     | Select     | Color of the server in the rack screen.
| smtpApiActivated          | Select     | Specifies whether or not SMTP is enabled on this server.
| rawEmailEnabled           | Select     | Enable raw email to be sent with inbound.
| deliveryHookUrl           | String     | URL to POST to every time email is delivered.
| inboundHookUrl            | String     | URL to POST to every time an inbound event occurs.
| bounceHookUrl             | String     | URL to POST to every time a bounce event occurs.
| includeBounceContentInHook| Select     | Include bounce content in webhook.
| openHookUrl               | String     | URL to POST to every time an open event occurs.
| postFirstOpenOnly         | Select     | If set to true, only the first open by a particular recipient will initiate the open webhook. Any subsequent opens of the same email by the same recipient will not initiate the webhook.
| trackOpens                | Select     | Indicates if all emails being sent through this server have open tracking enabled.
| trackLinks                | Select     | Indicates if all emails being sent through this server should have link tracking enabled for links in their HTML or Text bodies. 
| clickHookUrl              | String     | URL to POST to when a unique click event occurs.
| inboundDomain             | String     | Inbound domain for MX setup.
| inboundSpamThreshold      | Number     | The maximum spam score for an inbound message before it's blocked.

## Postmark.updateServerForAccount
Update a server for account.

| Field                     | Type       | Description
|---------------------------|------------|----------
| serverToken               | credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| serverId                  | Number     | Id of the server.
| name                      | String     | Name of server.
| color                     | Select     | Color of the server in the rack screen.
| smtpApiActivated          | Select     | Specifies whether or not SMTP is enabled on this server.
| rawEmailEnabled           | Select     | Enable raw email to be sent with inbound.
| deliveryHookUrl           | String     | URL to POST to every time email is delivered.
| inboundHookUrl            | String     | URL to POST to every time an inbound event occurs.
| bounceHookUrl             | String     | URL to POST to every time a bounce event occurs.
| includeBounceContentInHook| Select     | Include bounce content in webhook.
| openHookUrl               | String     | URL to POST to every time an open event occurs.
| postFirstOpenOnly         | Select     | If set to true, only the first open by a particular recipient will initiate the open webhook. Any subsequent opens of the same email by the same recipient will not initiate the webhook.
| trackOpens                | Select     | Indicates if all emails being sent through this server have open tracking enabled.
| trackLinks                | Select     | Indicates if all emails being sent through this server should have link tracking enabled for links in their HTML or Text bodies. 
| clickHookUrl              | String     | URL to POST to when a unique click event occurs.
| inboundDomain             | String     | Inbound domain for MX setup.
| inboundSpamThreshold      | Number     | The maximum spam score for an inbound message before it's blocked.

## Postmark.getServersForAccounts
List servers.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| count      | String     | Number of servers to return per request.
| offset     | Number     | Number of servers to skip.
| name       | String     | Filter by a specific server name.

## Postmark.getOutboundMessage
Outbound message search.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| count      | Number     | Number of messages to return per request. Max 500.
| offset     | Number     | Number of messages to skip.
| recipient  | String     | Filter by the user who was receiving the email.
| fromEmail  | String     | Filter by the sender email address.
| recipient  | String     | Filter by the user who was receiving the email.
| tag        | String     | Filter by tag.
| status     | Select     | Filter by status (queued or sent)
| fromDate   | DatePicker | Filter messages starting from the date specified (inclusive). e.g. 2014-02-01
| toDate     | DatePicker | Filter messages up to the date specified (inclusive). e.g. 2014-02-01

## Postmark.deleteServerForAccount
Delete a server.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| serverId   | String     | Id of the server.

## Postmark.getOutboundMessageDetails
Get Outbound message details.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| messageId  | String     | Id of the message.

## Postmark.getOutboundMessageDump
Get Outbound message dump.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| messageId  | String     | Id of the message.

## Postmark.getInboundMessage
Inbound message search.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| count      | Number     | Number of messages to return per request. Max 500.
| offset     | Number     | Number of messages to skip.
| recipient  | String     | Filter by the user who was receiving the email.
| fromEmail  | String     | Filter by the sender email address.
| recipient  | String     | Filter by the user who was receiving the email.
| tag        | String     | Filter by tag.
| status     | Select     | Filter by status. (blocked, processed, queued, failed, scheduled)
| fromDate   | DatePicker | Filter messages starting from the date specified (inclusive). e.g. 2014-02-01
| toDate     | DatePicker | Filter messages up to the date specified (inclusive). e.g. 2014-02-01

## Postmark.getInboundMessageDetails
Get Inbound message details.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| messageId  | String     | Id of the message.

## Postmark.processFailedInboundMessage
Retry a failed inbound message for processing.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| messageId  | String     | Id of the message.

## Postmark.bypassBlockedInboundMessage
Bypass rules for a blocked inbound message.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| messageId  | String     | Id of the message.

## Postmark.openMessage
Message opens.

| Field        | Type       | Description
|--------------|------------|----------
| serverToken  | credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| count        | Number     | Number of message opens to return per request. Max 500.
| offset       | Number     | Number of messages to skip.
| recipient    | String     | Filter by To, Cc, Bcc.
| tag          | String     | Filter by tag.
| clientName   | String     | Filter by client name, i.e. Outlook, Gmail.
| clientCompany| String     | Filter by company, i.e. Microsoft, Apple, Google.
| clientFamily | String     | Filter by client family, i.e. OS X, Chrome.
| osName       | String     | Filter by full OS name and specific version, i.e. OS X 10.9 Mavericks, Windows 7.
| osFamily     | String     | Filter by kind of OS used without specific version, i.e. OS X, Windows.
| osCompany    | String     | Filter by company which produced the OS, i.e. Apple Computer, Inc., Microsoft Corporation.
| platform     | String     | Filter by platform, i.e. webmail, desktop, mobile.
| region       | String     | Filter by full name of region messages were opened in, i.e. Moscow, New York.
| city         | String     | Filter by full name of city messages were opened in, i.e. Minneapolis, Philadelphia.

## Postmark.openSingleMessage
Opens for a single message.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| messageId  | String     | Id of the message.
| count      | Number     | Number of message opens to return per request. Max 500.
| offset     | Number     | Number of messages to skip

## Postmark.getClickForMessage
Get click for message.

| Field        | Type       | Description
|--------------|------------|----------
| serverToken  | credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| count        | Number     | Number of message opens to return per request. Max 500.
| offset       | Number     | Number of messages to skip.
| recipient    | String     | Filter by To, Cc, Bcc.
| tag          | String     | Filter by tag.
| clientName   | String     | Filter by client name, i.e. Outlook, Gmail.
| clientCompany| String     | Filter by company, i.e. Microsoft, Apple, Google.
| clientFamily | String     | Filter by client family, i.e. OS X, Chrome.
| osName       | String     | Filter by full OS name and specific version, i.e. OS X 10.9 Mavericks, Windows 7.
| osFamily     | String     | Filter by kind of OS used without specific version, i.e. OS X, Windows.
| osCompany    | String     | Filter by company which produced the OS, i.e. Apple Computer, Inc., Microsoft Corporation.
| platform     | String     | Filter by platform, i.e. webmail, desktop, mobile.
| region       | String     | Filter by full name of region messages were opened in, i.e. Moscow, New York.
| city         | String     | Filter by full name of city messages were opened in, i.e. Minneapolis, Philadelphia.

## Postmark.getClicksForSingleMessage
Clicks for a single message .

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| messageId  | String     | Id of the message.
| count      | Number     | Number of message opens to return per request. Max 500.
| offset     | Number     | Number of messages to skip

## Postmark.getListDomains
Gets a list of domains containing an overview of the domain and authentication status.

| Field       | Type       | Description
|-------------|------------|----------
| accountToken| credentials| This request requires account level privileges. Only accessible by the account owner, this token can be found on the Account tab of your Postmark account.
| count       | Number     | Number of records to return per request. Max 500.
| offset      | Number     | Number of records to skip.

## Postmark.getDomainDetails
Gets all the details for a specific domain.

| Field       | Type       | Description
|-------------|------------|----------
| accountToken| credentials| This request requires account level privileges. Only accessible by the account owner, this token can be found on the Account tab of your Postmark account.
| domainId    | String     | Id of the domain.

## Postmark.createDomain
Create a domain.

| Field           | Type       | Description
|-----------------|------------|----------
| accountToken    | credentials| This request requires account level privileges. Only accessible by the account owner, this token can be found on the Account tab of your Postmark account.
| name            | String     | Domain name.
| returnPathDomain| String     | A custom value for the Return-Path domain. It is an optional field, but it must be a subdomain of your From Email domain and must have a CNAME record that points to pm.mtasv.net. For more information about this field, please see more [here](http://support.postmarkapp.com/article/910-adding-a-custom-return-path-domain).

## Postmark.updateDomain
Edit a domain.

| Field           | Type       | Description
|-----------------|------------|----------
| accountToken    | credentials| This request requires account level privileges. Only accessible by the account owner, this token can be found on the Account tab of your Postmark account.
| returnPathDomain| String     | A custom value for the Return-Path domain. It is an optional field, but it must be a subdomain of your From Email domain and must have a CNAME record that points to pm.mtasv.net. For more information about this field, please see more [here](http://support.postmarkapp.com/article/910-adding-a-custom-return-path-domain).
| domainId        | String     | Id of the domain.

## Postmark.deleteDomain
Delete a domain.

| Field       | Type       | Description
|-------------|------------|----------
| accountToken| credentials| This request requires account level privileges. Only accessible by the account owner, this token can be found on the Account tab of your Postmark account.
| domainId    | String     | Id of the domain.

## Postmark.VerifySpfRecord
Will query DNS for your domain and attempt to verify the SPF record contains the information for Postmark's servers.

| Field       | Type       | Description
|-------------|------------|----------
| accountToken| credentials| This request requires account level privileges. Only accessible by the account owner, this token can be found on the Account tab of your Postmark account.
| domainId    | String     | Id of the domain.

## Postmark.RotateDKIMKeys
Creates a new DKIM key to replace your current key. Until the new DNS entries are confirmed, the pending values will be in DKIMPendingHost and DKIMPendingTextValue fields. After the new DKIM value is verified in DNS, the pending values will migrate to DKIMTextValue and DKIMPendingTextValue and Postmark will begin to sign emails with the new DKIM key.

| Field       | Type       | Description
|-------------|------------|----------
| accountToken| credentials| This request requires account level privileges. Only accessible by the account owner, this token can be found on the Account tab of your Postmark account.
| domainId    | String     | Id of the domain.

## Postmark.getListSenderSignatures
Gets a list of sender signatures containing brief details associated with your account.

| Field       | Type       | Description
|-------------|------------|----------
| accountToken| credentials| This request requires account level privileges. Only accessible by the account owner, this token can be found on the Account tab of your Postmark account.
| count       | String     | Number of records to return per request. Max 500.
| offset      | String     | Number of records to skip.

## Postmark.getSenderSignature
Gets all the details for a specific sender signature.

| Field       | Type       | Description
|-------------|------------|----------
| accountToken| credentials| This request requires account level privileges. Only accessible by the account owner, this token can be found on the Account tab of your Postmark account.
| signatureId | String     | Id of the signature.

## Postmark.createSignature
Create a signature.

| Field           | Type       | Description
|-----------------|------------|----------
| accountToken    | credentials| This request requires account level privileges. Only accessible by the account owner, this token can be found on the Account tab of your Postmark account.
| fromEmail       | String     | From email associated with sender signature.
| name            | String     | From name associated with sender signature.
| replyToEmail    | String     | Override for reply-to address.
| returnPathDomain| String     | A custom value for the Return-Path domain. It is an optional field, but it must be a subdomain of your From Email domain and must have a CNAME record that points to pm.mtasv.net. For more information about this field, please see more [here](http://support.postmarkapp.com/article/910-adding-a-custom-return-path-domain).

## Postmark.updateSignature
Edit a signature.

| Field           | Type       | Description
|-----------------|------------|----------
| accountToken    | credentials| This request requires account level privileges. Only accessible by the account owner, this token can be found on the Account tab of your Postmark account.
| signatureId     | Number     | Id of the signature.
| name            | String     | From name associated with sender signature.
| replyToEmail    | String     | Override for reply-to address.
| returnPathDomain| String     | A custom value for the Return-Path domain. It is an optional field, but it must be a subdomain of your From Email domain and must have a CNAME record that points to pm.mtasv.net. For more information about this field, please see more [here](http://support.postmarkapp.com/article/910-adding-a-custom-return-path-domain).

## Postmark.deleteSignature
Delete a signature.

| Field       | Type       | Description
|-------------|------------|----------
| accountToken| credentials| This request requires account level privileges. Only accessible by the account owner, this token can be found on the Account tab of your Postmark account.
| signatureId | Number     | Id of the signature.

## Postmark.resendConfirmation
Resend a confirmation.

| Field       | Type       | Description
|-------------|------------|----------
| accountToken| credentials| This request requires account level privileges. Only accessible by the account owner, this token can be found on the Account tab of your Postmark account.
| signatureId | Number     | Id of the signature.

## Postmark.getOutboundOverview
Gets a brief overview of statistics for all of your outbound email.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| tag        | String     | Filter by tag.
| fromDate   | DatePicker | Filter stats starting from the date specified (inclusive). e.g. 2014-01-01
| toDate     | DatePicker | Filter stats up to the date specified (inclusive). e.g. 2014-02-01

## Postmark.getSentCounts
Gets a total count of emails you’ve sent out.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| tag        | String     | Filter by tag.
| fromDate   | DatePicker | Filter stats starting from the date specified (inclusive). e.g. 2014-01-01
| toDate     | DatePicker | Filter stats up to the date specified (inclusive). e.g. 2014-02-01

## Postmark.getBounceCounts
Gets total counts of emails you’ve sent out that have been returned as bounced.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| tag        | String     | Filter by tag.
| fromDate   | DatePicker | Filter stats starting from the date specified (inclusive). e.g. 2014-01-01
| toDate     | DatePicker | Filter stats up to the date specified (inclusive). e.g. 2014-02-01

## Postmark.getSpamComplaints
Gets a total count of recipients who have marked your email as spam.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| tag        | String     | Filter by tag.
| fromDate   | DatePicker | Filter stats starting from the date specified (inclusive). e.g. 2014-01-01
| toDate     | DatePicker | Filter stats up to the date specified (inclusive). e.g. 2014-02-01

## Postmark.getTrackedEmailcounts
Gets a total count of emails you’ve sent with open tracking or link tracking enabled.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| tag        | String     | Filter by tag.
| fromDate   | DatePicker | Filter stats starting from the date specified (inclusive). e.g. 2014-01-01
| toDate     | DatePicker | Filter stats up to the date specified (inclusive). e.g. 2014-02-01

## Postmark.getEmailOpenCounts
Gets total counts of recipients who opened your emails. This is only recorded when open tracking is enabled for that email.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| tag        | String     | Filter by tag.
| fromDate   | DatePicker | Filter stats starting from the date specified (inclusive). e.g. 2014-01-01
| toDate     | DatePicker | Filter stats up to the date specified (inclusive). e.g. 2014-02-01

## Postmark.getEmailPlatformUsage
Gets an overview of the platforms used to open your emails. This is only recorded when open tracking is enabled for that email.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| tag        | String     | Filter by tag.
| fromDate   | DatePicker | Filter stats starting from the date specified (inclusive). e.g. 2014-01-01
| toDate     | DatePicker | Filter stats up to the date specified (inclusive). e.g. 2014-02-01

## Postmark.getEmailClientUsage 
Gets an overview of the email clients used to open your emails. This is only recorded when open tracking is enabled for that email.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| tag        | String     | Filter by tag.
| fromDate   | DatePicker | Filter stats starting from the date specified (inclusive). e.g. 2014-01-01
| toDate     | DatePicker | Filter stats up to the date specified (inclusive). e.g. 2014-02-01

## Postmark.getEmailReadTimes
Gets the length of time that recipients read emails along with counts for each time. This is only recorded when open tracking is enabled for that email. Read time tracking stops at 20 seconds, so any read times above that will appear in the 20s+ field.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| tag        | String     | Filter by tag.
| fromDate   | DatePicker | Filter stats starting from the date specified (inclusive). e.g. 2014-01-01
| toDate     | DatePicker | Filter stats up to the date specified (inclusive). e.g. 2014-02-01

## Postmark.getClickCounts
Gets total counts of unique links that were clicked.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| tag        | String     | Filter by tag.
| fromDate   | DatePicker | Filter stats starting from the date specified (inclusive). e.g. 2014-01-01
| toDate     | DatePicker | Filter stats up to the date specified (inclusive). e.g. 2014-02-01

## Postmark.getBrowserPlatformUsage
Gets an overview of the browser platforms used to open your emails. This is only recorded when Link Tracking is enabled for that email.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| tag        | String     | Filter by tag.
| fromDate   | DatePicker | Filter stats starting from the date specified (inclusive). e.g. 2014-01-01
| toDate     | DatePicker | Filter stats up to the date specified (inclusive). e.g. 2014-02-01

## Postmark.getBrowserUsage
Gets an overview of the browsers used to open links in your emails. This is only recorded when Link Tracking is enabled for that email.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| tag        | String     | Filter by tag.
| fromDate   | DatePicker | Filter stats starting from the date specified (inclusive). e.g. 2014-01-01
| toDate     | DatePicker | Filter stats up to the date specified (inclusive). e.g. 2014-02-01

## Postmark.getClickLocation
Gets an overview of which part of the email links were clicked from (HTML or Text). This is only recorded when Link Tracking is enabled for that email.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| tag        | String     | Filter by tag.
| fromDate   | DatePicker | Filter stats starting from the date specified (inclusive). e.g. 2014-01-01
| toDate     | DatePicker | Filter stats up to the date specified (inclusive). e.g. 2014-02-01

## Postmark.createTriggerForTag
Tags triggers let you activate special behavior when you send messages with a certain tag.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| matchName  | String     | Name of the tag that will activate this trigger.
| trackOpens | String     | Indicates if this trigger activates open tracking.

## Postmark.getTrigger
Get a single trigger.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| triggerId  | String     | Id of the trigger.

## Postmark.updateTrigger
Edit a single trigger.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| matchName  | String     | Name of the tag that will activate this trigger.
| trackOpens | String     | Indicates if this trigger activates open tracking.
| triggerId  | String     | Id of the trigger.

## Postmark.deleteTrigger
Delete a single trigger.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| triggerId  | String     | Id of the trigger.

## Postmark.getTriggerByName
Search triggers.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| count      | Number     | Number of records to return per request.
| offset     | Number     | Number of records to skip.
| matchName  | String     | Filter by delivery tag.

## Postmark.createInboundRuleTrigger
Create an inbound rule trigger.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| rule       | String     | Email address (or domain) that you would like to block from sending.

## Postmark.deleteSingleTrigger
Delete a single trigger.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| triggerId  | String     | Id of the trigger.

## Postmark.getListInboundRuleTriggers
List inbound rule triggers.

| Field      | Type       | Description
|------------|------------|----------
| serverToken| credentials| This request requires server level privileges. This token can be found on the Credentials tab under your Postmark server.
| count      | String     | Number of records to return per request.
| offset     | String     | Number of records to skip.

