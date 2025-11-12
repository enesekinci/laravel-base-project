---
alwaysApply: true
---

# REACT REFACTORING & CODE ORGANIZATION

## 1. Dosya Organizasyonu ve Yapısı

### Types ve Interfaces
- **TÜM TypeScript tipleri ayrı dosyalarda olmalı**: `resources/js/types/` klasörü altında
- Her domain için ayrı type dosyası: `product.ts`, `order.ts`, `category.ts` vb.
- Interface'ler ve type'lar export edilmeli, component içinde tanımlanmamalı
- Örnek yapı:
  ```typescript
  // resources/js/types/product.ts
  export interface ProductFormData { ... }
  export interface ProductVariation { ... }
  export interface ProductCreateProps { ... }
  ```

### Custom Hooks
- **Karmaşık state logic'i custom hook'lara taşı**: `resources/js/hooks/` klasörü altında
- Hook isimleri `use` ile başlamalı: `use-product-variations.ts`, `use-product-variants.ts`
- Her hook tek bir sorumluluğa sahip olmalı
- Hook'lar reusable olmalı, component'e özel olmamalı
- Örnek yapı:
  ```typescript
  // resources/js/hooks/use-product-variations.ts
  export function useProductVariations({ variations }: Props) {
    const [state, setState] = useState(...);
    // logic
    return { state, handlers };
  }
  ```

### Utility Fonksiyonları
- **Pure fonksiyonlar ve helper'lar**: `resources/js/utils/` klasörü altında
- Her utility dosyası tek bir amaca hizmet etmeli
- Fonksiyonlar pure olmalı (side effect yok)
- Örnek: `variant-generator.ts`, `formatters.ts`, `validators.ts`

### Component Bölme
- **Büyük component'ler küçük parçalara bölünmeli**: `resources/js/components/` klasörü altında
- Her component maksimum 200-300 satır olmalı
- Feature bazlı klasörleme: `products/ProductVariationsSection.tsx`
- Component isimleri PascalCase ve açıklayıcı olmalı

## 2. Component Refactoring Kuralları

### Büyük Component'leri Bölme
- Bir component 200 satırı geçiyorsa MUTLAKA böl
- Bölme kriterleri:
  - **Feature bazlı**: Her feature ayrı component (Variations, Variants, Attributes)
  - **UI bazlı**: Her görsel bölüm ayrı component (Header, Footer, Sidebar)
  - **Logic bazlı**: Karmaşık logic'i hook'a taşı, component sadece UI render etsin

### State Management
- **Local state sadece UI için**: `useState` sadece UI state'i için (modal açık/kapalı, input değeri)
- **Form state Inertia useForm**: Form verileri için `useForm` hook'u kullan
- **Complex state custom hook**: Karmaşık state logic'i custom hook'a taşı
- **Derived state useMemo/useEffect**: Türetilmiş veriler için `useMemo` veya `useEffect` kullan

### Props ve Type Safety
- **Tüm props'lar type-safe olmalı**: Interface veya type ile tanımlanmalı
- Props interface'leri component dosyasının üstünde veya types dosyasında olmalı
- `any` kullanma, `unknown` kullan veya düzgün type tanımla
- Optional props'lar için `?` kullan: `onClick?: () => void`

## 3. Hook Kullanımı ve Best Practices

### Custom Hook Oluşturma Kriterleri
- **State logic tekrar ediyorsa**: Aynı logic birden fazla yerde kullanılıyorsa hook'a taşı
- **Karmaşık state yönetimi**: Birden fazla state ve effect bir arada kullanılıyorsa hook'a taşı
- **Derived state hesaplama**: useMemo/useEffect ile türetilmiş veri hesaplama hook'a taşınmalı

### Hook Yapısı
```typescript
// ✅ İyi - Hook yapısı
export function useProductVariations({ variations }: Props) {
  const [state, setState] = useState<Type>(initialValue);
  const ref = useRef(0);
  
  const handler = useCallback((param: Type) => {
    // logic
  }, [dependencies]);
  
  useEffect(() => {
    // side effects
  }, [dependencies]);
  
  return {
    state,
    handler,
    // diğer değerler
  };
}
```

### Hook Kullanımı
- Hook'lar component'in en üstünde çağrılmalı
- Conditional hook çağrısı YAPMA
- Hook'lar arası bağımlılık varsa dependency array'e ekle

## 4. TypeScript Best Practices

### Type Tanımlama
- **Interface vs Type**: 
  - Interface: Object shape tanımlamak için
  - Type: Union, intersection, utility types için
- **Export et**: Tüm public type'lar export edilmeli
- **Generic kullan**: Reusable type'lar için generic kullan

### Type Safety
- `any` kullanma, `unknown` kullan veya düzgün type tanımla
- `@ts-expect-error` veya `@ts-ignore` sadece gerçekten gerekli olduğunda kullan
- Her kullanım için açıklama ekle: `// @ts-expect-error - Backend 'options' bekliyor ama form tipi farklı`

