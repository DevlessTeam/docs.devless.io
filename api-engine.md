
**Devless API Engine(DAE)** is an open source api engine that generates a crud access to databases as well as executes PHP scripts. 

The current implementation of the devless api engine is in PHP and on top of the Laravel framework. 

**DAE** can be used as a standalone (accessed solely via API calls ) however a management console is provided to interact with the api engine and is available @ the complete [devless suite](https://github.com/DevlessTeam/DV-PHP-CORE).

This document explains the various syntax for accessing and working with  the API engine.

### What is the devless API engine ?
The devless API engine is  a Laravel based application that generates restful endpoints by connecting to a data access point  (database). It also has the ability to  execute PHP scripts within a sandbox .

**Installation procedure**

Check out the installation docs 
#### [README](https://github.com/DevlessTeam/DV-PHP-CORE/blob/master/readme.md)

### Features of the API engine include :

**Database access**
* Create  database tables 

* Add data to tables 

 * Query tables 

 * Updates data in  tables 

 * Truncate , delete and drop  tables 

**Scripts**
* Run scripts within sandbox 

**Views**
* Access to html\php views 

As you would have noticed from above the Devless API Engine(DAE) works with three main entities tables, scripts and  "lean views"  each known as a **RESOURCE** . 

You can also pair up resources known as **SERVICES**  and this can be responsible for one functionality of the **APPLICATION**. 

In response to this order of organisation the restful endpoints are generates in the form:
``` <hostname>\service\<service_name>\<resource_name>\ ```

 
eg: ``` https:\\demo.devless.io\service\authentication\db?table=authentication``` *(this example gets all data from the authentication table)*

**Endpoints definition for specific resources and actions** 

For the rest of the documentation, we will assume to create a user authentication service.

**Structure of the Authentication Service** 

* Table name is authentication 

**Fields required include** 
* username (string) 
* password (hashed string) 

Also, we assume our server is on  http://localhost:8000/   .

**NB:** To get started you need to register a new service in the database either via the management console or from a database management client. In our case its assumed we have done that and the name of the service is authentication.

**Creating the table** 
```
METHOD: POST 

URL_STRUCTURE: http://localhost:8000/api/v1/service/authentication/schema

HEADERS: Content-Type application/json

REQUEST PAYLOAD:

{  
     "resource":[  
        {  
           "name":"authentication",
           "description":" demo authenticate users",
           "field":[  

              {  
                 "name":"username",
                 "field_type":"text",
                 "default":null,
                 "required":true,
                 "is_unique":true,
                 "ref_table":"",
                  "validation":true
              },
              {  
                 "name":"password",
                 "field_type":"password", 
                 "default":null,
                 "required":true,
                 "is_unique":false,
                 "ref_table":"",
                  "validation":true
              }
           ]
        }
     ]
  }        


RESPONSE PAYLOAD: {"status_code":606,"message":"created table successfully","payload":[]}
```    

**Explanation** : From the URL after the ``api/v1/service`` route the service_name ``authentication`` is passed followed by the ``schema`` sub route which is the  route for creating new tables for any service. 

Also, the request payload takes the name of the table to be created and is prefixed with the service name during the creation of the table itself to ensure tables from other services do not conflict.
You may also add a table description but this is optional 

For the ``field`` , there are a couple of options you have to provide with some being optional and others required.

``"name"`` this is the name to be given to the field and this is required.

``"field_type"`` this is a soft data type and is required as well. The options available are shown below on the left and the translated database type on the right

    'text'      => 'string',
    'textarea'   => 'longText',
    'integer'    => 'integer',
    'money'      => 'double',
    'password'   => 'string',
    'percentage' => 'integer',
    'url'        => 'string',
    'timestamp'  => 'timestamp',
    'boolean'    => 'boolean',
    'email'      => 'string',
    'reference'  => 'integer',  

**NB:** The password ``"field_type"``  hashes any data provided in the name field automatically.

* ``"default"``  you could also setup a default value for the field 

* ``"required"`` you can make this field a required field 

* ``"is_unique"`` states whether this field should be unique or not 

* ``"ref_table"`` also in the case where the ``field_type`` you chose was a ``reference`` type you would have to  select the table you would like to reference . The engine automatically creates the relationship between the  field and primary key of the table being referenced.

* ``"validation"`` if this is set to true all  data input into this field would be run against a validator based on the ``field_type`` selected


The ``Response Body`` provides three pieces of information the ``status__code`` in this case ``606``, a ``message`` and ``payload`` which might contain extra   information or return data . You may find the complete list status code in the **[appendix](#appendix)** 

Next step would be adding some data to the table

**Adding data to  table** 
```
METHOD: POST 

URL_STRUCTURE: http://localhost:8000/api/v1/service/authentication/db/

HEADERS: Content-Type application/json

REQUEST PAYLOAD:

{  
   "resource":[  
      {  
         "name":"authentication",
         "field":[  

            {  
               "username":"Edmond",
               "password":"password"
            }
         ]
      }

    ]
}

RESPONSE PAYLOAD: {"status_code":609,"message":"data has been added to table successfully","payload":[]}
```


We will repeat the above by replacing the name `` Edmond`` with ``Charles`` and keeping the password same. So now we have two records in the authentication table.

Now we can query our table 



**Query data from  table** 
```
METHOD: GET 

URL_STRUCTURE: http://localhost:8000/api/v1/service/authentication/db?table=authentication&order=username&where=username,edmond&size=2

HEADERS:

REQUEST PAYLOAD: passed as part of the URL 

RESPONSE PAYLOAD: 
{
  "status_code": 625,
  "message": "Got response successfully",
  "payload": {
    "0": {
      "id": 1,
      "username": "Edmond",
      "password": "$2y$10$NO2Lpw5hYxoAtQ7EM.D4peWAhAWMjrDKgA4/0.bjJHnVuh1UPT0XS"
    },
    "related": []
  }
}
```
Now we query the authentication table using the get parameters provided by the engine.
 * The ``table`` parameter is used to provide the table name 
* The ``order`` parameter makes it possible to arrange the data in descending order based on the field provided 
* The ``where`` parameter is used to get data where the field provided before the comma contains the data passed
* The ``size`` parameter is used to set the total number of records to be returned.
* The ``offset`` parameter sets an offset on the record.


Next, we change the username from Edmond to James 



**Updating  data to  table** 
```
METHOD: PATCH

URL_STRUCTURE: http://localhost:8000/api/v1/service/authentication/db

HEADERS: Content-Type application/json

REQUEST PAYLOAD:
{  
   "resource":[  
      {  
         "name":"authentication",
         "params":[  
            {  
               "where":"id,1",
               "data":[
                   {"username": "james"}
               ]

            }
         ]
      }

    ]
}        



RESPONSE PAYLOAD: {"status_code":619,"message":"table authentication updated successfully","payload":[]}
```

In other to update a field in the table you need to pass the ``table name`` and the ``parameters``. All you need to pass  is the field name and new data as well as the ``id`` of that field as shown above. 


Now that we have made changes to our table content we can now try to delete a field ,truncate the table then delete the whole table. 



**Delete  data from  table** 

```
METHOD: DELETE

URL_STRUCTURE: http://localhost:8000/api/v1/service/authentication/db

HEADERS: Content-Type application/json

REQUEST PAYLOAD:
{  
   "resource":[  
      {  
         "name":"authentication",
         "params":[  
            {  
               "delete":"true",         
               "where":"id,=,2"

            }
         ]
      }

    ]
}        

RESPONSE PAYLOAD: {"status_code":613,"message":"The table or field has been delete","payload":[]}
```

This is very trivial and understandable as by now you would have noticed the pattern :)

* To truncate the table you set the ``truncate`` parameter to ``true`` "truncate":true  this returns a response as ```{"status_code":613,"message":"The table or field has been truncate","payload":[]}```

* You may also drop the table by passing ``true`` to the ``drop`` parameter this also returns a response as ``{"status_code":613,"message":"dropped table successfully","payload":[]}``



We have gone through a basic CRUD operation using the api engine. The next thing we are going to look at is the script . 

Again whenever you create a service with the management console a scripting column is added. That's where your script lives. In case you want the complete api engine with the management console download it from [Devless complete ](#devlesscomplete). Another way you can add a script is doing so with a database client 
 
**Accessing scripts**
```
METHOD: GET, DELETE, POST, PATCH

URL_STRUCTURE: http://localhost:8000/api/v1/service/authentication/script

HEADERS: define suitable content-type

REQUEST PAYLOAD:
{  
   "resource":[  
      {  
    well format json goes here
      }

    ]
}        


RESPONSE PAYLOAD:  will return whatever is retuned by the script
```
In our example we will assume we have ``echo " hello world! "`` in the script column , by hitting the above URL we should see ``"hello world"`` outputted.

All Request payload  can be accessed via ``$payload``  this is an array of all the request parameters including the method type ``($payload['method'])``, also the parameters passed ``($payload['params'])`` as well as a a copy of the script currently being run ``($payload['script'])``

Also within your script, devless provides a service method  with which you can
Simulate a call to any ``service``.

Eg: Simulating a get call to the authentication service 

``language: PHP``

```
$json ='
{  
   "resource":{
        
         "table":["authenticate"],
    "order":["username"],
    "where":["username,edmond"]
              }

  
}        
  '; 


$output = DvService($json, 'auth', 'db', 'GET');

die($output);

```

One other thing available within a script is all of the devless methods found in the [devless core api docs ](#coreapi) as well as the ones from the underlying framework, in this case, Laravel.



One last resource we need to look at is the ``Lean View``.

This provides a way to prepare a simple management console for each service .

For instance in the case of the authentication service we created above , we might want to throw in a simple dashboard to display how many users we have and how many of them are active.

**NB: This project is still in its infancy and the doc is likely to be updated frequently**









