<?php

namespace App\Repositories;
use App\User;

class UserRepository
{
    /**
     * @param $data
     */
    public function update($data) {
        auth()->user()->skills()->sync($data['skills']);
        auth()->user()->categories()->sync(array_merge($data['categories'], $data['sub_categories']));

        if (request()->file('image') && auth()->user()->image) {
            StorageRepo::delete(auth()->user()->image, 'personal');
            auth()->user()->image = StorageRepo::upload(request()->file('image'), 'personal');
        }
        auth()->user()->description = $data['description'];
        auth()->user()->account_status = 'filled';
        auth()->user()->save();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function updateMainFields($data)
    {
        $array = [
            'name' => $data['name'],
            'surname' => $data['surname'],
            'password' => bcrypt($data['password']),
            'country' => $data['country'],
            'country_iso' => $data['country_iso'],
            'city' => $data['city'],
            'address1' => $data['address1'],
            'address2' => $data['address2'],
            'phone' => $data['phone'],
        ];
        if (!$data['password'])
            unset($array['password']);

        return auth()->user()->update($array);
    }

    /**
     * @return array
     */
    public function getUserSkillIds() {
        $arr = [];
        foreach (auth()->user()->skills as $skill) {
            $arr[] = $skill->id;
        }
        return $arr;
    }

    /**
     * @return array
     */
    public function getUserCategoryIds() {
        $arr = [];
        foreach (auth()->user()->categories as $cat) {
            $arr[] = $cat->id;
        }
        return $arr;
    }

    /**
     * @return mixed
     */
    public function validateAdditionalInfo() {
        $rules = [
            'description' => 'required|max:800',
            'categories' => 'required|array',
            'sub_categories' => 'required|array',
            'skills' => 'required|array',
        ];
        if (!(auth()->user()->image))
            $rules['image'] = 'required|image';
        else
            $rules['image'] = 'nullable|image';

        return \Validator::make(request()->all(), $rules);

    }

    /**
     * @param $data
     * @return mixed
     */
    public function validateMainSettings($data)
    {
        return \Validator::make($data, [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            //'email' => 'required|email|max:255|unique:users',
            'password' => 'nullable|min:6|confirmed',
            'country' => 'required|string',
            'city' => 'required|string',
            'address1' => 'required|string',
            'address2' => 'nullable|string',
            'phone' => 'required'
        ]);
    }

    /**
     * @param int $id user id
     * @return string
    */
    public static function getProposalOwner($id) {
        $user = User::find($id);
        return $user->name." ".$user->surname;
    }
}























