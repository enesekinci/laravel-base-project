# API Response Örnekleri

## Liste Endpoint (GET /api/products?include=variants,attributes)

```json
{
    "data": [
        {
            "id": 1,
            "name": "Basic T-Shirt",
            "slug": "basic-t-shirt-test",
            "price": 299.9,
            "in_stock": true,
            "is_active": true,
            "variants": [
                {
                    "id": 10,
                    "sku": "TSHIRT-BASIC-SIYAH-M",
                    "price": 319.9,
                    "in_stock": true,
                    "is_active": true,
                    "option_values": [
                        {
                            "id": 101,
                            "value": "Siyah",
                            "option": {
                                "id": 1,
                                "name": "Renk"
                            }
                        },
                        {
                            "id": 201,
                            "value": "M",
                            "option": {
                                "id": 2,
                                "name": "Beden"
                            }
                        }
                    ]
                }
            ],
            "attributes": [
                {
                    "code": "material",
                    "label": "Materyal",
                    "value": "Pamuk"
                },
                {
                    "code": "neck_type",
                    "label": "Yaka Tipi",
                    "value": "Bisiklet Yaka"
                }
            ]
        }
    ],
    "meta": {
        "current_page": 1,
        "last_page": 1,
        "per_page": 15,
        "total": 1
    }
}
```

## Detay Endpoint (GET /api/products/basic-t-shirt-test?include=variants,attributes)

```json
{
    "data": {
        "id": 1,
        "name": "Basic T-Shirt",
        "slug": "basic-t-shirt-test",
        "price": 299.9,
        "in_stock": true,
        "is_active": true,
        "variants": [
            {
                "id": 10,
                "sku": "TSHIRT-BASIC-SIYAH-M",
                "price": 319.9,
                "in_stock": true,
                "is_active": true,
                "option_values": [
                    {
                        "id": 101,
                        "value": "Siyah",
                        "option": {
                            "id": 1,
                            "name": "Renk"
                        }
                    },
                    {
                        "id": 201,
                        "value": "M",
                        "option": {
                            "id": 2,
                            "name": "Beden"
                        }
                    }
                ]
            }
        ],
        "attributes": [
            {
                "code": "material",
                "label": "Materyal",
                "value": "Pamuk"
            }
        ]
    }
}
```

## Next.js Kullanım Örnekleri

### SWR ile Liste Çekme

```typescript
import useSWR from "swr";

const fetcher = (url: string) => fetch(url).then((res) => res.json());

function useProducts(filters?: { color?: number; size?: number }) {
    const params = new URLSearchParams();

    if (filters?.color)
        params.append("filter[color]", filters.color.toString());
    if (filters?.size) params.append("filter[size]", filters.size.toString());

    params.append("include", "variants,attributes");

    const { data, error } = useSWR(
        `/api/products?${params.toString()}`,
        fetcher
    );

    return {
        products: data?.data ?? [],
        pagination: data?.meta,
        isLoading: !error && !data,
        isError: error,
    };
}
```

### React Query ile Detay Çekme

```typescript
import { useQuery } from "@tanstack/react-query";

function useProduct(slug: string, include?: string[]) {
    const params = new URLSearchParams();
    if (include?.length) {
        params.append("include", include.join(","));
    }

    return useQuery({
        queryKey: ["product", slug, include],
        queryFn: () =>
            fetch(`/api/products/${slug}?${params.toString()}`)
                .then((res) => res.json())
                .then((data) => data.data),
    });
}
```
