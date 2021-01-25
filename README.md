# projetLP-resto-server

## Urls
BaseURL : "localhost:8060/resto"

path : (BaseURL + endpoint)

## Endpoint : 

* Dish  => "/dish"
  * by name : "/name/(String)"
  * by Id : "/id/(ID)"
  * all dishes : "/all"

* Client => "/client"
  * by email : "/email/(email)"
  * by Id : "/id/(Id)"
  * all users : "/all"

* Order => "/order"
  * by user id: "/user/(userId)"
  * by Id : "/id/(Id)"
  * last : "/(userId)"

* Order_line => "/orderline"
  * by userId : "/user/(userId)"
  * by orderId : "/id/(ID)"
  * both : "/(ueserId)/(orderId)"
