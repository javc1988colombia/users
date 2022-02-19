---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general


<!-- START_6a107a131f853e92450ac742beba0e7f -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/categories"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "id": 1,
        "description": "Cliente",
        "created_at": "2022-02-19T11:54:09.000000Z",
        "updated_at": "2022-02-19T11:54:09.000000Z"
    },
    {
        "id": 2,
        "description": "Proveedor",
        "created_at": "2022-02-19T11:54:09.000000Z",
        "updated_at": "2022-02-19T11:54:09.000000Z"
    },
    {
        "id": 3,
        "description": "Funcionario Interno",
        "created_at": "2022-02-19T11:54:09.000000Z",
        "updated_at": "2022-02-19T11:54:09.000000Z"
    }
]
```

### HTTP Request
`GET categories`


<!-- END_6a107a131f853e92450ac742beba0e7f -->