### Import/Export
- **Named export tercih et**: `export function Component()` 
- **Type import'ları ayrı**: `import type { Type } from '@/types/product'`
- **Barrel export kullan**: `index.ts` dosyaları ile re-export

## 5. Code Organization Patterns

### Dosya Yapısı Örneği
```
resources/js/
├── types/
│   ├── product.ts          # Product ile ilgili tüm tipler
│   ├── order.ts
│   └── index.ts            # Barrel export
├── hooks/
│   ├── use-product-variations.ts
│   ├── use-product-variants.ts
│   └── use-toast-errors.ts
├── utils/
│   ├── variant-generator.ts
│   ├── formatters.ts
│   └── validators.ts
├── components/
│   ├── products/
│   │   ├── ProductVariationsSection.tsx
│   │   ├── ProductVariantsSection.tsx
│   │   └── ProductGeneralForm.tsx
│   └── ui/
└── pages/
    └── Admin/
        └── Products/
            ├── Create.tsx   # Ana component, sadece orchestration
            └── Edit.tsx
```

### Component Yapısı
```typescript
// ✅ İyi - Temiz component yapısı
import type { Props } from '@/types/product';
import { useProductVariations } from '@/hooks/use-product-variations';
import { ProductVariationsSection } from '@/components/products/ProductVariationsSection';

export default function ProductsCreate(props: Props) {
  // 1. Hooks
  const { data, setData, processing, errors } = useForm<FormData>({...});
  const { productVariations, handlers } = useProductVariations({...});
  
  // 2. Local state (sadece UI için)
  const [isOpen, setIsOpen] = useState(false);
  
  // 3. Handlers
  const handleSubmit = (e: React.FormEvent) => { ... };
  
  // 4. Render
  return (
    <Layout>
      <Form onSubmit={handleSubmit}>
        <ProductVariationsSection {...props} />
      </Form>
    </Layout>
  );
}
```

## 6. Refactoring Checklist

Bir component'i refactor ederken şu adımları takip et:

1. **Types'ları ayır**
   - [ ] Component içindeki interface'leri `types/` klasörüne taşı
   - [ ] Export et ve import et

2. **Custom hook'lar oluştur**
   - [ ] Karmaşık state logic'i hook'a taşı
   - [ ] Türetilmiş state hesaplamalarını hook'a taşı
   - [ ] Handler fonksiyonlarını hook'a taşı

3. **Utility fonksiyonları ayır**
   - [ ] Pure fonksiyonları `utils/` klasörüne taşı
   - [ ] Helper fonksiyonları `utils/` klasörüne taşı

4. **Component'leri böl**
   - [ ] Büyük component'i feature bazlı parçalara böl
   - [ ] Her parça maksimum 200-300 satır
   - [ ] Props interface'lerini tanımla

5. **Ana component'i sadeleştir**
   - [ ] Ana component sadece orchestration yapmalı
   - [ ] useForm ve hook çağrıları
   - [ ] Submit handler
   - [ ] Alt component'lere props geçme

6. **Type safety kontrolü**
   - [ ] Tüm props'lar type-safe
   - [ ] `any` kullanımı yok
   - [ ] `@ts-expect-error` sadece gerekli yerlerde

7. **Linter kontrolü**
   - [ ] ESLint hataları yok
   - [ ] TypeScript hataları yok
   - [ ] Unused imports/values yok

## 7. Örnekler

### ❌ Kötü - Tek dosyada her şey
```typescript
// Create.tsx - 2000+ satır
interface Product { ... }  // ❌ Component içinde type
const generateCombinations = (...) => { ... }  // ❌ Component içinde utility
export default function Create() {
  const [variations, setVariations] = useState(...);  // ❌ Karmaşık state logic
  const [variants, setVariants] = useState(...);
  // 2000 satır kod...
}
```

### ✅ İyi - Refactor edilmiş
```typescript
// types/product.ts
export interface Product { ... }
export interface ProductFormData { ... }

// utils/variant-generator.ts
export function generateCombinations(...) { ... }

// hooks/use-product-variations.ts
export function useProductVariations({ variations }: Props) {
  const [state, setState] = useState(...);
  // logic
  return { state, handlers };
}

// components/products/ProductVariationsSection.tsx
export function ProductVariationsSection({ ... }: Props) {
  // sadece UI render
}

// pages/Admin/Products/Create.tsx
export default function ProductsCreate(props: Props) {
  const { data, setData } = useForm<ProductFormData>({...});
  const { productVariations } = useProductVariations({...});
  // sadece orchestration
}
```

## 8. Önemli Notlar

- **Her zaman refactor et**: Yeni feature eklerken mevcut kodu refactor et
- **Tek sorumluluk prensibi**: Her dosya/hook/component tek bir şey yapmalı
- **DRY prensibi**: Tekrar eden kod hook veya utility'ye taşınmalı
- **Okunabilirlik**: Kod okunabilir olmalı, yorum gerektirmemeli
- **Test edilebilirlik**: Hook'lar ve utility'ler test edilebilir olmalı
