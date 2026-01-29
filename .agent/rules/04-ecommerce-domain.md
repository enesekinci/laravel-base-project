---
alwaysApply: true
---

# DOMAIN RULES

- migrations always use unsignedBigInteger for fks.
- Foreign key'ler için index'ler ekle.
- Timestamps kullan (mümkünse).

# TASK STYLE

- Bir dosya istersem tek dosya üret.
- Yeni feature istersem migration + model + request + controller + route + react page şeklinde üretim sırası kullan.
- Migration yazarken timestamps ekle ve softDeletes ürünle ilgili tablolara ekle.
- Laravel controller üretirken ilgili FormRequest'i de üret.
