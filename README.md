## 📘 API Documentation

### 🔹 Endpoint: Admin login

```http
POST /admin.login
...
    body:
        "email": "admin@admin.com",
        "password": "password"
```
    {
    "message": "Admin Login",
        "admin": {
            "email": "admin@admin.com",
            "password": "password"
        }
    }

### 🔹 Endpoint: Admin logout

```http
GET /admin.logout
```
    {
        "message": "Admin Logout Successful"
    }

### 🔹 Endpoint: User register

```http
POST /user.register
...
    body:
        "name": "user1",
        "email": "user12@user.com",
        "password": "password"
```
    "user": {
        "name": "user1",
        "email": "user12@user.com",
        "updated_at": "2025-06-12T12:29:00.000000Z",
        "created_at": "2025-06-12T12:29:00.000000Z",
        "id": 6
    }

### 🔹 Endpoint: User login

```http
POST /user.login
...
    body:
        "email": "user12@user.com",
        "password": "password"
```
    {
    "message": "User Login Success",
        "user": {
            "name": "user1",
            "email": "user12@user.com",
            "updated_at": "2025-06-12T12:29:00.000000Z",
            "created_at": "2025-06-12T12:29:00.000000Z",
            "id": 6
        }
    }

### 🔹 Endpoint: User logout

```http
GET /user.logout
```
    {
        "message": "User Logout Successful"
    }   


### 🔹 Endpoint: Rooms

```http
GET /rooms
```
    {
        "id": 1,
        "name": "Room 1",
        "room-number": 101,
        "description": "This is room number 1. It is very comfortable and well-furnished.",
        "image": "room1.jpg",
        "created_at": "2025-06-12T11:07:30.000000Z",
        "updated_at": "2025-06-12T11:07:30.000000Z"
    },
    {
        "id": 2,
        "name": "Room 2",
        "room-number": 102,
        "description": "This is room number 2. It is very comfortable and well-furnished.",
        "image": "room2.jpg",
        "created_at": "2025-06-12T11:07:30.000000Z",
        "updated_at": "2025-06-12T11:07:30.000000Z"
    },
    {
        "id": 3,
        "name": "Room 3",
        "room-number": 103,
        "description": "This is room number 3. It is very comfortable and well-furnished.",
        "image": "room3.jpg",
        "created_at": "2025-06-12T11:07:30.000000Z",
        "updated_at": "2025-06-12T11:07:30.000000Z"
    },

### 🔹 Endpoint: Rooms

```http
POST /rooms
...
    body:
        "name": "Room B1",
        "description": "example descrpiton",
        "room-number": "102",
        "image": "images/BcYzCtDB5adEEZxKicCNOUAtYAwSrQtN5gY9efVH.webp",
```
    {
    "name": "Room B1",
    "description": "example descrpiton",
    "room-number": "102",
    "image": "images/BcYzCtDB5adEEZxKicCNOUAtYAwSrQtN5gY9efVH.webp",
    "updated_at": "2025-06-12T12:34:35.000000Z",
    "created_at": "2025-06-12T12:34:35.000000Z",
    "id": 11
    }

### 🔹 Endpoint: Rooms

```http
GET /rooms/{id}
```
    {
    "name": "Room B1",
    "description": "example descrpiton",
    "room-number": "102",
    "image": "images/BcYzCtDB5adEEZxKicCNOUAtYAwSrQtN5gY9efVH.webp",
    "updated_at": "2025-06-12T12:34:35.000000Z",
    "created_at": "2025-06-12T12:34:35.000000Z",
    "id": 11
    }

### 🔹 Endpoint: Rooms

```http
PUT /rooms/{id}
...
    body:
        "name": "Room B1",
        "description": "example descrpiton",
        "room-number": "102",
        "image": "images/BcYzCtDB5adEEZxKicCNOUAtYAwSrQtN5gY9efVH.webp",
```
    {
    "name": "Room B1",
    "description": "example descrpiton",
    "room-number": "102",
    "image": "images/BcYzCtDB5adEEZxKicCNOUAtYAwSrQtN5gY9efVH.webp",
    "updated_at": "2025-06-12T12:34:35.000000Z",
    "created_at": "2025-06-12T12:34:35.000000Z",
    "id": 11
    }

### 🔹 Endpoint: Rooms

```http
DELETE /rooms/{id}
```
    {
        "message": "Room deleted successfully"
    }   


### 🔹 Endpoint: Orders

```http
GET /orders
```
    [
    {
        "id": 1,
        "start_day": "2025-06-18",
        "end_day": "2025-06-21",
        "user_id": 4,
        "room_id": 1,
        "created_at": "2025-06-12T13:15:26.000000Z",
        "updated_at": "2025-06-12T13:15:26.000000Z",
        "user": {
            "id": 4,
            "name": "User 4",
            "email": "user4@example.com",
            "email_verified_at": null,
            "created_at": "2025-06-12T11:07:30.000000Z",
            "updated_at": "2025-06-12T11:07:30.000000Z"
        },
        "room": {
            "id": 1,
            "name": "Room 1",
            "room_number": 101,
            "description": "This is room number 1. It is very comfortable and well-furnished.",
            "image": "room1.jpg",
            "created_at": "2025-06-12T11:07:30.000000Z",
            "updated_at": "2025-06-12T11:07:30.000000Z"
        }
    }
]

### 🔹 Endpoint: Order

```http
POST /order.store
...
    body:
        "start_day": "2025-06-18",
        "end_day": "2025-06-21",
        "user_id": 4,
        "room_id": 1
```
    {
    "success": "Room booked successfully for the first time",
    "orders": [
    {
    "id": 1,
    "start_day": "2025-06-18",
    "end_day": "2025-06-21",
    "user_id": 4,
    "room_id": 1,
    "created_at": "2025-06-12T13:15:26.000000Z",
    "updated_at": "2025-06-12T13:15:26.000000Z",
    "user": {
        "id": 4,
        "name": "User 4",
        "email": "user4@example.com",
        "email_verified_at": null,
        "created_at": "2025-06-12T11:07:30.000000Z",
        "updated_at": "2025-06-12T11:07:30.000000Z"
            },
        "room": {
            "id": 1,
            "name": "Room 1",
            "room_number": 101,
            "description": "This is room number 1. It is very comfortable and well-furnished.",
            "image": "room1.jpg",
            "created_at": "2025-06-12T11:07:30.000000Z",
            "updated_at": "2025-06-12T11:07:30.000000Z"
            }
        }
    ]
    }
