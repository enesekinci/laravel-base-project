<div>
    <form wire:submit="save">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach ($fields as $key => $field)
                @if ($field['type'] === 'checkbox')
                    <x-toggle :label="$field['label']" wire:model="formData.{{ $key }}" :hint="isset($field['hint']) ? $field['hint'] : ''" />
                @elseif ($field['type'] === 'textarea')
                    <x-textarea
                        :label="$field['label']"
                        wire:model="formData.{{ $key }}"
                        :hint="isset($field['hint']) ? $field['hint'] : ''"
                        :required="$field['required'] ?? false"
                        class="md:col-span-2"
                    />
                @elseif ($field['type'] === 'password')
                    <x-input :label="$field['label']" wire:model="formData.{{ $key }}" type="password" :hint="isset($field['hint']) ? $field['hint'] : ''" :required="$field['required'] ?? false" />
                @else
                    <x-input
                        :label="$field['label']"
                        wire:model="formData.{{ $key }}"
                        :type="$field['type']"
                        :hint="isset($field['hint']) ? $field['hint'] : ''"
                        :required="$field['required'] ?? false"
                    />
                @endif
            @endforeach
        </div>

        <div class="flex justify-end gap-2 mt-6">
            <x-button type="submit" label="Kaydet" icon="o-check" class="btn-primary" spinner="save" />
        </div>
    </form>
</div>
