# DV-JS-SDK
The Devless JS SDK provides a host of functions for working with data from the Devless backend.

##### Getting Started
There are a couple of ways to introduce the  sdk into your application 
1. Using the [CDN](http://library.devless.io/cdn/dv-beta-1/dv_sdk.js)  
2. Downloading from the [Github Repo](https://github.com/DevlessTeam/DV-JS-SDK/edit/master/README.md)

Once you have the SDK in your application you may now heard over to your Devless instance , then the App Tab , from there you can click on connect to my App and copy the connection details under the web tab . It should look something like below
```
var constants = { "token":"955c8a0dc37b4a22b5950a9e0e9491d0", "key":"TEMPORAL-KEY", "domain":"http://localhost:9000" }; 
Devless.init(constants);
```
 You can follow up on connection status from the console tab of your browser developer tool.

##### JS SDK functionalities:
* Authentication
* Working with data
* Executing scripts 

## Using auth

**SignUp:**

To signUp a user you may pass the following object to ```Devless.signUp()`` function 

 ```
 data = {
      firstname:"",
      lastname:"",
      email:"",
      phonenumber:"",
      username:"",
      password:"",
     }
Devless.signup(data, function(data){console.log(data)})

```

**logIn:**

You may perform login using  ``Devless.logIn()`` function 

```
Devless.logIn(indentifier_type, identifier, password, function(data){console.log(data)})
```
where **identifier_type** maybe an  **email** or **phone_number** 
and the **identifier** being  the respective value eg:
```
Devless.logIn("email", "will@gmail.com", "willsPassword", function(data){console.log(data)})
```

**getProfile:**

Once a user is logged in you may get the user details using the ``Devless.getProfile()`` function. 

```
Devless.getProfile(function(data){console.log(data)})
```

**updateProfile:**

You may update the user profile using ``Devless.updateData()`` and request payload below 

```
profile = {
      firstname:"",
      lastname:"",
      email:"",
      phonenumber:"",
      username:"",
      password:"",
};
     
Devless.updateProfile(profile, function(data){console.log(data)})

```
### NB: the session token is updated once the profile updates.

**queryData:**

Access or query data from any table from the backend using this function. This params can be used to manipulate the 
data fetch. 

```
params={
    size:2,
    order:"content",
    where:"id,2",
    offset:2
}

Devless.queryData: function(serviceName, table, callback, params ){}

 Eg: Devless.queryData: function(serviceName, table, function(data){
 console.log(data)}, params ){}
```

* To query data from the Devless backend you need  to specify the service name, table from which to query  and then a callback function.
* Also you may pass query parameters. for example determine the number of results sent back with the ``size`` parameter,
``order`` param to order the results in descending order based  a a particular field eg ``params= {order:"content"}``.
* The ``where`` parameter gets data where the key id is equal to 2 ``params= {where:"id,2"}``.

**addData:**

You may add data to a service table using ``Devless.addData(serviceName, tableName, function(result){console.log(result)}, data)``
where data is a JSON object.
eg:

```
data = {
  "title":"the fox",
  "content": "all about the fox"
}
Devless.addData("blog", "blogTable", function(d){console.log(d)}, data)
```
**updateData:**

You may update data to a service table using ``Devless.updateData(serviceName, tableName, identifier_type, identifier, callback, data)``
where data is a JSON object.
eg:

```
data = {
  "title":"the bear",
  "content": "all about the bear"
}
Devless.updateData("blog", "blogTable", "id", "1", callback, data)
```
The functions parameters are pretty obvious the identifier_type refers to the field used to select the field to update and the next param is the id value 

**delete:**

You may delete data  using ``Devless.delete(serviceName, table, where_key, where_value, callback)``

eg:

```
Devless.delete("blog", "blogTable", "id", 1, function(d){console.log(d)})
```

**runScript:**

You may execute scripts from the server using ``Devless.runScript(serviceName, method, data, callback)``.

All you need in other to execute a Devless backend script is the serviceName, a method either **(GET or POST or PATCH or DELETE)**
and pass the data needed by the script.

eg:

```
data = {
  "author":"edmond"
}

Devless.runScript("blog", "POST", data function(d){console.log(d)})
```
**token:**

You can have access to the current token with ``Devless.token(callback)``

**response structure**
* All response from the Devless backend have status_code with 700 meaning internal failure
* A message with verbose response to the event 
* An array payload containing returned results and properties 
* The Auth Service returns a status code of 1000 on success and 1001 on failure all other errors is returned as 700

