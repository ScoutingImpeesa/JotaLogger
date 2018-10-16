<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Page;
use TCG\Voyager\Models\Permission;

class QSOTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        //Data Type
        $dataType = $this->dataType('slug', 'qsos');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'qsos',
                'display_name_singular' => 'QSO',
                'display_name_plural'   => 'QSOs',
                'icon'                  => 'voyager-file-text',
                'model_name'            => 'App\\QSO',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        //Data Rows
        $pageDataType = DataType::where('slug', 'qsos')->firstOrFail();
        $dataRow = $this->dataRow($pageDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('voyager::seeders.data_rows.id'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 1,
            ])->save();
        }
        $dataRow = $this->dataRow($pageDataType, 'qso_belongsto_club_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => 'Groep',
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
                    "column"=> "id",
                    "key"=> "id",
                    "label"=> "full_name",
                    "pivot_table"=> "clubs",
                    "pivot"=> "0",
                    "taggable"=> "0"
                ]),
                'order'        => 2,
            ])->save();
        }
        $dataRow = $this->dataRow($pageDataType, 'user_id');
        if (!$dataRow->exists) { 
            $dataRow->fill([
                'type'         => 'text', 
                'display_name' => 'user_id',
                'required'     => 1,
                'browse'       => 0, 
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 3,
            ])->save();
        }
        $dataRow = $this->dataRow($pageDataType, 'callsign');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Callsign',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
                'order'        => 4,
            ])->save();
        }
        $dataRow = $this->dataRow($pageDataType, 'operator');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Operator',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
                'order'        => 4,
            ])->save();
        }
        $dataRow = $this->dataRow($pageDataType, 'frequency');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Frequency',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
                'order'        => 5,
            ])->save();
        }
        $dataRow = $this->dataRow($pageDataType, 'mode');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'select_dropdown',
                'display_name' => 'Mode',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => json_encode([
                    "default"=>"SSB",
                    "options"=>[
                        "SSB"=>"SSB",
                        "FM" =>"FM",
                        "PSK"=>"PSK",
                        "DIG"=>"DIG"
                    ]
                ]),
                'order'        => 6,
            ])->save();
        }
        $dataRow = $this->dataRow($pageDataType, 'locator');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Locator',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
                'order'        => 7,
            ])->save();
        }
        $dataRow = $this->dataRow($pageDataType, 'city');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'City',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
                'order'        => 8,
            ])->save();
        }
        $dataRow = $this->dataRow($pageDataType, 'country');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'Country',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
                'order'        => 9,
            ])->save();
        }
        $dataRow = $this->dataRow($pageDataType, 'notes');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text_area',
                'display_name' => 'notes',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
                'order'        => 10,
            ])->save();
        }
        $dataRow = $this->dataRow($pageDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'created_at',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 10,
            ])->save();
        }
        $dataRow = $this->dataRow($pageDataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'updated_at',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 11,
            ])->save();
        }
        $dataRow = $this->dataRow($pageDataType, 'deleted_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => 'deleted_at',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 12,
            ])->save();
        }
        $dataRow = $this->dataRow($pageDataType, 'club_id');
        if (!$dataRow->exists) { 
            $dataRow->fill([
                'type'         => 'text', 
                'display_name' => 'club_id',
                'required'     => 1,
                'browse'       => 0, 
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 13,
            ])->save();
        }
        $dataRow = $this->dataRow($pageDataType, 'owner_club_id');
        if (!$dataRow->exists) { 
            $dataRow->fill([
                'type'         => 'text', 
                'display_name' => 'owner_club_id',
                'required'     => 0,
                'browse'       => 0, 
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 80,
            ])->save();
        }


        //Permissions
        Permission::generateFor('qsos');

        //Menu
        //Menu Item
        $menu = Menu::where('name', 'admin')->firstOrFail();
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'New QSO',
            'url'     => '',
            'route'   => 'voyager.qsos.create',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-plus',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 1,
            ])->save();
        }
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'QSOs',
            'url'     => '',
            'route'   => 'voyager.qsos.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-activity',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 1,
            ])->save();
        }

        //Content
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
