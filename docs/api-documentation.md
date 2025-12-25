# API Documentation

Bu doküman, projenin API yapısını ve kullanımını açıklar.

## Genel Bakış

Proje RESTful API yapısına sahiptir ve API versioning kullanır. Tüm API endpoint'leri `/api/v1/` prefix'i ile başlar.

## API Versioning

API versioning `ApiVersion` middleware ile yapılır:

- `/api/v1/*` - Version 1 API routes
- Gelecekte `/api/v2/*` - Version 2 API routes

Version, route tanımında belirtilir:

```php
Route::prefix('api/v1/blog')->middleware(['api', 'api.version:v1'])->group(function () {
    Route::get('/posts', [PostController::class, 'index']);
});
```

## Authentication

API authentication için Laravel Sanctum kullanılır.

### Token Oluşturma

```bash
POST /api/v1/auth/login
Content-Type: application/json

{
    "email": "user@example.com",
    "password": "password"
}
```

Response:

```json
{
    "data": {
        "user": {
            "id": 1,
            "name": "John Doe",
            "email": "user@example.com"
        },
        "token": "1|xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx"
    }
}
```

### Token Kullanımı

Tüm protected endpoint'lere `Authorization` header'ı ile token gönderilmelidir:

```bash
Authorization: Bearer 1|xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
```

### Token İptal Etme

```bash
POST /api/v1/auth/logout
Authorization: Bearer {token}
```

## Response Format

### Başarılı Response

```json
{
    "data": {
        "id": 1,
        "name": "Example",
        "created_at": "2025-01-01T00:00:00.000000Z"
    }
}
```

### Hata Response

```json
{
    "message": "Validation failed",
    "errors": {
        "email": ["The email field is required."],
        "password": ["The password field is required."]
    }
}
```

### Pagination Response

```json
{
    "data": [
        {
            "id": 1,
            "name": "Example 1"
        },
        {
            "id": 2,
            "name": "Example 2"
        }
    ],
    "meta": {
        "current_page": 1,
        "last_page": 10,
        "per_page": 15,
        "total": 150
    },
    "links": {
        "first": "http://localhost/api/v1/posts?page=1",
        "last": "http://localhost/api/v1/posts?page=10",
        "prev": null,
        "next": "http://localhost/api/v1/posts?page=2"
    }
}
```

## API Resources

Tüm API response'ları Laravel API Resources kullanılarak formatlanır.

### Örnek: PostResource

```php
<?php

namespace App\Resources\Blog;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
```

### Resource Collection

```php
use App\Resources\Blog\PostResource;

return PostResource::collection($posts);
```

## Endpoint'ler

### Auth Endpoints

#### Login

```bash
POST /api/v1/auth/login
```

#### Register

```bash
POST /api/v1/auth/register
```

#### Logout

```bash
POST /api/v1/auth/logout
Authorization: Bearer {token}
```

#### Me

```bash
GET /api/v1/auth/me
Authorization: Bearer {token}
```

### Blog Endpoints

#### Posts List

```bash
GET /api/v1/blog/posts
```

Query Parameters:
- `page` - Sayfa numarası
- `per_page` - Sayfa başına kayıt sayısı
- `search` - Arama terimi

#### Post Detail

```bash
GET /api/v1/blog/posts/{id}
```

#### Create Post

```bash
POST /api/v1/blog/posts
Authorization: Bearer {token}
Content-Type: application/json

{
    "title": "Post Title",
    "content": "Post Content"
}
```

#### Update Post

```bash
PUT /api/v1/blog/posts/{id}
Authorization: Bearer {token}
Content-Type: application/json

{
    "title": "Updated Title",
    "content": "Updated Content"
}
```

#### Delete Post

```bash
DELETE /api/v1/blog/posts/{id}
Authorization: Bearer {token}
```

## Error Handling

### Validation Errors

HTTP Status: `422 Unprocessable Entity`

```json
{
    "message": "The given data was invalid.",
    "errors": {
        "email": ["The email field is required."],
        "password": ["The password must be at least 8 characters."]
    }
}
```

### Authentication Errors

HTTP Status: `401 Unauthorized`

```json
{
    "message": "Unauthenticated."
}
```

### Authorization Errors

HTTP Status: `403 Forbidden`

```json
{
    "message": "This action is unauthorized."
}
```

### Not Found Errors

HTTP Status: `404 Not Found`

```json
{
    "message": "Resource not found."
}
```

## Rate Limiting

API endpoint'leri rate limiting ile korunur. Varsayılan limit: 60 request/dakika.

Rate limit bilgisi response header'larında döner:

```
X-RateLimit-Limit: 60
X-RateLimit-Remaining: 59
X-RateLimit-Reset: 1640995200
```

Rate limit aşıldığında:

HTTP Status: `429 Too Many Requests`

```json
{
    "message": "Too many requests. Please try again later."
}
```

## Filtering & Sorting

### Filtering

Query parameter'lar ile filtreleme yapılabilir:

```bash
GET /api/v1/blog/posts?status=published&category_id=1
```

### Sorting

`sort` parameter'ı ile sıralama yapılabilir:

```bash
GET /api/v1/blog/posts?sort=-created_at  # Descending
GET /api/v1/blog/posts?sort=created_at    # Ascending
```

## Swagger/OpenAPI

API dokümantasyonu Swagger/OpenAPI ile sağlanır. L5-Swagger paketi kullanılır.

### Swagger UI

```
http://localhost/api/documentation
```

### OpenAPI JSON

```
http://localhost/api/documentation.json
```

## Best Practices

1. **Her zaman API Resources kullan**: Raw model döndürme
2. **FormRequest kullan**: Validation logic'i FormRequest'lerde
3. **Pagination kullan**: Büyük listeler için mutlaka pagination
4. **Error handling**: Tüm hataları standart formatta döndür
5. **Rate limiting**: Tüm endpoint'lerde rate limiting aktif
6. **Authentication**: Protected endpoint'lerde mutlaka authentication kontrolü

## Örnek Kullanım

### cURL

```bash
# Login
curl -X POST http://localhost/api/v1/auth/login \
  -H "Content-Type: application/json" \
  -d '{"email":"user@example.com","password":"password"}'

# Get Posts
curl -X GET http://localhost/api/v1/blog/posts \
  -H "Authorization: Bearer {token}"

# Create Post
curl -X POST http://localhost/api/v1/blog/posts \
  -H "Authorization: Bearer {token}" \
  -H "Content-Type: application/json" \
  -d '{"title":"New Post","content":"Post Content"}'
```

### JavaScript (Fetch)

```javascript
// Login
const response = await fetch('http://localhost/api/v1/auth/login', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
    },
    body: JSON.stringify({
        email: 'user@example.com',
        password: 'password'
    })
});

const data = await response.json();
const token = data.data.token;

// Get Posts
const postsResponse = await fetch('http://localhost/api/v1/blog/posts', {
    headers: {
        'Authorization': `Bearer ${token}`
    }
});

const posts = await postsResponse.json();
```

## Sonraki Adımlar

1. [Development Setup](development-setup.md) - Local development
2. [Module Management](module-management.md) - Modül yönetimi
3. [Deployment Guide](deployment-guide.md) - Production deployment

