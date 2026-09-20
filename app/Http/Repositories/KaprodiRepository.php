<?php

namespace App\Http\Repositories;

use App\Models\Kaprodi;

class KaprodiRepository
{
    public function getAll()
    {
        return Kaprodi::all();
    }

    public function getById($id)
    {
        return Kaprodi::find($id);
    }

    public function create($data)
    {
        $data['password'] = bcrypt($data['password']);

        return Kaprodi::create($data);
    }

    public function update($id, $data)
    {
        if (array_key_exists('password', $data)) {
            if ($data['password']) {
                $data['password'] = bcrypt($data['password']);
            } else {
                unset($data['password']);
            }
        }

        return Kaprodi::find($id)->update($data);
    }

    public function delete($id)
    {
        return Kaprodi::destroy($id);
    }
}
