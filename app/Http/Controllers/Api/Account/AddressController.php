<?php

namespace App\Http\Controllers\Api\Account;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index(Request $request)
    {
        $addresses = $request->user()->addresses()->orderByDesc('is_default')->get();

        return response()->json([
            'data' => $addresses,
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);

        $address = $request->user()->addresses()->create($data);

        if ($address->is_default) {
            $request->user()->addresses()
                ->where('id', '!=', $address->id)
                ->update(['is_default' => false]);
        }

        return response()->json(['data' => $address], 201);
    }

    public function update(Request $request, Address $address)
    {
        abort_unless($address->user_id === $request->user()->id, 403);

        $data = $this->validateData($request, true);
        $address->fill($data)->save();

        if ($address->is_default) {
            $request->user()->addresses()
                ->where('id', '!=', $address->id)
                ->update(['is_default' => false]);
        }

        return response()->json(['data' => $address]);
    }

    public function destroy(Request $request, Address $address)
    {
        abort_unless($address->user_id === $request->user()->id, 403);

        $address->delete();

        return response()->noContent();
    }

    private function validateData(Request $request, bool $update = false): array
    {
        $rules = [
            'type' => ['required', 'string', 'in:shipping,billing'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'country' => ['required', 'string', 'max:2'],
            'city' => ['required', 'string', 'max:255'],
            'district' => ['nullable', 'string', 'max:255'],
            'postcode' => ['nullable', 'string', 'max:20'],
            'line_1' => ['required', 'string', 'max:255'],
            'line_2' => ['nullable', 'string', 'max:255'],
            'is_default' => ['nullable', 'boolean'],
        ];

        if ($update) {
            foreach ($rules as $k => &$r) {
                array_unshift($r, 'sometimes');
            }
        }

        return $request->validate($rules);
    }
}
