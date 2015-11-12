# Integrate your application with the AnchorID API

## Contents

- [Overview](#overview)
- [Back and Front-end integration mode](#back-and-Front-end-integration-mode)
- [Access Token Acquisition](#access-token-acquisition)
- [Request 1 – Authorization Code](#request-1---authorization-code)
- [Request 2 – Access Token](#request-2---access-token)
- [Sign In Initiation](#sign-in-initiation)
- [Sign In Status Check](#sign-in-status-check)
- [Sign In Cancellation](#sign-in-cancellation)
- [Back-end Only integration mode](#back-end-only-integration-mode)
- [Redirect URI](#redirect-uri)Sign In Initiation



### Overview

AnchorID offers two options to integrate your application and allow your users authenticating and signing into your website or app using their Anchor ID.

The Back and Front-end integration mode is more transparent for your users but it requires you to implement the interaction between them and your app interface.

The [Back-end Only integration mode](#back-end-only-integration-mode) is easier because the interaction with the users is managed by the AnchorID website but is less transparent for them because they are redirected to a different site when signing into your app.

In both options all the requests to the AnchorID API must be done from your server-side application since you will have to submit your Application Secret, which should be kept private.


### Back and Front-end integration mode

With this method the client app has to request the AnchorID to the user and initiate the authentication transaction by calling the AnchorID API.
Then keep querying the transaction status until it changes and if the new status is **AUTHORIZED** then authenticate the user.

In order to create and query the transaction on behalf of the user, the client app needs a valid *Access Token*.

This Access Token is issued by the AnchorID OAuth2 server, but instead of being granted by the user when signing into the client app, the access has to be previously granted by the user through the AnchorID app.

The following sequence diagram shows the flow and API calls required to sign in the user using this method assuming the user has previously granted access to the client app and the sign in is authorized by the user.

### Access Token Acquisition

Client App access is previously granted by the user so there’s no user action required at the moment of getting an Access Token.
The following two requests are needed in order to get the Token.

### Request 1 – Authorization Code


**Endpoint:**  https://oauth.anchorid.com/oauth2
HTTP Request

**Method:** POST

**Parameters:**
Name | Value
-----|--------
client_id | ID associated to the Client App
anchorid |AnchorID submitted by the user
response_type | code
state | null


HTTP Response Body:

```javascript
{
    "status": 0,
    "description": {
        "code": "0f02513b-1803-40ef-9154-e2bec35fa0ff"
    }
}
```

### Request 2 – Access Token

**Endpoint:** https://oauth.anchorid.com/oauth2
**Method:** POST
**Authentication:** HTTP Basic Authentication using your client_id and client_secret as the username and password.

**Parameters:**
Name | Value | code
-------|-----|-----
Authorization |Code returned in previous request grant_type | authorization_code

**HTTP Response:**

```javascript
Body:
{
    "access_token": "74f64e985a755654d2434449c2524ce0a704298e",
    "token_type": "Bearer",
    "status": 0
}
```


### Sign In Initiation

When the user submits to AnchorID, the following sign in transaction must be created in order to have AnchorID send an authorization request to user’s mobile phone.

**Endpoint:** https://api.anchorid.com/signin

**Method:** POST

**Authentication:** Passing your Access Token in the HTTP Authorization Header as follow:

`Authorization: Bearer {AccessToken}`

**Headers:**

Name | Value
----------|--------
Content-Type | application/json
Content-Length | Your request size

**Parameters:**

Name | Value
--------|-------
client_id | ID associated to the Client App
anchorid | AnchorID submitted by the user

**HTTP Response Body:**

```javascript
{
    "status": "0",
    "description": {
        "transaction": {
            "transactionId": "f7077141-4c8d-4f7f-ac8e-3957139c8ff2",
            "status": "PROCESS",
            "consumerId": 204,
            "clientAppId": 11,
            "securityCode": 2164,
            "timedOutSeconds": null,
            "id": "101",
            "created": "2014-10-20 18:51:26",
            "updated": null,
            "timestamp": 1413831086
        }
    }
}
```
After getting this response, you will have to take the securityCode, show it to the user and ask him or her to authorize the sign in transaction in its mobile phone only if the same Security Code is displayed to him or her there. Then use the transactionId parameter to keep querying its status to know if the user authorized the sign in from its mobile phone.


### Sign In Status Check

The sign in transaction can be authorized, rejected, timed-out, etc., so you have to query the status and verify the AnchorID associated to the sign in. 


**Endpoint:** https://api.anchorid.com/transaction

**Method:** GET

**Authentication:** Passing your Access Token in the HTTP Authorization Header as follow:

`Authorization: Bearer {AccessToken}`

**Parameters:**

Name | Value
--------|-------
id | Transaction ID returned in previous request

**HTTP Response:**

```javascript
Body:
{
    "status": "0",
    "description": {
        "transaction": {
            "transactionId": "f7077141-4c8d-4f7f-ac8e-3957139c8ff2",
            "status": "PROCESS",
            "consumerId": 204,
            "clientAppId": 11,
            "securityCode": "2164",
            "timedOutSeconds": "",
            "id": 101,
            "created": "2014-10-20 18:51:26",
            "updated": "0000-00-00 00:00:00",
            "timestamp": 1413831086
        },
        "client_app": {
            "name": "Bank Demo",
            "ip": "192.168.10.4",
            "applicationId": "YourAppClientID",
            "applicationSecret": null,
            "redirectUrl": "http://bank.anchorid.com",
            "clientId": 1,
            "active": 1,
            "dns": "mydns",
            "id": 11,
            "created": "0000-00-00 00:00:00",
            "updated": "2014-10-10 18:50:23",
            "timestamp": 1412967023
        },
        "workflow": [
            "Yes_No",
            "Pin",
            "Voice"
        ]
    }
}
```

When the transaction status is **PROCESS**, it means that the sign in is "in process", it was not authorized or rejected yet.
You have to continue requesting the transaction status until it changes.

If it changes to **AUTHORIZED**, then you have to authenticate your internal user associated with the AnchorID consumerid returned, either way you have to show an Unsuccessful Sign In message to your user.


> Do not associate your internal users with the AnchorID since it can change in the future.


### Sign In Cancellation

When you are displaying the Security Code to your user and asking him or her to authorize the transaction, you can give him or her the option to cancel the sign in process. In that case you can make the following call to the AnchorID API to cancel the transaction.

**Endpoint:** https://api.anchorid.com/transaction

**Method:** PUT

**Authentication:**  Passing your Access Token in the HTTP Authorization Header as follow:

`Authorization: Bearer {AccessToken}`

**Headers**

Name | Value
-------|--------
Content-Type | application/json
Content-Length | Your request size

**GET Parameters:**

Name | Value
-------|--------
id | Transaction ID returned in previous request

**Body:**

```javascript
{
    "status": "DECLINED",
}
HTTP Response
Body:
{
    "status": "0",
    "description": {
        "transaction": {
            "transactionId": "ec78f2a3-dc02-46e5-97bf-9bf7f63a8cbe",
            "status": "DECLINED",
            "consumerId": 20509,
            "clientAppId": 16,
            "securityCode": "9996",
            "timedOutSeconds": "",
            "id": 1285,
            "created": "2014-10-27 14:10:23",
            "updated": "2014-10-27 14:10:29",
            "timestamp": 1414433429
        }
    }
}
```


### Back-end Only integration mode

With this method you have to give the option to your users to sign in using AnchorID, and when this option is chosen they will be redirected to the AnchorID website which will ask for their AnchorID and initiate the sign in transaction.

When the user authorizes the sign in from his or her mobile phone, the AnchorID website will redirect the user to your client app included the Transaction ID and the AnchorID.

You will have to check the transaction information against the AnchorID API, and if the status is **AUTHORIZED** you must authenticate the user within your app.

In order to query the transaction on behalf of the user, the client app needs a valid Access Token. This Access Token is issued by the AnchorID OAuth2 server, but instead of being granted by the user when signing into the client app, the access has to be previously granted by the user through the AnchorID app.

The following sequence diagram shows the flow and API calls required to sign in the user using this method assuming the user has previously granted access to the client app and the sign in is authorized by the user.


### Redirect URI

In order to use this method your app needs a Redirect URI defined in your app configuration within the AnchorID Developer Portal.

AnchorID will add the following parameters to the Redirect URI query:

Name | Value
--------|--------
transaction_id | Sign in Transaction ID needed to query the status and AnchorID 
anchor_id | AnchorID from your user needed to acquire the Access Token
