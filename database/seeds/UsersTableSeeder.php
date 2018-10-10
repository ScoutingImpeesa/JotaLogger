<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Role;
use TCG\Voyager\Models\User;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Page;
use TCG\Voyager\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        if (User::count() == 0) {
            $role = Role::where('name', 'admin')->firstOrFail();

            User::create([
                'name'           => 'admin',
                'email'          => 'your@email.com',
                'password'       => bcrypt('admin'),
                'remember_token' => str_random(60),
                'role_id'        => $role->id,
            ]);
        }
        $pageDataType = DataType::where('slug', 'users')->firstOrFail(); 
        $dataRow = $this->dataRow($pageDataType, 'user_belongsto_club_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => 'Club',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => json_encode([
                    "model"=> "App\\Club",
                    "table"=> "clubs",
                    "type"=> "belongsTo",
                    "column"=> "club_id",
                    "key"=> "id",
                    "label"=> "full_name",
                    "pivot_table"=> "clubs",
                    "pivot"=> "0",
                    "taggable"=> "0"
                ]),
                'order'        => 20,
            ])->save();
        }

    }
    /**
     * [dataRow description].
     *
     * @param [type] $type  [description]
     * @param [type] $field [description]
     *
     * @return [type] [description]
     */
    protected function dataRow($type, $field)
    {
        return DataRow::firstOrNew([
                'data_type_id' => $type->id,
                'field'        => $field,
            ]);
    }

    /**
     * [dataType description].
     *
     * @param [type] $field [description]
     * @param [type] $for   [description]
     *
     * @return [type] [description]
     */
    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }

}
